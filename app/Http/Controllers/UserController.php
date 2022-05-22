<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function show($id){
		$data = [
			"user" => User::with('messages.replies')->findOrFail($id),
		];
	    //return $data;
		return view('sender',$data);
		}
		
	public function dashboard($id){
		$data = [
			"user" => User::with('messages.replies')->findOrFail($id),
		];
		return view('receive',$data);
		}
}
