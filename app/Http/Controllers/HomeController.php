<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UtbkScore;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $utbk_score = UtbkScore::findOrFail(Auth::user()->id);        
        return view('home', ['utbk_score' => $utbk_score]);
    }
}
