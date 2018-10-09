<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $guarded = [];

    public function bookchapter()
	{
		return $this->belongsTo('App\Book','bookId');
	}
	public function chapterauthor()
	{
		return $this->belongsTo('App\User','userId');
	}
}
