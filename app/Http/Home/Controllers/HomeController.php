<?php

namespace LaravelDDD\Http\Home\Controllers;

use LaravelDDD\Application\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @Get("/")
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @Get("home", as="home")
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('home');
    }
}
