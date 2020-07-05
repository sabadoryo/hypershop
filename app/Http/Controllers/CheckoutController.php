<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Session;
use Auth;
use Mail;
use function Sodium\add;

class CheckoutController extends Controller
{
    public function index()
    {
        if(!Session::has('cart')){
            return view('card');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout',['total'=>$total,'items'=>$cart->items]);
    }

    public function postCheckout(Request $request)
    {

        $validatedOrder = $request->validate([
           'name' => ['required'],
           'address' => 'required | min: 15 | max:255',
           'email' => 'nullable',
        ]);


        if($validatedOrder['email'] == null)
            $validatedOrder['email'] = Auth::user()->email;
        else
            $validatedOrder['email'] = $request->input('email');


        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $order = new Order();
        $cartItems = '';
        foreach($cart->items as $item){
            $cartItems .= $item['item']['title'] . ':' . $item['qty'] . ',';
        }
        $order->cart = $cartItems;
        $order->address = $validatedOrder['address'];
        $order->name = $validatedOrder['name'];
        $order->email = $validatedOrder['email'];
        $email = $order->email;

        Auth::user()->orders()->save($order);


        Mail::send('mails.order_mail',['name'=> $order->name,'email' => $email, 'items' => $cart->items,'totalPrice'=>$cart->totalPrice,'address'=>$order->address],
            function ($message) use ($email)
        {
            $message->from('info@hypershop.com','Order details');
            $message->to($email);
        });


        Session::forget('cart');
        return redirect()->route('home')->with('success','Successfully purchased products!');
    }
}
