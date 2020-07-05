<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use Illuminate\Http\Request;
use Session;
class CardController extends Controller
{
    public function index()
    {
        if(!Session::has('cart')){
            return view('shop.card',['msg'=>'There is no items in cart']);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('shop.card',['items'=>$cart->items,'totalPrice'=>$cart->totalPrice,'msg'=>null]);

    }

    public function getAddToCart(Request $request, $id)
    {
        $item = Item::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($item,$item->id);
        $request->session()->put('cart',$cart);
        return response()->json(['success'=>'Sucessfully added','totalQty' =>$cart->totalQty, 'itemTitle'=>$item->title ],200);

    }

    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        Session::put('cart',$cart);

        if($cart ->totalQty == 0){
            Session::remove('cart');
        }

        return redirect()->route('card');
    }
}
