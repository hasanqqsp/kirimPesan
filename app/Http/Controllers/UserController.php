<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;  
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show($id){
		$data = [
			"user" => User::with('messages.replies')->findOrFail($id),
		];
			return view('message',$data);
		}
	
    public function bio(Request $request, $id){
		$user = User::findOrFail($id);
		$user->update([
		"bio" => $request->bio
		]);
		
		return redirect('/'.$id.'?admin=1')->with('success','Bio berhasil diubah.');
		}

    public function settings(Request $request, $id){
	  $validator = Validator::make($request->all(),[
		  "name" => "required|max:40",
		  "email" => "required|email:rfc,dns",
	  ]);
	  if ($validator->fails()) {
		return redirect('/'.$id.'?admin=1')->with('danger','Perubahan profil gagal.')
								->withInput()
								->withErrors($validator);
	  }
	  $data = $validator->validated();
	  $data["defaultHide"] = $request->input('defaultHide')=='on' ? 1:0;
	  User::findOrFail($id)->update($data);
	  return redirect('/'.$id.'?admin=1')->with('success','Perubahan profil disimpan.');
      }
	public function avatar(Request $request, $id){
		if(str_starts_with($request->avatar,"data:image/png;base64")){
			$filename = $id . "-avatar.png";
			@list($type, $file_data) = explode(';', $request->avatar);
			@list(, $file_data) = explode(',', $file_data); 
			Storage::put('user-avatar/'. $filename, base64_decode($file_data));
			$data = ["avatar" => "user-avatar/".$filename];
			User::findOrFail($id)->update($data);
			return redirect('/'.$id.'?admin=1')->with('success','Perubahan avatar disimpan.');
		} else {
			return redirect('/'.$id.'?admin=1')->with('danger','Perubahan avatar gagal.');
		}
	 }
	public function avatarDelete($id){
		$filename = $id . "-avatar.png";
		if(Storage::delete('user-avatar/'. $filename)){
			$data = ["avatar" => null];
			User::findOrFail($id)->update($data);
			return redirect('/'.$id.'?admin=1')->with('success','Avatar berhasil dihapus.');
		} else {
			return redirect('/'.$id.'?admin=1')->with('danger','Avatar gagal dihapus.');
		}
	 }

	public function store(Request $request){
		$validatedData = $request->validate([
			"name" => "required|max:40",
			"email" => "email:dns,rfc|unique:users",
			"password" => ["required","confirmed",Password::min(6)->letters()]
		]);
		$id = strtolower(Str::random(8));
	
		while(User::find($id)){
			$id = strtolower(Str::random(8));
		};

		$validatedData["password"] = Hash::make($validatedData["password"]);
		$validatedData["id"] = $id;

		User::create($validatedData);

		return redirect('/'.$id.'?admin=1')->with("success", "Akun dan dashboard berhasil dibuat");
			}
	
	public function password(Request $request, $id){
		$user = User::findOrFail($id);
		if (Hash::check($request->old_password,$user->password)) {
			$validator = Validator::make($request->all(),[
				"old_password" => "required",
				"new_password" => ["required","confirmed",Password::min(6)->letters()]
			]);
			if ($validator->fails()) {
				return redirect('/'.$id.'?admin=1')->with('danger','Perubahan password gagal.')
									  ->withInput()
									  ->withErrors($validator);
			}
			$data = [
				"password" => Hash::make($validator->validated()["new_password"])
			];
			$user->update($data); 
			return redirect('/'.$id.'?admin=1')->with('success','Perubahan profil disimpan.');
		}
		return redirect('/'.$id.'?admin=1')->with('danger','Perubahan password gagal.')
									  ->withInput()
									  ->withErrors(["old_password" => "Password Salah"]);
			}

	public function authenticate(Request $request)	{
		$credentials = $request->validate([
			"email" => "required|email:rfc",
			"password" => "required"
		]);

		if(Auth::attempt($credentials)){
			$request->session()->regenerate();

			return redirect()->intended('/'.Auth::user()->id.'?admin=1');
		}else{
			return back()->withErrors([
				"credentials" => "Invalid Credentials"
			])->with("success","Login Success");
		}
		
			}
	public function logout(Request $request){
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect('/login');

	}
}