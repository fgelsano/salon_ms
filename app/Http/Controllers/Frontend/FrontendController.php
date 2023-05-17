<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Booking;
use App\Models\Service;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class FrontendController extends Controller
{
    public function home() {

        return view('frontend.welcome');

    }
    public function create() {

    }

    public function store() {


    }
    public function edit() {


    }
   public function update() {


   }
   public function destroy() {


   }

}
