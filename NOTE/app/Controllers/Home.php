<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('login');
    }

    public function showDashboard(): string
    {
        return view('dashboard');
    }

    public function showForm(): string
    {
        return view('form');
    }

    public function showList(): string
    {
        return view('list');
    }
}
