<?php

namespace App\Http\Controllers;

use App\Models\Bmn;
use App\Models\Usulan;
use Illuminate\Http\Request;

class UsulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['us'] = Usulan::orderBy('created_at', 'DESC')->get();
        return view('pages.usulan.data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $count = Usulan::count();
        $data['bmn'] = Bmn::all();
        $data['id'] = ($count == 0) ? 1 : Usulan::all()->last()->id + 1;
        return view('pages.usulan.add', $data);
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
            Usulan::create($input);
        }

        return redirect(route('usulan.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function show(Usulan $usulan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function edit($usulan)
    {
        $data['bmn'] = Bmn::all();
        $data['us'] = Usulan::where('id', $usulan)->first();
        $data['bmnfix'] = Bmn::where('id', $data['us']->bmn_id)->first();
        // return $data;
        return view('pages.usulan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $usulan)
    {
        $input = $request->all();
        Usulan::find($usulan)->update($input);

        return redirect(route('usulan.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usulan $usulan)
    {
        //
    }
}
