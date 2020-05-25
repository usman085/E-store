<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductBag;
use App\Models\ProductCarton;
class DelProduct extends Controller
{
    public function delBagProduct($id){
        $res=ProductBag::find($id)->delete();
                    if ($res){
                        $data=[
                        'status'=>'1',
                        'msg'=>'success'
                    ];
                    }else{
                        $data=[
                        'status'=>'0',
                        'msg'=>'fail'
                    ];
                    
                    return response()->json($data);
                }
  }
   public function delCartonProduct($id){
    $res=ProductCarton::find($id)->delete();
                    if ($res){
                        $data=[
                        'status'=>'1',
                        'msg'=>'success'
                    ];
                    }else{
                        $data=[
                        'status'=>'0',
                        'msg'=>'fail'
                    ];
                       return response()->json($data);
                }
    }

}