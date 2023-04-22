<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conselho;

class SiteConselhoController extends Controller
{
    public function view($id){
        $conselho = Conselho::find($id);
        if($conselho){
            return view('site.conselho.view', ['conselho' => $conselho]);
        }else{
            abort(404, "Conselho não encontrado.");
        }
       
    }
}
