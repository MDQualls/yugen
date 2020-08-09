<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('privacy')
            ->with('title', 'Our Privacy Policy');
    }

    public function cookies()
    {
        return view('cookies')
            ->with('title', 'Our Cookies Policy');
    }

    public function disclaimer()
    {
        return view('disclaimer')
            ->with('title', 'Disclaimer Notice');
    }
}
