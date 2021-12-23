<?php

namespace App\Http\Controllers;

use App\Models\Bmn;
use App\Models\Pagu;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PaguController extends Controller
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
        $datapagu = Pagu::all();
        $data['total_pagu'] = Pagu::sum('pagu_anggaran');
        $transaksi = Transaksi::groupBy('kode_pagu')
            ->selectRaw("sum(nilai) as PAGU, kode_pagu")
            // ->pluck('PAGU', 'kode_pagu');
            ->get();
        $transaksi2 = Transaksi::groupBy('kode_pagu')
            ->selectRaw("sum(nilai) as PAGU, kode_pagu")
            ->pluck('PAGU', 'kode_pagu');
        $ppagu = collect();

        $data['total_realisasi'] = Transaksi::where('status', 'berhasil')->sum('nilai');

        $data['pagu'] = $ppagu;

        foreach ($transaksi as $t) {
            $ll[] = $t->kode_pagu;
        }
        foreach ($datapagu as $pg) {
            $ppagu->push([
                'id' => $pg->id,
                'kode_pagu' => $pg->kode_pagu,
                'uraian' => $pg->uraian,
                'jumlah_volume' => $pg->jumlah_volume,
                'jenis_volume' => $pg->jenis_volume,
                'nilai' => $pg->nilai,
                'pagu_anggaran' => $pg->pagu_anggaran,
                'sisa' => $pg->sisa,
                'jumlah_bmn' => Bmn::where('kode_pagu', $pg->kode_pagu)->count(),
                'realisasi' => count($transaksi) == 0  ? 0 : (in_array($pg->kode_pagu, $ll) ? $transaksi2[$pg->kode_pagu] : null),
                'diperbaharui' => $pg->updated_at == null ? 0 : $pg->updated_at->diffForHumans(),
            ]);
        }
        // return $transaksi;
        return view('pages.pagu.data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pagu.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pagu = $request->nilai * $request->jumlah_volume;
        Pagu::create([
            'kode_pagu' => $request->kode_pagu,
            'uraian' => $request->uraian,
            'jenis_volume' => $request->jenis_volume,
            'jumlah_volume' => $request->jumlah_volume,
            'nilai' => $request->nilai,
            'pagu_anggaran' => $pagu,
            'sisa' => $pagu,
        ]);

        return redirect(route('pagu.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pagu  $pagu
     * @return \Illuminate\Http\Response
     */
    public function show($pagu)
    {
        $pagu = Pagu::where('id', $pagu)->first();
        $transaksi = Transaksi::with('user')->where('kode_pagu', $pagu->kode_pagu)->get();
        $bmn = Bmn::with('pagu')->where('kode_pagu', $pagu->kode_pagu)->get();
        // return $bmn;
        return view('pages.pagu.show', ['pagu' => $pagu, 'transaksi' => $transaksi, 'bmn' => $bmn]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pagu  $pagu
     * @return \Illuminate\Http\Response
     */
    public function edit($pagu)
    {
        $pagu = Pagu::where('id', $pagu)->first();
        return view('pages.pagu.edit', ['pagu' => $pagu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pagu  $pagu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pagu)
    {
        $input = $request->all();
        Pagu::find($pagu)->update($input);

        return redirect(route('pagu.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pagu  $pagu
     * @return \Illuminate\Http\Response
     */
    public function destroy($pagu)
    {
        $data = Pagu::where('id', $pagu)->first();
        if ($data) {
            $data->delete();
            return redirect()->route('pagu.index');
        } else {
            return redirect()->back();
        }
    }
}
