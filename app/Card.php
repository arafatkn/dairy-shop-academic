<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $guarded = ['id'];

    public static $statuslist = ['Suspended', 'Active'];

	public function status()
	{
		return self::$statuslist[$this->status];
	}
}
