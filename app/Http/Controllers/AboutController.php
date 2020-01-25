<?php
namespace App\Http\Controllers;


class AboutController extends Controller
{
    public function index()
    {
        return view('about')->with('title', 'About Yugen Farm');
    }
}
