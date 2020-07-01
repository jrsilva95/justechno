<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use App\AddressState;

class SettingsController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business = Business::find(auth()->user()->business->id);
        return view('settings.index')->with('business', $business);
    }
    
    public function editBusiness(){
        
        $business = Business::find(auth()->user()->business->id);
        $states = AddressState::all();
        
        return view('settings.business.edit')->with('business', $business)->with('states', $states);
    }
    
    public function storeBusiness(Request $request){
        
        $business = Business::find($request->input('id'));
        
        $phone = $business->phone;
        $address = $business->address;
        
        $business->name = $request->input('name');
        
        preg_match('/\(([0-9]{2})\) ([0-9-]*)/', $request->input('phone'), $matches, PREG_OFFSET_CAPTURE);
        
        $phone->ddd = $matches[1][0];
        $phone->number = preg_replace('/[^0-9]/', '', $matches[2][0]); //Mantem so os numeros
        
        return $request;
        
        //return redirect('/settings');
    }
    
}
