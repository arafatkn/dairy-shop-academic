<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminPanelController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $data = array(), $breadcrumbs = array(), $default, $setting;
    protected $view = "admin.", $route = "admin.";
    protected $user, $admin;

    function __construct()
    {
        $this->middleware(['admin']);
        $this->data["breadcrumbs"][] = array('name' => 'Admin', 'url'=> route('admin.index'), );
    }

    public function setView($v)
    {
    	$this->view .= $v.'.';
    }
    public function setRoute($r)
    {
    	$this->route .= $r.'.';
    }

    protected function loadSettings()
    {
        $settings = \App\Setting::all();

        $this->setting =  app('StdClass');

        foreach($settings as $set)
            $this->sitesetting->{$set->key} = $set->value;

        $this->data["setting"] = $this->setting;
    }

    public function header()
    {
        $this->user = auth()->user();
        $this->data["user"] = $this->user;
        $this->loadSettings();
    }

    public function notfound($file='')
    {
    	$this->data["breadcrumbs"][] = array('name' => 'Not Found', 'url'=> '#', );
    	if(empty($file))
    		return $this->view('404');
    	else
    		return $this->view($file);
    }
    public function view($file="index")
    {
        $this->data["route"] = route($this->route.'index');
        return view($this->view.$file, $this->data);
    }
    public function route($file,$id='')
    {
        if(empty($id))
            return route($this->route.$file);
        else
            return route($this->route.$file, $id);
    }

}

