<?php

namespace App\Http\Controllers;

use App\Models\Bmn;
use App\Models\Pagu;
use Illuminate\Http\Request;

class BmnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['bmn'] = Bmn::all();
        return view('pages.bmn.data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pagu'] = Pagu::all();
        return view('pages.bmn.add', $data);
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
        Bmn::create($input);

        return redirect(route('bmn.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bmn  $bmn
     * @return \Illuminate\Http\Response
     */
    public function show($bmn)
    {
        $data['bmn'] = Bmn::where('id', $bmn)->first();
        return view('pages.bmn.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori_bmn  $bmn
     * @return \Illuminate\Http\Response
     */
    public function edit($bmn)
    {
        $data['bmn'] = Bmn::where('id', $bmn)->first();
        // return $data;
        return view('pages.bmn.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori_bmn  $bmn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bmn $bmn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori_bmn  $bmn
     * @return \Illuminate\Http\Response
     */
    public function destroy($bmn)
    {
        $data = Bmn::where('id', $bmn)->first();
        if ($data) {
            $data->delete();
            return redirect()->route('bmn.index');
        } else {
            return redirect()->back();
        }

        // $bmn->delete();
    }
}
