<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$product = Product::all() ;
        $products = Product::latest()->paginate(4) ;
        
        return view('products.index' , compact ('products')) ;
    }
    
    public function trashedProducts()
    {
        //
        //$product = Product::all() ;
        //$products = Product::withoutTrashed()->latest()->paginate(4) ;
        $products = Product::onlyTrashed()->latest()->paginate(4) ;
        return view('products.trash' , compact ('products')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required' ,
            'price'=>'required' , 
            'detail' => 'required'
        ]) ;
        $product = Product::create($request->all()) ;
        return redirect()->route('products.index')
            ->with('success' , 'product added sucessfully') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    
        return view('products.show' , compact ('product') ) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // lel view
        
        return view('products.edit' , compact ('product') ) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //  lel server
        $request->validate([
            'name'=>'required' ,
            'price'=>'required' ,
            'detail'=>'required'
        ]) ;
        $product->update($request->all()) ;
        return redirect()->route('products.index')
            ->with('success' , 'product updated sucessfully') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete() ;
        return redirect()->route('products.index')
            ->with('success' , 'product deleted sucessfully') ;
    }

    public function softDelete( $id)
    {
        //
        $product = Product::find($id)->delete() ;
        return redirect()->route('products.index')
            ->with('success' , 'product deleted sucessfully') ;
    }

    public function backFromSoftDelete( $id)
    {
        //
        $product = Product::onlyTrashed()->where('id' , $id)->first()->restore() ;
        return redirect()->route('products.index')
            ->with('success' , 'product restored sucessfully') ;
    }

    public function  deleteForEver(  $id)
    {

        $product = Product::onlyTrashed()->where('id' , $id)->forceDelete();

        return redirect()->route('product.trash')
        ->with('success','product deleted successflly') ;
    }
}
