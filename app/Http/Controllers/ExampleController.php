<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class ExampleController extends Controller
{
    public function index(): View {
        return view('index');

    }
    public function create(): View {
        return view('create');

    }
    public function store() {
        //dd($request->name, $request->content);
        $product = new Product();
        $product->name = $request->name;
        $product->content = $request->content;
        $product->save();
        return view('my_data');
    }
}
