<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCarton;
use App\Models\ProductBag;
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
        $ProductCarton->pro_whole_sale_price_per_piece=$request->wholeSalePricePerPiece;
        $ProductCarton->pro_total_piece_in_carton=$request->cartonTotalPiece;
        $ProductCarton->pro_retail_price_carton=$request->salePricecarton;
        $ProductCarton->pro_retail_price_per_piece= $request->salePricePerPiece;
        $ProductCarton->pro_brand =$request->proBrandName;
       // $ProductCarton->add_or_changeBy= auth('api')->user()->id;
        $ProductCarton->save();
        return response()->json('ok');
    }
    public function addBagProduct(Request $request){
       
        $ProductCarton=new ProductBag();
        $ProductCarton->pro_name=$request->proName;
        $ProductCarton->pro_type=0;

        $ProductCarton->pro_purchase_price_per_kg=$request->buyPricePerKg;
        $ProductCarton->pro_purchase_price_bag=$request->buyPriceBag;

        $ProductCarton->pro_whole_sale_price_bag=$request->wholeSalePriceBag;
        $ProductCarton->pro_whole_sale_price_per_kg=$request->wholeSalePricePerKg;

        
        $ProductCarton->pro_total_weight_in_bag=$request->totalWeight;

        $ProductCarton->pro_retail_price_bag=$request->salePriceBag;
        $ProductCarton->pro_retail_price_per_kg= $request->salePricePerKg;

       

        
        $ProductCarton->pro_brand =$request->proBrandName;
       // $ProductCarton->add_or_changeBy= auth('api')->user()->id;
        $ProductCarton->save();
        return response()->json('ok');
    }
}
