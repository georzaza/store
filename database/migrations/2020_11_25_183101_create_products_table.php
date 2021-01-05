<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/* 	Price and product_brand are just some extra fields.
	We could save the dates as a 'date' type in the table
	but since we validate them in our Controller, we simply
	save them as strings.
	The last field, 'product_type', is a foreign key that 
	pinpoints to the table product_types.

*/

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
			$table->increments('product_id');
			$table->timestamps();
			$table->string('product_name');
			$table->string('product_brand')->nullable();
			$table->string('exp_date');
			$table->string('exp_date_after_opening')->nullable();
			$table->string('opened_at')->nullable();
			$table->string('qty');
			$table->string('price')->nullable();
			$table->integer('product_type')->unsigned();
			
			// Probably should add onDelete("CASCADE') and change the destroy()
			// method of the ProductsController. 
			// More info is provided on the comment section of the method.
			$table->foreign('product_type')->references('product_type_id')->on('product_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
