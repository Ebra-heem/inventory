<?php

namespace App\Http\Controllers;

use DB;
use App\Product;
use App\Category;
use App\Wirehouse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create(['name'=>$request->name]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
       
        $stocks = DB::table('products')
        ->join('stocks', 'products.id', '=', 'stocks.product_id')
        ->select('stocks.*', 'products.code', 'products.name','products.category_id')
        ->where('products.category_id',$category->id)
        ->get(); 
        // return $stocks;
        $products=Product::where('status',1)->get();
        $wirehouses=Wirehouse::where('status',1)->get();

        $categories=Category::all();

        // return view('backend.stock.index',compact('categories'));
        return view('backend.stock.index',compact('stocks','products','wirehouses','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
