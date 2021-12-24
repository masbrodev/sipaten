<?php

namespace App\Http\Controllers;

use App\Models\Bmn;
use App\Models\Claim;
use App\Models\Transaksi;
use App\Models\Usulan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['bmn'] = Bmn::all()->count();
        $data['tr'] = Transaksi::all()->count();
        $data['cl'] = Claim::all()->count();
        $data['us'] = Usulan::all()->count();
        $bmn = Bmn::all()->groupBy('nama_barang');
        $data['nama'] = [];
        $data['jumlah'] = [];
        foreach ($bmn as $key => $value) {
            $data['nama'][] = $key. ' | '.count($value);
            $data['jumlah'][] = count($value);
        }

        // $a = $data['bmn'][0];
        // return $a;
        // return $data;
        return view('home', $data);
    }
}
