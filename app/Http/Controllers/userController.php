<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isNull;

class userController extends Controller
{
    //

    public function login(Request $request)
    {
       $uData=  User::where('email',$request->email)->firstOrFail();

       if($uData)
       {
      //  return response()->json(['msg'=>'success'],'200');
        if(Hash::check($request->password,$uData->password))
        {
          //  return response()->json(['msg'=>'success'],'200');
         // return 'success';
         $request->session()->put('user',$uData);
         return redirect('/');

        }
        else
            {

            //return 'fail';
            return response()->json(['msg'=>'fail'],'200');
            }
        }


   //    return response()->json(['data'=> $uData],'200');

      // return $request->input();
    }

}
