<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $viewData = [];
        $viewData['title'] = "Trang chủ - Online Store";
        return view('home.index')->with('viewData', $viewData);
    }

    public function about()
    {
        $viewData = [];
        $viewData["title"] = "Gioi thieu - Online Store";
        $viewData["subtitle"] = "Gioi thieu";
        $viewData["description"] = "Day la trang gioi thieu!";
        $viewData["author"] = "Phat trien boi: OnlyU";
        return view('home.about')->with("viewData", $viewData);
    }
}
