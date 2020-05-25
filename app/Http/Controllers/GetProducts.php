<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductBag;
use App\Models\ProductCarton;

class GetProducts extends Controller
{
    public function getAllProductCarton(){
        $ProductCartons=ProductCarton::all();
        return response()->json($ProductCartons);
    }
    public function getAllProductBag(){
        $ProductBag=ProductBag::all();
        return response()->json($ProductBag);
    }
}
