<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function about():View{
        return view("about");
    }
    function search(Request $request):View{
        $keyword = $request->q;
        // $message = "キーワードは{$keyword}です";
        $data = [
            "keyword" => $keyword
        ];
    return view("search",$data);
    }
}
