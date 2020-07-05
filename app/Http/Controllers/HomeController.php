<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Item;
use Illuminate\Http\Request;
use Session;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('shop.home');
    }

    public function getCategories()
    {
        $categories = Category::all();
        return response()->json(['categories'=>$categories],200);
    }

    public function  getBrands()
    {
        $brands = Brand::all();
        return response()->json(['brands' => $brands],200);
    }

    public function getBrandItems($category_id, $brand_id)
    {
        if($category_id==null){
            $brand = Brand::where('id',$brand_id)->first();
            $items = $brand->items;
            return response()->json(['items'=>$items],200);
        }
        $items = Item::where('category_id',$category_id)->where('brand_id',$brand_id)->get();
        return response()->json(['items'=>$items],200);


    }

    public function getItems()
    {
        $items = Item::all();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        if($oldCart==null){
            $totalQty = 0;
        }
        else {
            $totalQty = $oldCart->totalQty;
        }
        return response()->json(['items'=>$items,'totalQty' => $totalQty],200);
    }

    public function getCategoryItems($id)
    {
        $category = Category::where('id',$id)->first();
        $items = $category->items;

        return response()->json(['items'=>$items],200);
    }
}
