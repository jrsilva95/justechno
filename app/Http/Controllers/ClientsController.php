<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Gender;
use App\MaritalStatus;
use App\ClientType;
use DateTime;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(10);
        return view('clients.index')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders = Gender::all();
        $maritalStatuses = MaritalStatus::all();
        $clientTypes = ClientType::all();
        return view('clients.create')
            ->with('genders', $genders)
            ->with('maritalStatuses', $maritalStatuses)
            ->with('clientTypes', $clientTypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //return $request;
        
        $this->validate($request, [
            'cpf_cnpj' => 'required',
            'name' => 'required',
            
        ]);
        
        $client = new Client;
        $client->name = $request->input('name');
        $client->social_name = $request->input('social_name');
        $client->cpf_cnpj = preg_replace('/[^0-9]/', '', $request->input('cpf_cnpj'));
        $client->rg = $request->input('rg');
        $client->date_emission = $request->input('date_emission');
        $client->org_emitter = $request->input('org_emitter');
        $client->birth_day = DateTime::createFromFormat('d/m/Y', $request->input('birth_day'))->format('Y-m-d');
        $client->ctps = $request->input('ctps');
        $client->ctps_serie = $request->input('ctps_serie');
        $client->pis = $request->input('pis');
        $client->titulo_eleitor = $request->input('titulo_eleitor');
        $client->nit = $request->input('nit');
        $client->business_id = auth()->user()->employee->business_id;
        $client->save();
        
        return redirect('/clients/' . $client->id);
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
