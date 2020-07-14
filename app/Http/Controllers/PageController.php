<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserPanelController as Controller;
use App\{User,Product,Review};
use \Carbon\Carbon;

class PageController extends Controller
{
    function __construct()
    {

        $this->data["breadcrumbs"][] = array('name' => 'Home', 'url'=> route('index'), );
    }

    public function index()
    {
        return redirect()->action('ProductController@index');
    }
}
