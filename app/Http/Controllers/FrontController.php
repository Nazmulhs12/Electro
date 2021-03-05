<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;

class FrontController extends controller
{
    public function index () {
        return view('front-end.home.home');
    }
    public function category() {
        return view('front-end.category.category');
    }
    public function about() {
        return view('front-end.about.about');
    }
    public function contact() {
        return view('front-end.contact.contact');
    }
}
