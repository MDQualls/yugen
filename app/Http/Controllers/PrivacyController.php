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
            ->with('title', 'Our Privacy Policy')
            ->with('agent', $this->agent);
    }

    public function cookies()
    {
        return view('cookies')
            ->with('title', 'Our Cookies Policy')
            ->with('agent', $this->agent);
    }

    public function disclaimer()
    {
        return view('disclaimer')
            ->with('title', 'Disclaimer Notice')
            ->with('agent', $this->agent);
    }
}
