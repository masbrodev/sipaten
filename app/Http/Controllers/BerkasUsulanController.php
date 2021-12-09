<?php

namespace App\Http\Controllers;

use App\Models\BerkasUsulan;
use App\Models\Usulan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BerkasUsulanController extends Controller
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

        $name = uniqid() . '_BU_' . trim($berkas->getClientOriginalName());

        $bulan = Carbon::now()->isoFormat('MMMM_Y');

        $berkas->move('berkas/' . $bulan, $name);

        BerkasUsulan::create([
            'nama_berkas' => $name,
            'usulan_id' => $request->id,
            'lokasi' => $bulan
        ]);

        return response()->json(['success' => $name]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BerkasUsulan  $berkasUsulan
     * @return \Illuminate\Http\Response
     */
    public function show($berkasUsulan)
    {
        $data['us'] = Usulan::where('id', $berkasUsulan)->firstOrFail();

        $data['berkas'] = BerkasUsulan::where('usulan_id', $data['us']->id)->get();

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
     * @param  \App\Models\BerkasUsulan  $berkasUsulan
     * @return \Illuminate\Http\Response
     */
    public function edit(BerkasUsulan $berkasUsulan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BerkasUsulan  $berkasUsulan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BerkasUsulan $berkasUsulan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BerkasUsulan  $berkasUsulan
     * @return \Illuminate\Http\Response
     */
    public function destroy(BerkasUsulan $berkasUsulan)
    {
        //
    }
}
