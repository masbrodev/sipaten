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
        return view('pages.kategoribmn.data', $data);
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
    public function show($kategori_bmn)
    {
        $data['bmn'] = Kategori_bmn::where('id', $kategori_bmn)->first();
        // return $data;
        return view('pages.kategoribmn.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori_bmn  $kategori_bmn
     * @return \Illuminate\Http\Response
     */
    public function edit($kategori_bmn)
    {
        $data['bmn'] = Kategori_bmn::where('id', $kategori_bmn)->first();
        // return $data;
        return view('pages.kategoribmn.edit', $data);
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
    public function destroy($kategori_bmn)
    {
        $data = Kategori_bmn::where('id', $kategori_bmn)->first();
        if ($data) {
            $data->delete();
            return redirect()->route('bmn.index');
        } else {
            return redirect()->back();
        }

        // $kategori_bmn->delete();
    }
}
