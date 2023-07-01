<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __invoke()
    {
        $categories = Category::query()->count();
        $products = Product::query()->count();
        $users = User::query()->where('role', 0)->count();

        return view('admin.index', compact('categories', 'products', 'users'));
    }
}
