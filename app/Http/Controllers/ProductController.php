<?php

namespace App\Http\Controllers;

use App\Product;
use Faker\Provider\File;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Mockery\CountValidator\Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('products.index',['products'=>$products]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
        ]);
        $product=new Product();
        $product->name          =   $request->input('name');
        $product->description   =   $request->input('description');
        $product->price         =   $request->input('price');

        $product_image=$request->file('image_path');

        $product->image_path=$product_image->getClientOriginalName();
        $product->save();
        $product_image->move(public_path().'/images/',$product_image->getClientOriginalName());
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product =Product::find($id);
        return view('products.show',['product'=>$product]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        return view('products.edit')->with(['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'save'=>'required'
        ]);
        $product=Product::find($id);
        $product->name          =   $request->input('name');
        $product->description   =   $request->input('description');
        $product->price         =   $request->input('price');
        $product->save          =   $request->input('save');


        if(file_exists(public_path().'/images/'.$request->file('image_path'))) {

        }
        else
        {
            $product_image = $request->file('image_path');
            $product->image_path = $product_image->getClientOriginalName();
            $product_image->move(public_path() . '/images/', $product_image->getClientOriginalName());
        }

        $product->save();
        return redirect('/products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
