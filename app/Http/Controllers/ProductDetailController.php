<?php

namespace App\Http\Controllers;

use App\ProductDetail;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products=ProductDetail::where('userId','=',Auth::user()->id)->with('product')->get();
        return view('cart.index',['products'=>$products]);
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
        $product=new ProductDetail();
        $product->userId=Auth::user()->id;
        $product->idProduct=$request->input('productId');
        $product->quantity=1;
        $product->save();
        return redirect('/user/cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=ProductDetail::with('product')->find($id);
        return view('cart.edit',['product'=>$product]);

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
        $product=ProductDetail::find($id);
        $product->quantity=$request->input('quantity');
        $product->save();
        return redirect('/user/cart');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=ProductDetail::find($id);
        $product->delete();
        Session::flash('flash_message','Producto eliminado del carro');
        return redirect('/user/cart');
    }
}
