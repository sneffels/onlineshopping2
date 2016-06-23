<?php

namespace App\Http\Controllers;

use App\ProductDetail;
use App\Purchase;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=ProductDetail::where('userId','=',Auth::user()->id)->with('product')->get();
        return view('purchase.create',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products=ProductDetail::where('userId','=',Auth::user()->id)->with('product')->get();
        foreach($products as $product)
        {
            $purchase=new Purchase();
            $purchase->userId=Auth::user()->id;
            $purchase->productId=$product->product->id;
            $purchase->quantity=$product->quantity;
            $purchase->creditCardNumber=$request->input('creditCardNumber');
            $purchase->provider=$request->input('provider');
            $purchase->save();
            $p=ProductDetail::find($product->id);
            $p->delete();
        }
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
        //
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
        //
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
