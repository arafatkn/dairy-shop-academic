<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserPanelController as Controller;
use App\{User,Product,Order,Card};
use \Carbon\Carbon;

class OrderController extends Controller
{
    function __construct()
    {
    	parent::__construct();
    	$this->setView('order');
    	$this->setRoute('order');
        $this->data["breadcrumbs"][] = array('name' => 'Order', 'url'=> '#', );
    }

    public function payment()
    {
        $this->header();
        $this->data["breadcrumbs"][] = array('name' => 'Payment', 'url'=> '#', );
        return $this->view('payment');
    }

    public function paymentStore(Request $req)
    {
        $req->validate([
            'cardnum' => 'bail|required|integer',
        ]);

        $card = Card::where('cardnum',$req->cardnum)->first();
        if(!$card)
        {
            return back()->withErrors('Invalid Card Details...');
        }

        $cart = collect(session()->get('cart',[]));
        $price = $cart->sum(function($item){ return $item->price*$item->quantity; });

        if($card->balance < $price)
        {
            return back()->withErrors('Not enough balance on card...');
        }

        $this->user = auth()->user();

        $shipping = session()->get('shipping',$this->user);
        //return dd($shipping);
        $order = new Order();
        $order->fill($shipping);

        $data = [
            'user_id'=>$this->user->id,
            'amount'=>$price, 'products'=>$cart->toJson(), 'status'=>2, 'payment'=>1,
            //'type'=>$shipping->type,'end_date'=>$shipping->end_date,
            //'name'=>$shipping->name, 'mobile'=>$shipping->mobile, 'address'=>$shipping->address, 'message'=> $shipping->message,
        ];

        $order->fill($data);

        if($order->save())
        {
            session()->forget('cart');
            session()->forget('shipping');
            $card->decrement('balance', $price);

            return redirect()->route('order.done')->withSuccess('Congratulations! Your Order has been placed.');
        }
        else
        {
            return back()->withErrors("Something is wrong...");
        }
        
    }

    public function shipping()
    {
        $this->header();
        $this->data["breadcrumbs"][] = array('name' => 'Shipping', 'url'=> '#', );
        return $this->view('shipping');
    }

    public function shippingStore(Request $req)
    {

    	$req->validate([
    		'name' => 'bail|required',
            'mobile' => 'bail|required',
            'address' => 'bail|required',
            'type' => 'bail|required',
    	]);

    	$data = $req->only(['name','mobile','address','type','end_date','message']);
		session(['shipping'=>$data]);

    	return redirect()->route('order.payment')->withSuccess('Shipping address confirmed. Please pay now.');
    }

    public function done()
    {
        $this->header();
        $this->data["breadcrumbs"][] = array('name' => 'Order Done', 'url'=> '#', );
        return $this->view('done');
    }
}
