<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index()
    {
        return view('posts.index');
    }

    public function cards()
    {

        $companies = [
            ['name'=>"apple",'price'=>50],
            ['name'=>"samsung",'price'=>45],
            ['name'=>"sony",'price'=>40],
            ['name'=>"hauaui",'price'=>35],
        ];
        return view('cards.index',['b'=>$companies])->with('companies',$companies);
    }
}
