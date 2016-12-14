<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	 
	
	protected $fillable = [
		'client_id',
		'user_deliveryman_id',
		'total',
		'status'
	];
	
	
	public function items()
	{
		return $this->hasMany(OrderItem::class);
	}
	
	public function deliveryman()
	{
		return $this->belongsTo(User::class);
	}
	
	
	public function client()
	{
		return $this->belongsTo(Client::class);
	}
	
	/*public function cupom()
	{
		return $this->belongsTo(Cupom::class);
	}
	
	 
	
	public function category()
	{
		return $this->belongsTo(Category::class);
	}*/
	
}
