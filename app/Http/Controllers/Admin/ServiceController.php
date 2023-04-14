<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\service;
class ServiceController extends Controller
{
    //
    public function index() {
        
        
        $services = Service::all();

        return view('admin.services.index', compact('services'));
    } 
}
