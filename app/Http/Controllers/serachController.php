<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class serachController extends Controller
{
    public function search(Request $request){
        if(isset($_GET['query']) && strlen($_GET['query']) > 1){
            $search_text=$_GET['query'];
            $countries=DB::table('country')->where('Name','Like','%'.$search_text.'%')->paginate(2);
            $countries->appends($request->all());
            return view('search',['countries'=>$countries]);

        }else{
            return view('search');

        }
    }
}
