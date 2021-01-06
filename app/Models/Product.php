<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
	protected $primaryKey = 'product_id';
	
	// guarded prevents mass-assignment on these fields.
	// Naturally, we want to protect our id from this effect
    protected $guarded = ['product_id'];
    protected $fillable = [
		'product_name', 
        'exp_date', 
		'qty', 
		'weight', 
        'price'  
    ];
}
