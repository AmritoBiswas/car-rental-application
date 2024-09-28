<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //Home Page
    public function homePage(){
        return view('pages.home');
    }

    //booked page
    // public function bookedPage(){
    //     return view('pages.booked');
    // }
}
