<?php

namespace App\Http\Controllers;

use App\Models\BerkasUsulan;
use App\Models\Bmn;
use App\Models\Pagu;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Usulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $data['us'] = Auth::user()->role == 'a' ?
        Usulan::with('user', 'bmn')->orderBy('created_at', 'DESC')->get() :
        Usulan::with('user', 'bmn')->where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        return view('pages.usulan.data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $count = Usulan::count();
        $data['bmn'] = Bmn::all();
        $data['id'] = ($count == 0) ? 1 : Usulan::all()->last()->id + 1;
        return view('pages.usulan.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->ajax()) {
            Usulan::create($input);
        }

        return redirect(route('usulan.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function show($usulan)
    {
        $data['us'] = Usulan::where('id', $usulan)->first();
        $data['bmnfix'] = Bmn::where('id', $data['us']->bmn_id)->first();
        $data['berkas'] = BerkasUsulan::where('usulan_id', $data['us']->id)->get();
        $data['user'] = User::where('id', $data['us']->user_id)->first();

        // return $data;
        return view('pages.usulan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function edit($usulan)
    {
        $data['bmn'] = Bmn::all();
        $data['us'] = Usulan::where('id', $usulan)->first();
        $data['bmnfix'] = Bmn::where('id', $data['us']->bmn_id)->first();
        // return $data;
        return view('pages.usulan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $usulan)
    {
        $input = $request->all();

        $dataus = Usulan::where('id', $usulan)->first();
        $databmn = Bmn::where('id', $dataus->bmn_id)->first();
        $datapg = Pagu::where('kode_pagu', $databmn->kode_pagu)->first();
        Usulan::find($usulan)->update($input);

        if ($request->status == 'selesai') {
            DB::beginTransaction();

            try {
                Transaksi::Create([
                    'kode_transaksi' => $dataus->kode_usulan,
                    'user_id' => $dataus->user_id,
                    'kode_pagu' => $databmn->kode_pagu,
                    'jenis' => 'update',
                    'status' => 'berhasil',
                    'nilai' => $dataus->nilai,
                    'sisa' => $datapg->sisa - $dataus->nilai,
                ]);
                Pagu::where('kode_pagu', $databmn->kode_pagu)->decrement('sisa', $dataus->nilai);


                DB::commit();
            } catch (\Exception $th) {
                DB::rollBack();
            }
        }

        return redirect(route('usulan.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usulan $usulan)
    {
        //
    }
}
