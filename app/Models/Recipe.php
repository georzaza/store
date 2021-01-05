<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
	protected $primaryKey = 'recipe_id';
	
	// guarded prevents mass-assignment on these fields.
	// Naturally, we want to protect our id from this effect
    protected $guarded = ['recipe_id'];
    protected $fillable = [
		'recipe_name', 
		'execution'
		// maybe here add the count of the ingredients. 
		// in our html view we name the ingredients input tag
		// based on how many they are. Maybe we can use that 
		// to get the count of the ingredients easily.
		// otherwise we have to query the ingredients and the 
		// recipes tables and count the matches...
    ];
}
