<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
        ];
    }
}
