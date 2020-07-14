<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	protected $guarded = ['id'];
	
	public function ratingFA()
	{
		$str = '';
		for($i=0;$i<$this->rating;$i++)
		{
			$str .= '<i class="fa fa-star"></i>';
		}
		if($this->rating-(int)$this->rating > 0)
		{
			$str .= '<i class="fa fa-star-half-alt-o"></i>';
			$i++;
		}
		for(;$i<5;$i++)
		{
			$str .= '<i class="fa fa-star-o"></i>';
		}
		return $str;
	}

	// Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
