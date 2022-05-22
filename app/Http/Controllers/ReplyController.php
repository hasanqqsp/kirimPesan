<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reply;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Str;
class ReplyController extends Controller
{
    public function store (Request $request, $user_id,$message_id) {
		$id = strtolower(Str::random(8));
		$isHidden = User::where('id',$user_id)->get('defaultHide')[0]['defaultHide'];
		while(Reply::find($id)){
			$id = strtolower(Str::random(8));
		};
		$message_data = [
			'id' => $id,
			'message_id' => $message_id,
			'isHidden' => $isHidden,
			'message' => $request->message
		];
		
		Reply::create($message_data);
		
		return redirect('/'.$user_id.'/'.$message_id)->with('success','Pesan balasan anda berhasil dikirimkan.');
	}
	
    public function destroy ($id,$messageId,$replyId){
		Reply::destroy($replyId);
		return redirect('/dashboard/'.$id.'/'.$messageId)->with('danger','Pesan balasan Telah dihapus');
	}
	
	public function hide ($id,$messageId,$replyId){
		$reply = Reply::findOrFail($replyId);
	
		if ($reply->isHidden) {
			$reply->update(['isHidden' => 0]);
		}else {
			$reply->update(['isHidden' => 1,
							'isPinned' => 0,
							]);
		};
		return redirect('/dashboard/'.$id.'/'.$messageId);
		
	}
}
