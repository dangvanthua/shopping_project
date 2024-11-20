<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

session_start();

class HomeController extends Controller
{
    public function index()
    {
        $cate_product = DB::table('category')->where('category_status', '0')->orderby('id_category', 'desc')->get();


        $all_product = DB::table('product')
            ->join('category', 'category.id_category', '=', 'product.id_category')

            ->orderby('product.id_product', 'desc')->get();

        $all_product = DB::table('product')->where('product_status', '0')->orderby(DB::raw('RAND()'))->paginate(6);
        return view('Front-end-Shopping.shopping-index.shopping_index')->with('category', $cate_product)->with('all_product', $all_product);
    }

    public function filter(Request $request)
    {
        $categoryId = $request->input('id_category');

        if ($categoryId == 0) {
            $products = Product::paginate(8);
        } else {

            $products = Product::where('id_category', $categoryId)->paginate(8);
        }

        return response()->json($products);
    }

    public function filterSort(Request $request)
    {
        $sort = $request->input('sort');
        $page = $request->input('page', 1);

        $query = Product::query();
        if ($sort === 'asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'desc') {
            $query->orderBy('price', 'desc');
        }

        $products = $query->paginate(8, ['*'], 'page', $page);

        return response()->json([
            'products' => $products->items(),
            'total' => $products->total(),
        ]);
    }

    public function filterByPrice(Request $request)
    {
        $minPrice = $request->input('min_price', 0);
        $maxPrice = $request->input('max_price', 9999999999);

        if ($maxPrice == 9999999999) {
            $products = Product::where('price', '>=', $minPrice)
                ->paginate(8, ['*'], 'page', $request->input('page', 1));
        } else {
            $products = Product::whereBetween('price', [$minPrice, $maxPrice])
                ->paginate(8, ['*'], 'page', $request->input('page', 1));
        }
        $maxPrice = $request->input('max_price', INF);
        $page = $request->input('page', 1);

        $products = Product::whereBetween('price', [$minPrice, $maxPrice])
            ->paginate(8, ['*'], 'page', $page);

        return response()->json([
            'products' => $products->items(),
            'total' => $products->total(),
        ]);
    }

    public function searchProducts(Request $request)
    {
        $query = trim($request->input('query', ''));
        $page = $request->input('page', 1);
        $perPage = 8;

        if (empty($query)) {
            $products = Product::paginate($perPage, ['*'], 'page', $page);

            return response()->json([
                'products' => $products->items(),
                'total' => $products->total(),
            ]);
        }

        $products = Product::where('name', 'like', "%$query%")
            ->orWhere('describe', 'like', "%$query%")
            ->paginate($perPage, ['*'], 'page', $page);
        $query = $request->input('query');
        $page = $request->input('page', 1);

        $products = Product::where('name', 'LIKE', "%$query%")
            ->orWhere('describe', 'LIKE', "%$query%")
            ->paginate(8, ['*'], 'page', $page);

        return response()->json([
            'products' => $products->items(),
            'total' => $products->total(),
        ]);
    }

    public function loadMore(Request $request)
    {
        $categoryId = $request->input('category_id');
        $page = $request->input('page', 1);

        if ($categoryId == 0) {
            $products = Product::paginate(8, ['*'], 'page', $page);
        } else {
            $products = Product::where('id_category', $categoryId)->paginate(8, ['*'], 'page', $page);
        }

        return response()->json([
            'products' => $products->items(),
            'total' => $products->total(),
        ]);
    }
}
