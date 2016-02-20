<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< Updated upstream
=======
use App\Chore;

>>>>>>> Stashed changes

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
        $chores = Auth::user()->chores;
        $apartment = Auth::user()->apartment;
        $listOfChores = array();
        $listOfRoommates = array();
        foreach ($apartment->user as $user) {
            if($user->id != Auth::user()->id){
                $listOfChores[''.$user->name] = $user->chores;
                $listOfRoommates[''.$user->name] = $user;
            }
        }
        //dd($listOfChores);
        return view('home.index', compact('chores', 'listOfChores', 'listOfRoommates'));
<<<<<<< Updated upstream
=======
    }

    public function completeChore($id){
        $chore = Chore::findOrFail($id);
        $chore->finished_today = "Yes";
        $chore->save();
        Auth::user()->numberOfCompletedChores++;
        Auth::user()->save();
        return redirect('home');
>>>>>>> Stashed changes
    }
}
