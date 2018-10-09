<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Book;
use Carbon\Carbon;

class Overview extends Model
{
    public function booksCounter()
	{
	 $bookscount = Book::all();
     return count($bookscount);
	}
	public function usersCounter()
	{
	 $userscount = User::all();
     return count($userscount);
	}

	public function mybooksCounter()
	{
	 $id = \Auth::user()->id;
	 $mybookscount  = Book::where('userId',$id)->orderBy('created_at','desc')->get();
     return $mybookscount;
	}

	public function bffNotifications($coauthor)
	{
	  $mynotifications = $coauthor->where('status','0');
	  return count($mynotifications); 
	}
	public function notificationTime($inviteTime)
	{
		
     $today = Carbon::now();
     return $today->diffInDays($inviteTime);

	}
	                

}
