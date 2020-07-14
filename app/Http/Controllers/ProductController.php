<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserPanelController as Controller;
use App\{User,Product,Review};
use \Carbon\Carbon;

class ProductController extends Controller
{
    function __construct()
    {
    	// $this->middleware(['auth'])->only(['reviewStore']);
    	$this->setView('product');
    	$this->setRoute('products');
        $this->data["breadcrumbs"][] = array('name' => 'Home', 'url'=> route('index'), );
    }

    public function index()
    {
        $this->header();
        $this->data["products"] = Product::with(['reviews'])->get();
        return $this->view('index');
    }

    public function show(Product $product)
    {
        $this->header();
        $this->data["breadcrumbs"][] = array('name' => $product->name, 'url'=> '#', );
        $product->load(['reviews']);
        $this->data["product"] = $product;
        return $this->view('show');
    }

    public function cartShow()
    {
        $this->header();
        $this->data["breadcrumbs"][] = array('name' => 'Cart', 'url'=> '#', );
        $this->data["cart"] = session()->get('cart',[]);
        return $this->view('cart');
    }

    public function cartStore(Request $req)
    {

    	$req->validate([
    		'product_id' => 'bail|required|integer|exists:products,id',
            'quantity' => 'bail|required|integer',
    	]);

    	$data = Product::find($req->product_id);
    	$data->quantity = $req->quantity;

    	$cart = $req->session()->get('cart',[]);
    	$cart[$data->id] = $data;
		session(['cart'=>$cart]);
    	//session()->save();

    	return back()->withSuccess('Product has been added to cart successfully');
    }

    public function cartDestroy($index)
    {
    	if($index=="all")
    	{
    		session()->forget('cart');
    		return back()->withSuccess('Cart has been cleared successfully');
    	}

    	$cart = session()->get('cart',[]);

    	unset($cart[$index]);

		session(['cart'=>$cart]);
    	session()->save();

    	return back()->withSuccess('Product has been removed from cart successfully');
    }

    public function reviewStore(Request $req)
    {
    	if(!auth()->check())
    		abort(403);

    	$req->validate([
    		'product_id' => 'bail|required|integer|exists:products,id',
            'rating' => 'bail|nullable|integer',
    	]);

    	$review = new Review();
    	$review->fill($req->only(['rating','text','product_id']));
    	$review->user_id = auth()->user()->id;

    	if($review->save())
    	{
    		return back()->withSuccess('Review has been added successfully');
    	}
        else
        {
        	return back()->withErrors('Something is wrong here...');
        }
    }
}
