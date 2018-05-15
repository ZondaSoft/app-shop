<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // Relacion entre los modelos Cart y CartDetail
	public function details()
	{
		return $this->hasMany(CartDetail::Class);
	}
}
