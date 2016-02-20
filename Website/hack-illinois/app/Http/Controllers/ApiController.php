<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function auth(Request $request){
    	$user = new User();
    	$user->email = $request->input('email');
    	$user->password = $request->input('password');
    	Auth::login($user);
    	if(Auth::user()){
    		$user = User::where('email','=',$request->input('email'))->get();
    		return $user;
    	}else{
    		return "You were not logged in";
    	}
    }

    public function testApi(Request $request){
    	$user = User::where('apikey', '=', $request->get('apikey'))->first();

    	return $user;
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'apikey' => bcrypt($data['email'] . "" . $data['password']),
            'apartment_id' => 1
        ]);
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            /*$this->throwValidationException(
                $request, $validator
            );*/
            return $validator->messages();
        }
        $user = $this->create($request->all());
        $auth = Auth::login($user);
        $user->save();

        return $user;
    }
}
