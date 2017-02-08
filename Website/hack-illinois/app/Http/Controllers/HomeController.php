<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Chore;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $chores = $user->chores()->due()->get();
        $apartment = $user->apartment()->with('user')->first();
        $apartmentChores = $apartment->chores()->with('user')->get()->groupBy('user.name');
        $apartmentChores->forget($user->name);
        $roommates = $apartment->user()->get()->keyBy('id')->forget($user->id);
        return view('home.index', compact('chores', 'apartmentChores', 'roommates'));
    }

    public function completeChore(Chore $chore){
        $chore->finished_today = "Yes";
        $chore->save();
        Auth::user()->numberOfCompletedChores++;
        Auth::user()->save();
        return redirect('home');
    }

    public function addChore(){
       return view('addChore.index');
    }

    public function createChore(Request $request){
        $user = Auth::user();
        $apartment = $user->apartment;
        $roommates = $apartment->user;
        $choreCount = count($apartment->chores)+1;
        if($choreCount % count($roommates) == 0){
            $chore = new Chore($request->all());
            $chore->apartment_id = $apartment->id;
            $chore->assigned_user_id = $roommates[count($roommates)-1]->id;
            $chore->save();
        }else{
            $chore = new Chore($request->all());
            $chore->apartment_id = $apartment->id;
            $chore->assigned_user_id = $roommates[$choreCount % count($roommates)-1]->id;
            $chore->save();
        }
        return redirect('addChore');
    }

    public function showDelete(){
        $user = Auth::user();
        $chores = $user->apartment->chores;

        return view('deleteChore.index', compact('chores'));
    }

    public function deleteChore($id){
        $chore = Chore::findOrFail($id);
        if(Auth::user()->apartment->id == $chore->apartment->id){
            $chore->delete();
            return redirect('showDelete');
        }else{
            return redirect('/');
        }
    }
}
