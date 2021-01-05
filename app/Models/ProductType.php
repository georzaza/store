<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/* 	This Model is not necessary anymore. We would like to use it 
	and provide more complex functionality than we already do, but 
	we have already have trouble with implementing our basic idea. 
	Nevertheless we keep it. 
	What follows is the initial thought of why to use such a Model.

	Consider the case where we have two products in our database
   	that are the same. Eg. we have Yogurt 5% and Yogurt 2%.
	This Model describes the fields of a table that categorizes these 
	products. We will have one entry in that table for all the Yogurts 
	that our database has.
	The products table has a foreign key that pinpoints to the 
	products_type table .
*/
class ProductType extends Model
{
	protected $primaryKey = 'product_type_id';
	
	// guarded prevents mass-assignment on these fields.
	// Naturally, we want to protect our id from this effect
    protected $guarded = ['product_type_id'];
    protected $fillable = [
		'type', 		
    ];
}
