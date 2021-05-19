<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    //
    public function index()
    {
        $products=DB::table('products')->get();
        return view('products',['products'=>$products]);

    }
    public function destroy($id){
        $product=DB::table('products')->where('id',$id);
        $product->delete();
        return response()->json(['success'=>"Product Deleted successfully.", 'tr'=>'tr_'.$id]);

    }
    public function deleteAll(Request $request)
    {
        $ids=$request->ids;
        DB::table("products")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Products Deleted successfully."]);



    }
}
