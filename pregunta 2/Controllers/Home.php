<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function mat()
    {
        return view('mat');
    }
    public function fis()
    {
        return view('fis');
    }
    public function inf()
    {
        return view('inf');
    }
}
