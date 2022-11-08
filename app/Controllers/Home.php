<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['some'] = 'hahahaha';
        return view('code4_view',$data);
        //return view('welcome_message');
    }
    public function secondmethod()
    {
        return view('welcome_message');
    }
}
