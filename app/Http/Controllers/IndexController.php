<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Shows the homepage
     *
     * @return void
     */
    public function index(){

        $user = Auth::user();

        if ($user == null){
            return redirect()->route('login');
        }

        return view('index');
    }
}