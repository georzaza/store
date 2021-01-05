<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*	We have more info than needed in this model to provide the basic 
	functionality that we want, but nevertheless we keep it as it is. 
*/
class Product extends Model
{
	protected $primaryKey = 'product_id';
	
	// guarded prevents mass-assignment on these fields.
	// Naturally, we want to protect our id from this effect
    protected $guarded = ['product_id'];
    protected $fillable = [
		'product_name', 
		'product_brand', 
        'exp_date', 
        'exp_date_after_opening', 
        'opened_at', 
        'qty', 
        'product_type', 
        'price'  
    ];
}
