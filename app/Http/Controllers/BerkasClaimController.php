<?php

namespace App\Http\Controllers;

use App\Models\BerkasClaim;
use App\Models\Claim;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BerkasClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $berkas = $request->file('file');

        $name = uniqid() . '_BC_' . trim($berkas->getClientOriginalName());

        $bulan = Carbon::now()->isoFormat('MMMM_Y');

        $berkas->move('berkas/' . $bulan, $name);

        BerkasClaim::create([
            'nama_berkas' => $name,
            'claim_id' => $request->id,
            'lokasi' => $bulan
        ]);

        return response()->json(['success' => $name]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BerkasClaim  $berkasClaim
     * @return \Illuminate\Http\Response
     */
    public function show($berkasClaim)
    {
        $data['cl'] = Claim::where('id', $berkasClaim)->firstOrFail();

        $data['berkas'] = BerkasClaim::where('claim_id', $data['cl']->id)->get();

        if (empty($data['berkas'][0])) {
            return 'kosong';
        } else {


            foreach ($data['berkas'] as $berkas) {
                $namaBerkas[] = $berkas['nama_berkas'];
                $lokasi[] = $berkas['lokasi'];
            }

            $f = 'berkas/' . $lokasi[0] . '/';
            $storeFolder = public_path('berkas/' . $lokasi[0]);
            $files = scandir($storeFolder);

            foreach ($files as $file) {
                if ($file != '.' && $file != '..' && in_array($file, $namaBerkas)) {
                    $obj['name'] = $file;
                    $file_path = public_path($f) . $file;
                    $obj['size'] = filesize($file_path);
                    $obj['path'] = url($f . $file);
                    $datas[] = $obj;
                }
            }
            return $datas;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BerkasClaim  $berkasClaim
     * @return \Illuminate\Http\Response
     */
    public function edit(BerkasClaim $berkasClaim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BerkasClaim  $berkasClaim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BerkasClaim $berkasClaim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BerkasClaim  $berkasClaim
     * @return \Illuminate\Http\Response
     */
    public function destroy(BerkasClaim $berkasClaim)
    {
        //
    }
}
