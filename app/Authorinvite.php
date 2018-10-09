<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authorinvite extends Model
{
     protected $fillable = [
        'bookId', 'coauthorId', 'status'
    ];

    public function coauthorbook()
	{
		return $this->belongsTo('App\Book','bookId');
	}

	public function coauthor()
	{
		return $this->belongsTo('App\User','coauthorId');
	}
}
