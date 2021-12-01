<?php

namespace App\Http\Controllers;

use App\Models\Pagu;
use Illuminate\Http\Request;

class PaguController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pagu'] = Pagu::all();
        $data['total'] = Pagu::sum('pagu_anggaran');
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
        Pagu::create([
            'kode_pagu' => $request->kode_pagu,
            'uraian' => $request->uraian,
            'jenis_volume' => $request->jenis_volume,
            'jumlah_volume' => $request->jumlah_volume,
            'nilai' => $request->nilai,
            'pagu_anggaran' => $request->nilai * $request->jumlah_volume,
        ]);

        return redirect(route('pagu.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pagu  $pagu
     * @return \Illuminate\Http\Response
     */
    public function show(Pagu $pagu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pagu  $pagu
     * @return \Illuminate\Http\Response
     */
    public function edit(Pagu $pagu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pagu  $pagu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pagu $pagu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pagu  $pagu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagu $pagu)
    {
        //
    }
}
