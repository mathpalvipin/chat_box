<?php

namespace App\Http\Controllers;
use App\User;
use App\Messages;
use App\Events\NewMessage;
use Illuminate\Http\Request;

class contactController extends Controller
{
	function get(){
		 $contacts = User::where('id', '!=', auth()->id())->get();
		 $unreadid=Messages::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
		 ->where('to',auth()->id())
		 ->where('read',false)
		 ->groupBy('from')
		 ->get();
		
		 $contacts = $contacts->map(function ($contact)use($unreadid){
		 	$contactunread = $unreadid->where ('sender_id', $contact->id)->first();
		 	$contact->unread=$contactunread ? $contactunread->messages_count:0;
		 	return $contact;
		 });

		 return response()->json($contacts);

	} 
	function getMessages($id){
		Messages::where('from',$id)->where('to',auth()->id())->update(['read'=>true]);
		$messages= Messages::where(function($q) use ($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })
        ->get();		
		return response()->json($messages);
	}
	function send(Request $request){

		$messages=Messages::create([
			'from'=>auth()->id(),
			'to'=>$request->contact_id,
			'text'=>$request->text

		]);

		event(new NewMessage($messages));
		return response()->json($messages);
	}
    //
}
	