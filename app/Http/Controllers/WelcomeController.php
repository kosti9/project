<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class WelcomeController extends Controller
{
    public function index(){
        $posts = Post::latest()->take(4)->get();
        return view('welcome', compact('posts'));
    }
    public function change_locale($locale)
    {
      // dd('dhfg');
   $url = str_replace( url('/'), '' , url()->previous());
   $url = str_replace('/ar' , '' , $url);
   $url = str_replace('/en' , '' , $url);
   //dd($url);
   return redirect()->to($locale.$url);

}

}
