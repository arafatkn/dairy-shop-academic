<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AdminPanelController as Controller;
use App\{User,Product,Order};
use \Carbon\Carbon;

class OrderController extends Controller
{
    function __construct()
	{
        parent::__construct();
        $this->setView('order');
        $this->setRoute('orders');
		$this->data["breadcrumbs"][] = array( 'name' => 'Orders', 'url'=> $this->route('index'), );
	}

    public function index(Request $req)
    {
        $this->header();
        $this->data["statuslist"] = Order::$statuslist;
        if($req->has('status'))
        {
        	$this->data["statusFull"] = Order::$statuslist[$req->status];
        	$this->data["orders"] = Order::where('status',$req->status)->latest()->get();
        }
        else
        {
        	$this->data["statusFull"] = "All";
        	$this->data["orders"] = Order::latest()->get();
        }
    	
    	return $this->view('index');
    }

    public function status(Order $order, $status)
    {
    	if(!isset(Order::$statuslist[$status]))
    		abort(404);

    	$order->status = $status;

        if($order->save())
        {
            return redirect($this->route('index'))->withSuccess('Order has been updated successfully');
        }
        else
        {
            return back()->withErrors('Something is wrong here...');
        }
    }

    // View One
    public function show(SeminarVenue $venue)
    {
        abort(404);
    }

    // Add New
    public function create()
    {
    	abort(404);
    }
    // Edit Page
    public function edit(Order $order)
    {
        abort(404);
    }
    
    // Delete
    public function destroy(Order $order)
    {
    	if($order->delete())
    	{
    		return redirect($this->route('index'))->withSuccess($order->name.' has been deleted successfully');
    	}
        else
        {
        	return back()->withErrors('Something is wrong here...');
        }

    }
}
