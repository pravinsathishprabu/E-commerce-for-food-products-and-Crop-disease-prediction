<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class CustomerController extends Controller
{
    public function getitems(){
        $item = DB::table('items')->where('quantity','!=','0')->get();
        return view('Customer.home',compact('item'));  
    }
    public function view(Request $request){
        $p_id = $request->p_id;
        $item = DB::table('items')->where('id','=',$p_id)->get();
        return view('Customer.product',compact('item'));
    }
    public function cart(Request $request){
        $p_id = $request->p_id;
        $u_id = $request->u_id;

            $insert = [
                'p_id'=>$p_id,
                'u_id'=>$u_id
            ];
            if(DB::table('cart')->insert($insert)){
                echo "<script>window.alert('Cart added Successfully')</script>";
                $item = DB::table('items')->where('id','=',$p_id)->get();
                return view('Customer.product',compact('item'));
            }
    }
    public function mycart(){
            $item = DB::table('cart')
            ->where('cart.u_id','=',Auth()->guard('web')->user()->id)
            ->leftJoin('items', 'items.id', '=', 'cart.p_id')
            ->get();
            return view('Customer.cart',compact('item'));
        }
    public function remove(Request $req){
            $rid = $req->remove;
            $uid = Auth()->guard('web')->user()->id;

            if(DB::table('cart')->where([
                            ['p_id','=',$rid],
                            ['u_id','=',$uid]
                        ])->delete()){
                echo "cart is removed Successfully";
            }
            else{
                echo "cart is not removed";
            }
    }
    public function buy(Request $request){
        $uid = Auth()->guard('web')->user()->id;
        $pid = $request->pid;

        $item = DB::table('items')->where('id','=',$pid)->get();

        return view('Customer.buy',compact('item'));
    }
}
