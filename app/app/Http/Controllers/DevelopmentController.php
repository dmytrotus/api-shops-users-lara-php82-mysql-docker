<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DevelopmentController extends Controller
{
    public function index()
    {
        $pdsCount = Product::count();

        return view('welcome')->with(compact('pdsCount'));
    }
    public function runMigrationsAndSeeder()
    {
        \Artisan::call('config:cache');
        \Artisan::call('migrate:fresh --seed');

        return redirect()->back();
    }
}
