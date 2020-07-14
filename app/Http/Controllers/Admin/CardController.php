<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AdminPanelController as Controller;
use App\{User,Card};
use \Carbon\Carbon;

class CardController extends Controller
{
    function __construct()
	{
        parent::__construct();
        $this->setView('card');
        $this->setRoute('cards');
		$this->data["breadcrumbs"][] = array( 'name' => 'Cards', 'url'=> $this->route('index'), );
	}

    public function index()
    {
        $this->header();
    	$this->data["cards"] = Card::latest()->get();
    	return $this->view('index');
    }

    // View One
    public function show(Card $card)
    {
        abort(404);
    }

    // Add New
    public function create()
    {
    	abort(404);
    }
    // Edit Page
    public function edit(Card $card)
    {
        abort(404);
    }

    public function store(Request $req)
    {
        $req->validate([
    		'amount' => 'bail|required|integer',
            'quantity' => 'bail|required|integer',
    	]);

    	$data = [];

    	for($i=0;$i<$req->quantity;$i++)
    	{
    		$data[] = Card::create([
    					'amount'=>$req->amount,
    					'balance'=>$req->amount,
    					'cardnum'=>rand( 10000000, 99999999 )
    				]);
    	}

    	if(count($data)==$req->quantity)
    	{
    		return redirect($this->route('index'))->withSuccess('Cards have been added successfully');
    	}
        else
        {
        	return back()->withErrors('Something is wrong here...');
        }
    }

    public function update(Card $card, Request $req)
    {
    	abort(404);
    }

    // Delete
    public function destroy(Card $card)
    {
    	if($card->delete())
    	{
    		return redirect($this->route('index'))->withSuccess($card->name.' has been deleted successfully');
    	}
        else
        {
        	return back()->withErrors('Something is wrong here...');
        }

    }
}
