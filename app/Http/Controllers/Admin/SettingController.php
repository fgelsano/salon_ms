<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting;
class SettingController extends Controller
{
    //
    public function index() {
        
        
        $settings = Setting::all();

        return view('admin.settings.index', compact('settings'));
    } 

    /**
     * Display existing record from database
     */
    public function edit(Request $request)
    {
        $settings = Setting::find($request->id);
        return view('admin.settings.edit', compact('setting'));
    }
}
