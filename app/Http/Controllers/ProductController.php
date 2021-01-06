<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/* List of functions in this Controller:
 *
 *	index()
 *	create()
 *	store(Request request)
 *	show($id)					NOT IMPLEMENTED
 *	edit($id)
 *	update(Request $request, $id)
 *	destroy($id)
 */


class ProductController extends Controller
{

    /** Display a listing of the resource. */
    public function index()
    {
		$products = Product::all();
        return view('products.index', ['products' => $products]);
    }


    /** Show the form for creating a new resource. */
    public function create()
    {
        return view('products.create');
    }


    /** Store a newly created resource in storage. 
	 * 
	 * The regex for the price and weight fields (double) is probably enough
	 * A double input on these fields, e.g. 0.25 for weight,  means 250 gr, 
	 * and we inform the user about it.
     */
    public function store(Request $request)
    {	
        $request->validate([
            'product_name'	=> 'required', 
			'exp_date'		=> 'required|date', 
			'qty'			=> 'required',
			'weight' 		=> 'nullable|regex:/^\d+(\.\d{1,3})?$/', 
			'price'			=> 'nullable|regex:/^\d+(\.\d{1,3})?$/'
		]);

        $product = new Product([
			'product_name'	=> $request->get('product_name'), 
        	'exp_date'		=> $request->get('exp_date'), 
			'qty'			=> $request->get('qty'), 
			'weight'		=> $request->get('weight'), 
			'price'			=> $request->get('price')
		]);
		
        $product->save();
        return redirect('/products')->with('success', 'product saved!');
    }


   	/** Display the specified resource. */
    public function show($id)
    {
        //
    }


    /** Show the form for editing the specified resource. */
    public function edit($id)
    {
		$product = Product::find($id);
		return view('products.edit', ['product' => $product]);
    }


    /** Update the specified resource in storage. */
    public function update(Request $request, $id)
    {   
        $request->validate([
            'product_name'	=> 'required', 
			'exp_date'		=> 'required|date', 
			'qty'			=> 'required', 
			'weight'		=> 'nullable|regex:/^\d+(\.\d{1,3})?$/', 
			'price'			=> 'nullable|regex:/^\d+(\.\d{1,3})?$/'
		]);

		$product = Product::find($id);
		$product->product_brand	= $request->get('product_brand');
        $product->exp_date		= $request->get('exp_date');
		$product->qty			= $request->get('qty');
		$product->weight		= $request->get('weight');
        $product->price			= $request->get('price');

        $product->save();
        return redirect('/products')->with('success', 'product updated!');
    }


    /** Removes a product from the database. */
	public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/products')->with('success', 'product deleted!');
    }
}
