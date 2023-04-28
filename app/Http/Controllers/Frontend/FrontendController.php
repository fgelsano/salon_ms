<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home() {
        return view ('frontend.home');
    }
    public function about() {
        return view ('frontend.about');
    }
    
    public function services() { 
    
        return view('frontend.services');
    }
    public function contact() { 
   
        return view('frontend.contact');
    }
   public function queuestatus() {
   
        return view('frontend.queuestatus');
   }
   
} 
