<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\cart;
use App\Models\Product;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class ProductController extends Controller
{
    //

    public function index()
    {

        $data=Product::all();



        return view('product',['products'=>$data]);

    }


    public function detail($id)
    {

       $detail=Product::findorFail($id);
       if($detail)
       {

        return view('detail',['details'=>$detail]);

     // return $detail;

       }
       else{

        return 'not found';
       // return $detail;
       }

    }

    public function search(Request $request)
    {
        $SearchData=Product::where('category','like' , '%'.$request->input('query').'%')->get();
        return   view('search',['searchData'=>$SearchData])  ;
        // $SearchData;
    }
 public function addToCart1(Request $req)
    {
  return  'hi1';
    }

    public function addToCart(Request $req)
    {

        if($req->session()->has('user'))
        {
  //return  'hi1';
      $validation=FacadesValidator::make($req->all(),

      ['product_id'=>'integer|required',],
      ['product_id.integer'=> 'Product ID must be an integer !!']
    );

      if(!$validation->fails())
      {
        $pID=$req->product_id;
        $uID= $req->session()->get('user')['id'];
  $cartData=[
  'user_id'=> $uID,
  'product_id'=>$pID,
  ];
        DB::beginTransaction();
        $data=null;
        try{
             $data =cart::create($cartData);
 DB::commit();
  return redirect('/');
//return  $pID . '--'.  $uID . 'product has been saved';
        }
        catch(\Exception $err)
        {
            DB::rollBack();
//return  'error.........';


        }

          //  return  $pID . '--'.  $uID;
              }
              else{

                return ' not integer';

              }
        }
        else{

            return redirect('/login');
            // return to login page : to do login again
        }

    }

public function GetCartProductdetail()
{
    $cartDetail=CartResource::collection(Cart::where('user_id','=',session()->get('user')['id'])->get());

    return view('cartList',['cartDetails'=>$cartDetail->toArray(request())]);
   // return $cartDetail;
}


    public static function cartItem()
    {

        $userd_id=session()->get('user')['id'];
        $items=cart::where('user_id','=',$userd_id)->get();
        return count($items);
        // return view('header',['counter'=>count($items)]);

    }

    public function removeFromCart($cid)
    {
             cart::destroy($cid);
            $cartDetail=CartResource::collection(Cart::where('user_id','=',session()->get('user')['id'])->get());

    return view('cartList',['cartDetails'=>$cartDetail->toArray(request())]);
    }

public function logout123()
{

  Session::forget('user');
  return redirect ('/');
 //return 'hi';
}

public function BuyLaterItem($cartid)  // just doing softdelete
{
       $p= cart::findorFail($cartid);
       if($p)
       {
        $p->delete();
       }
        $cartDetail=CartResource::collection(Cart::where('user_id','=',session()->get('user')['id'])->get());

    return view('cartList',['cartDetails'=>$cartDetail->toArray(request())]);
}

}
