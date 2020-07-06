<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Item;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check_user_role:' .\App\UserRole::ROLE_ADMIN );
    }

    public function index()
    {
        $paginator = Item::paginate(5);
        return view('admin.index',compact('paginator'));
    }

    public function editItem($id)
    {
        $columns = implode(', ',[
            'id',
            'CONCAT (id,". ", title) AS id_title',
        ]);
        $categoryList= Category::selectRaw($columns)->toBase()->get();
        $brandList = Brand::selectRaw($columns)->toBase()->get();
        $item = Item::find($id);

        return view('admin.item_edit',compact('item','categoryList','brandList'));
    }

    public function updateItem(Request $request,$id)
    {
        $item = Item::find($id);
        $data = $request->all();

        $result = $item->update($data);

        if($result)
            return redirect()->route('admin.item.edit',$item->id)->with(['success'=>'Successfully saved']);
        else
            return back()->withErrors(['msg'=>'Error while saving, try again'])->withInput();
    }

    public function createItem()
    {
        $columns = implode(', ',[
            'id',
            'CONCAT (id,". ", title) AS id_title',
        ]);

        $item = new Item();
        $categoryList= Category::selectRaw($columns)->toBase()->get();
        $brandList = Brand::selectRaw($columns)->toBase()->get();

        return view('admin.item_edit',compact('item','categoryList','brandList'));
    }

    public function storeItem(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required | min:5',
            'description' => 'required | min: 15 | max:255',
            'price' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'slug' => 'required',
            'image_url' => 'required',

        ]);

        $data = $request->input();
        $item = (new Item())->create($data);

        if($item)
            return redirect()->route('admin.item.edit',$item->id)->with(['success'=>'Successfully created']);
        else
            return back()->withErrors(['msg'=>'Save error'])->withInput();
    }
}
