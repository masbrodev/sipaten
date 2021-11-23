<?php

namespace App\Http\Controllers;

use App\Models\Kategori_bmn;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class KategoriBmnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['bmn'] = Kategori_bmn::all();
        return view('pages.kategoribmn.data' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.kategoribmn.add');
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
        Kategori_bmn::create($input);

        return redirect(route('pages.kategoribmn.add'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori_bmn  $kategori_bmn
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori_bmn $kategori_bmn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori_bmn  $kategori_bmn
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori_bmn $kategori_bmn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori_bmn  $kategori_bmn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori_bmn $kategori_bmn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori_bmn  $kategori_bmn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori_bmn $kategori_bmn)
    {
        //
    }
}
