<?php

namespace App\Http\Controllers;

use App\Models\Bmn;
use App\Models\Claim;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cl'] = Claim::orderBy('updated_at', 'DESC')->get();
        return view('pages.claim.data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $count = Claim::count();
        $data['bmn'] = Bmn::all();
        $data['id'] = ($count == 0) ? 1 : Claim::all()->last()->id + 1;

        return view('pages.claim.add', $data);
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
            Claim::create($input);
        }

        return redirect(route('claim.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function show(Claim $claim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function edit($claim)
    {
        $data['bmn'] = Bmn::all();
        $data['cl'] = Claim::where('id', $claim)->first();
        $data['pagu'] = Bmn::where('id', $data['cl']->bmn_id)->first();
        // return $data;
        return view('pages.claim.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $claim)
    {
        $input = $request->all();
        Claim::find($claim)->update($input);

        return redirect(route('claim.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function destroy(Claim $claim)
    {
        //
    }
}
