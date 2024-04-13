<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteMapaRsController extends Controller
{
    public function index(Request $request){

        return view('site.mapa-rs.index');
    }
}
