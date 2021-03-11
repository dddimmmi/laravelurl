<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\URLShort;

class UrlController extends Controller
{
    //
    public function short(Request $request){

    	//check url exists
         $url = URLShort::whereUrl($request->url)->first();

    	//if url exists then just the short url
          if($url == null){

          	$short = $this->generateShortURL();
          	URLShort::create([

                 'url' =>$request->url,
                 'short' =>$short,
          	]);
          	 $url = URLShort::whereUrl($request->url)->first();
          	 
          }

          	 return view('url.short_url', compact('url'));
         

    
    }

    public function shortLink($link){
        
         $url = URLShort::whereShort($link)->first();
         return redirect($url->url);
    }

    public function generateShortURL(){

    	$result = base_convert(rand(1000, 99999), 10, 36);
    	 $data = URLShort::whereUrl($result)->first();

    	 if($data !=null){

    	 	$this->generateShortURL();
    	 }
    	 return $result;
    }
}
