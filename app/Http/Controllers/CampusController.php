<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campus;

class CampusController extends Controller
{
    public function index()
    {
        $campuses = Campus::all();
        return view('campus.index', ['campuses' => $campuses]);
    }
}
