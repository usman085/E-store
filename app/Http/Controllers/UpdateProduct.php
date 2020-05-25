<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCarton;
use App\Models\ProductBag;


class UpdateProduct extends Controller
{
    public function updateCarton(Request $request){
        ProductCarton::where('id',$request->id)->update([
            'pro_name'=>$request->pro_name,
            'pro_brand'=>$request->pro_brand,

            'pro_purchase_price_per_piece'=>$request->pro_purchase_price_per_piece,
            'pro_purchase_price_carton'=>$request->pro_purchase_price_carton,

            'pro_whole_sale_price_per_piece'=>$request->pro_whole_sale_price_per_piece,
            'pro_whole_sale_price_carton'=>$request->pro_whole_sale_price_carton,

            'pro_retail_price_per_piece'=>$request->pro_retail_price_per_piece,
            'pro_retail_price_carton'=>$request->pro_retail_price_carton,

            'pro_total_piece_in_carton'=>$request->pro_total_piece_in_carton
            
            ]);
        return response()->json(200);
    }
    public function updateBag(Request $request){
        ProductBag::where('id',$request->id)->update([
            'pro_name'=>$request->pro_name,
            'pro_brand'=>$request->pro_brand,

            'pro_purchase_price_per_kg'=>$request->pro_purchase_price_per_kg,
            'pro_purchase_price_bag'=>$request->pro_purchase_price_bag,

            'pro_whole_sale_price_per_kg'=>$request->pro_whole_sale_price_per_kg,
            'pro_whole_sale_price_bag'=>$request->pro_whole_sale_price_bag,

            'pro_retail_price_per_kg'=>$request->pro_retail_price_per_kg,
            'pro_retail_price_bag'=>$request->pro_retail_price_bag,

            'pro_total_weight_in_bag'=>$request->pro_total_weight_in_bag
            
            ]);
        return response()->json(200);
    }
}
