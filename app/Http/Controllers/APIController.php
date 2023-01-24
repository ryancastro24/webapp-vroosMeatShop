<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{

   
    public $pro = '';


    public function __construct()
    {  
        
        $this->pro = new Product();        
    }
    public function getData(){
        $data = $this->pro->getdata();
        return view('dashboard',compact('data'));
    }

    public function sendData(Request $request){
      $data = [
       "user_id" => $request->user_id,
       "productName" => $request->productName,
        "productPrize" => $request->productPrize,
        "productDateExpected" => $request->productDateExpected
      ];

      $this->pro->saveData($data);

      return back();
      

    }


}
