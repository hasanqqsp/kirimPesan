<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Str;
class MessageController extends Controller
{
	
	public function store (Request $request, $user_id) {
		$id = strtolower(Str::random(8));
		$isHidden = User::where('id',$user_id)->get('defaultHide')[0]['defaultHide'];
		while(Message::find($id)){
			$id = strtolower(Str::random(8));
		};
		$message_data = [
			'id' => $id,
			'user_id' => $user_id,
			'isHidden' => $isHidden,
			'message' => $request->message
		];
		
		Message::create($message_data);
		
		return redirect('/'.$user_id)->with('success','Pesan anda berhasil dikirimkan.');
	}
	
    public function destroy ($id,$messageId){
		Message::destroy($messageId);
		return redirect('/dashboard/'.$id)->with('danger','Pesan Telah dihapus');
	}
	
	public function hide ($id,$messageId){
		$message = Message::findOrFail($messageId);
	
		if ($message->isHidden) {
			$message->update(['isHidden' => 0]);
		}else {
			$message->update(['isHidden' => 1,
							'isPinned' => 0,
							]);
		};
		return redirect('/dashboard/'.$id);
	}
	
	public function pin ($id,$messageId){
		$message = Message::findOrFail($messageId);
		if ($message->isPinned) {
			$message->update(['isPinned' => 0]);
		}else {
			$message->update(['isPinned' => 1,
							'isHidden' => 0
							]);
		};
		return redirect('/dashboard/'.$id);
	}
	
	public function show ($id,$messageId) {
		$message = Message::with('user','replies')->findOrFail($messageId);
		return view('showMessage',[
			"message" => $message
		]);
	}
	public function dashboardShow ($id,$messageId) {
		$message = Message::with('user','replies')->findOrFail($messageId);
		return view('dashboardReply',[
			"message" => $message
		]);
	}
}
