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
        return view('pages.pagu.show', ['pagu' => $pagu]);
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
    public function update(Request $request,$pagu)
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
