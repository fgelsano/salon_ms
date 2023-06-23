<?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\Setting;
// class SettingController extends Controller
// {
//     //
//     public function index() {


//         $settings = Setting::all();

//         // return view('admin.settings.index', compact('settings'));
//         return view('admin.sms-settings.index', compact('settings'));

//     }

//     /**
//      * Display existing record from database
//      */
//     public function edit(Request $request)
//     {
//         $settings = Setting::find($request->id);
//         // return view('admin.settings.edit', compact('setting'));
//         return view('admin.sms-settings.edit', compact('settings'));


//     }
// }

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('admin.sms-settings.index', compact('settings'));
    }

    public function edit(Request $request)
    {
        $setting = Setting::find($request->id);
        return view('admin.sms-settings.edit', compact('setting'));
    }

}

