<?php

namespace App\Http\Controllers;

use App\Models\BerkasClaim;
use App\Models\Bmn;
use App\Models\Claim;
use App\Models\Pagu;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

class ClaimController extends Controller
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
        $data['cl'] = Auth::user()->role == 'a' ?
         Claim::with('user', 'bmn')->orderBy('created_at', 'DESC')->get():
         Claim::with('user', 'bmn')->where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        return view('pages.claim.data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $count = Claim::count();
        $data['bmn'] = Bmn::all();
        $data['id'] = ($count == 0) ? 1 : Claim::all()->last()->id + 1;

        return view('pages.claim.add', $data);
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
            Claim::create($input);
        }

        return redirect(route('claim.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function show($claim)
    {
        $data['cl'] = Claim::where('id', $claim)->first();
        $data['bmnfix'] = Bmn::where('id', $data['cl']->bmn_id)->first();
        $data['berkas'] = BerkasClaim::where('claim_id', $data['cl']->id)->get();
        $data['user'] = User::where('id', $data['cl']->user_id)->first();

        // return $data;
        return view('pages.claim.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function edit($claim)
    {
        $data['bmn'] = Bmn::all();
        $data['cl'] = Claim::where('id', $claim)->first();
        $data['berkas'] = BerkasClaim::where('claim_id', $data['cl']->id)->get();
        $data['bmnfix'] = Bmn::where('id', $data['cl']->bmn_id)->first();
        // return $data;
        return view('pages.claim.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $claim)
    {
        $input = $request->all();
        $datacl = Claim::where('id', $claim)->first();
        $databmn = Bmn::where('id', $datacl->bmn_id)->first();
        $datapg = Pagu::where('kode_pagu', $databmn->kode_pagu)->first();
        Claim::find($claim)->update($input);

        if ($request->status == 'selesai') {
            DB::beginTransaction();

            try {
                Transaksi::Create([
                    'kode_transaksi' => $datacl->kode_claim,
                    'user_id' => $datacl->user_id,
                    'kode_pagu' => $databmn->kode_pagu,
                    'jenis' => 'claim',
                    'status' => 'berhasil',
                    'nilai' => $datacl->nilai,
                    'sisa' => $datapg->sisa - $datacl->nilai,
                ]);
                Pagu::where('kode_pagu', $databmn->kode_pagu)->decrement('sisa', $datacl->nilai);


                DB::commit();
            } catch (\Exception $th) {
                DB::rollBack();
            }
        }


        return redirect(route('claim.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function destroy(Claim $claim, Request $request)
    {
        DB::beginTransaction();
        try {
            $data['cl'] = Claim::where('id', $request->id)->first();
            $data['berkas'] = BerkasClaim::where('claim_id', $data['cl']->id)->get();
            foreach ($data['berkas'] as $f) {
                unlink(public_path('berkas/') . $f->lokasi . '/' . $f->nama_berkas);
            }

            BerkasClaim::where('claim_id', $request->id)->delete();

            $claim->delete();
            DB::commit();
            return redirect(route('claim.index'));
        } catch (\Exception $th) {
            DB::rollBack();
        }
    }
}
