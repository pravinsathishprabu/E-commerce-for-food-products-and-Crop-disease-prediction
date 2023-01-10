<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class FarmerController extends Controller
{
    public function item(){
        return view('Farmer.item');
    }
    public function add(Request $request){
        $rules = [
            'product_name' => ['required','string'],
            'category' => ['required'],
            'cover_image'=>['required'],
            'additional_image'=>['required']
        ];
         $customMessages = [
            'required'=>'The :attribute field is required.'
        ]; 
         $validate =  Validator::make($request->all(),$rules,$customMessages);
        if($validate->fails()){
            return redirect('/error')->withInput()->withErrors($validate->messages());
        }
         else{

            $c_image = $request->cover_image;

            $cover = time().'.'.$c_image->getClientOriginalExtension();
            //$request->book_image -> move('asset',$imageName);
            $request->cover_image->move(public_path('cover'),$cover);  

            $a_image = $request->additional_image;

            $additional = time().'.'.$a_image->getClientOriginalExtension();
            //$request->book_image -> move('asset',$imageName);
            $request->additional_image->move(public_path('additional'),$additional);       

            $insert = [
                'farmer_id'=>Auth::guard('farmer')->user()->id,
                'product_name'=>$request->product_name,
                'cover_image'=>$cover,
                'additional_image'=>$additional,
                'category'=>$request->category,
                'quantity'=>'0',
                'stock'=>'None',
                'rate'=>'',
                'desc'=>$request->desc
            ];
            if(DB::table('items')->insert($insert)){
                return back();
            }
        }
    }
    public function product()
    {
        $item = DB::table('items')->where('farmer_id',Auth::guard('farmer')->user()->id)->get();
        return view('farmer/product',compact('item'));
    }
    public function stock(Request $request){

        $quantity = $request->quantity;
        $stock = $request->stock;
        $p_id = $request->p_id;

        if(DB::table('items')
            ->where('id','=',$p_id)
            ->update([
                'quantity'=>$request->quantity,
                'stock'=>$request->stock,
                'rate'=>$request->rate
            ])){
            return redirect()->back();
        }

    }
}