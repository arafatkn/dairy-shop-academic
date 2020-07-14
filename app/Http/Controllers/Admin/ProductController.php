<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AdminPanelController as Controller;
use App\{User,Product};
use \Carbon\Carbon;

class ProductController extends Controller
{
    function __construct()
	{
        parent::__construct();
        $this->setView('product');
        $this->setRoute('products');
		$this->data["breadcrumbs"][] = array( 'name' => 'Products', 'url'=> $this->route('index'), );
	}

    public function index()
    {
        $this->header();
        $this->data["statuslist"] = Product::$statuslist;
    	$this->data["products"] = Product::orderBy('name','asc')->get();
    	return $this->view('index');
    }

    // View One
    public function show(SeminarVenue $venue)
    {
        abort(404);
    }

    // Add New
    public function create()
    {
    	$this->header();
    	$this->data["breadcrumbs"][] = array( 'name' => 'Add', 'url'=> '#', );
    	$this->data["statuslist"] = Product::$statuslist;
        return $this->view('create');
    }
    // Edit Page
    public function edit(Product $product)
    {
        $this->header();
        $this->data["breadcrumbs"][] = array( 'name' => $product->name, 'url'=> $this->route('index'), );
    	$this->data["breadcrumbs"][] = array( 'name' => 'Edit', 'url'=> '#', );
    	$this->data["statuslist"] = Product::$statuslist;
    	$this->data["product"] = $product;
        return $this->view('edit');
    }

    public function store(Request $req)
    {
        $req->validate([
    		'name' => 'bail|required',
            'price' => 'bail|required|numeric',
            'stock' => 'bail|required|integer',
            'unit' => 'bail|required',
    		'status' => 'bail|required|boolean',
    		'image' => 'bail|required|max:10240|image',
    	]);

    	$product = new Product();

        $product->fill( $req->only(['name','price','stock','unit','status','description']) );

        $file = $req->file('image');
        $image = date('Y_m_d_H_i_s').'_'.$file->getClientOriginalName();
        $file->storeAs('images/products', $image, 'public');
        $product->image = $image;

    	if($product->save())
    	{
    		return redirect($this->route('index'))->withSuccess($req->name.' has been added successfully');
    	}
        else
        {
        	return back()->withErrors('Something is wrong here...');
        }
    }

    public function update(Request $req, Product $product)
    {
        $req->validate([
    		'name' => 'bail|required',
            'price' => 'bail|required|numeric',
            'stock' => 'bail|required|integer',
            'unit' => 'bail|required',
    		'status' => 'bail|required|boolean',
    		'image' => 'bail|nullable|max:10240|image',
    	]);

        $product->fill( $req->only(['name','price','stock','unit','status','description']) );

        $oldimage = $product->image;

        $file = $req->file('image');
        if($file)
        {
	        $image = date('Y_m_d_H_i_s').'_'.$file->getClientOriginalName();
	        $file->storeAs('images/products', $image, 'public');
	        $product->image = $image;
	    }

        if($product->save())
        {
        	if($file)
        		Storage::disk('public')->delete('images/products/'.$oldimage);
            return redirect($this->route('index'))->withSuccess($req->name.' has been updated successfully');
        }
        else
        {
            return back()->withErrors('Something is wrong here...');
        }
    }

    // Delete
    public function destroy(Product $product)
    {
    	if($product->delete())
    	{
    		return redirect($this->route('index'))->withSuccess($product->name.' has been deleted successfully');
    	}
        else
        {
        	return back()->withErrors('Something is wrong here...');
        }

    }
}
