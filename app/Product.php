<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

	public static $statuslist = ['Disabled', 'Enabled'];

	public function status()
	{
		return self::$statuslist[$this->status];
	}

	public function ratingFA()
	{
		$reviews = $this->reviews->where('rating','>','0');
		$rating = $reviews->sum('rating') / $reviews->count();
		$str = '';
		for($i=0;$i<(int)$rating;$i++)
		{
			$str .= '<i class="fa fa-star"></i>';
		}
		if(is_float($rating) > 0)
		{
			$str .= '<i class="fa fa-star-half-o"></i>';
			$i++;
		}
		for(;$i<5;$i++)
		{
			$str .= '<i class="fa fa-star-o"></i>';
		}
		$str .= '&nbsp;&nbsp;'.number_format($rating,2).' out of 5';
		return $str;
	}

	// Relations
	public function reviews()
	{
		return $this->hasMany(Review::class)->latest();
	}
}
