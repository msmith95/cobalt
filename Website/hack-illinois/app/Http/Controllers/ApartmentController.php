<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{
    public function index(){
    	return view('apartments.index');
    }

    public function create(Request $request){
    	$this->validate($request, [
    		'name' => 'required'
    		]);
    	$apartment = Apartment::create($request->all());
    	$user = Auth::user();

    	$user->apartment_id = $apartment->id;
    	$user->save();
    	return redirect('home');
    }

    public function addToExisting(Request $request){
    	$user = Auth::user();
    	$apartment;
    	if($request->input('apt-name') != ''){
    		$apartment = Apartment::where('name', '=', $request->input('apt-name'))->get();
    	}else if($request->input('apt-id') != ''){
    		$apartment = Apartment::findOrFail($request->input('apt-id'));
    	}else{
    		return redirect('pickApartment');
    	}
    	$user->apartment_id = $apartment->id;
    	$user->save();

    	return redirect('home');
    }
}
