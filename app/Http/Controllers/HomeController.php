<?php

namespace App\Http\Controllers;
use App\Models\ProductBag;
use App\Models\ProductCarton;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }
    public function RandamData(){


      $ProductBag=ProductBag::orderBy(DB::raw('RAND()'))->take(5)->get()->toArray();
      $ProductCarton=ProductCarton::orderBy(DB::raw('RAND()'))->take(5)->get()->toArray();
      $mergedData = array_merge($ProductBag, $ProductCarton);
      shuffle($mergedData);
      return response()->json($mergedData);

    }
    public function SearchQuery(Request $request){

      $ProductBag=ProductBag::where('pro_name', 'LIKE', '%'.$request->searchQuery.'%')
      ->orWhere('pro_brand', 'LIKE', '%'.$request->searchQuery.'%')->get()->toArray();
      $ProductCarton=ProductCarton::where('pro_name', 'LIKE', '%'.$request->searchQuery.'%')
      ->orWhere('pro_brand', 'LIKE', '%'.$request->searchQuery.'%')->get()->toArray();
            
      $mergedDataProName = array_merge($ProductBag, $ProductCarton);
     
      shuffle($mergedDataProName);

      return response()->json($mergedDataProName);
    }
}
