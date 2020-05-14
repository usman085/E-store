<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCarton;
use Auth;
class AddProductController extends Controller
{
    public function addCartonProduct(Request $request){
        $ProductCarton=new ProductCarton();
        $ProductCarton->pro_name=$request->proName;
        $ProductCarton->pro_type=1;
        $ProductCarton->pro_purchase_price_per_piece=$request->buyPricePerPiece;
        $ProductCarton->pro_purchase_price_carton=$request->buyPricecarton;
        $ProductCarton->pro_whole_sale_price_carton=$request->wholeSalePricecarton;
        $ProductCarton->pro_whole_sale_price_per_piece=$request->wholeSalePricecarton;
        $ProductCarton->pro_total_piece_in_carton=$request->cartonTotalPiece;
        $ProductCarton->pro_retail_price_carton=$request->salePricecarton;
        $ProductCarton->pro_retail_price_per_price  = $request->salePricePerPiece;
        $ProductCarton->pro_brand =$request->proBrandName;
       // $ProductCarton->add_or_changeBy= auth('api')->user()->id;
        $ProductCarton->save();
        return response()->json('ok');
    }
}
