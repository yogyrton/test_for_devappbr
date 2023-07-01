<?php

namespace App\Http\Controllers;


use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Message;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $products = Product::query()
            ->when($request->query('search'), fn(Builder $query) => $query->where('title', 'LIKE', "%$request->search%"))
            ->when($request->query('category_id'), fn(Builder $query) => $query->where('category_id', $request->category_id))
            ->when($request->query('min_price'), fn(Builder $query) => $query->where('price', '>=', $request->min_price))
            ->when($request->query('max_price'), fn(Builder $query) => $query->where('price', '<=', $request->max_price))
            ->when($request->query('count'), fn(Builder $query) => $query->where('count', '>=', $request->count))
            ->paginate(20)
            ->withQueryString();

        return view('main', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        $messages = Message::query()->where('product_id', $product->id)->with('user')->get();

        return view('messages.show', compact('product', 'messages'));
    }
}
