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
     * @return void
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
        $chores = Auth::user()->chores()->due()->get();
        $apartment = Auth::user()->apartment;
        $listOfChores = array();
        $listOfRoommates = array();
        foreach ($apartment->user as $user) {
            if($user->id != Auth::user()->id){
                $listOfChores[''.$user->name] = $user->chores()->due()->get();
                $listOfRoommates[''.$user->name] = $user;
            }
        }
        //dd($listOfChores);
        return view('home.index', compact('chores', 'listOfChores', 'listOfRoommates'));
    }

    public function completeChore($id){
        $chore = Chore::findOrFail($id);
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
            //dd($chore);
            $chore->save();
        }else{
            $chore = new Chore($request->all());
            $chore->apartment_id = $apartment->id;
            $chore->assigned_user_id = $roommates[$choreCount % count($roommates)-1]->id;
            //dd($chore);
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
