<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lawsuit;
use App\LawsuitStatus;
use App\LawsuitType;
use App\Judge;

class LawsuitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lawsuits = Lawsuit::paginate(10);
        return view('lawsuits.index')->with('lawsuits', $lawsuits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lawsuitsSatuses = LawsuitStatus::all();
        $lawsuitsTypes = LawsuitType::all();
        $judges = Judge::all();
        
        return view('lawsuits.create')
            ->with('lawsuitsSatuses', $lawsuitsSatuses)
            ->with('lawsuitsTypes', $lawsuitsTypes)
            ->with('judges', $judges);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
