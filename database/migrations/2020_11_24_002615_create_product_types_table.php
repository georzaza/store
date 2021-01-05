<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*	This table categorizes the products. 
 *  E.g. if we have two products in our database, 
 *  say Yogurt 5% and Yogurt 2%, this table will 
 *  have one entry named Yogurt. 
 *  What we initially thought we could do with this array
 *  is allowing the user to search the recipes based on 
 *  a product category. 
 *  We do not implement this functionality though and this
 *  table gives almost no value to our project, but we kept it. 
 * 
 */
class CreateProductTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_types', function (Blueprint $table) {
            $table->increments('product_type_id');
			$table->timestamps();
			$table->string('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_types');
    }
}
