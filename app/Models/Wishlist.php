<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
	use HasFactory;
	protected $table = 'wishlist';

	protected $fillable = [ 
		'id',
		'product_id',
		'status',
		'user_id',
		'created_at',
		'updated_at'
	];

	public function image() 
	{
		return $this->hasMany(ImgProduct::class, 'product_id','product_id');
	}

	public function product() 
	{
		return $this->hasOne(MstProduct::class, 'id','product_id');
	}
}
