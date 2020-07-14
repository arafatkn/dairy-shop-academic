<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

	public static $statuslist = ['Cancelled', 'Completed', 'Pending'];

	public function status()
	{
		return self::$statuslist[$this->status];
	}

	public function payment()
	{
		return $this->payment?"Paid":"Unpaid";
	}

	// Relations
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
