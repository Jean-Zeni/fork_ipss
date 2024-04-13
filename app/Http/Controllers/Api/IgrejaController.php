<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Igreja;
use Illuminate\Http\Request;

class IgrejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Igreja::query()->select(['id', 'nome', 'endereco', 'link_site', 'latitude', 'longitude', 'congregacao'])->where('ativo', 1)->with('arquivo:id,arquivo as nome,igreja_id')->get();

        return response()->json($query, 200);
    }
}