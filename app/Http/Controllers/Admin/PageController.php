<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminPanelController as Controller;
use App\{User};
use \Carbon\Carbon;

class PageController extends Controller
{
    function __construct()
    {
        parent::__construct();

        $this->viewFolder = "admin.";
        $this->routeFolder = "admin.";
        $this->data["breadcumbs"][] = array('name' => 'Admin', 'url'=> '/admin', );
    }

    public function index()
    {
        $this->header();
        $this->data["breadcumbs"][] = array('name' => 'Dashboard', 'url'=> $this->route('index'), );

        return $this->view('dashboard');
    }
}
