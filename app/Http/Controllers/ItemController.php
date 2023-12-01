<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use PhpOption\None;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::get();
        $data["items"]=$items;
        
        return view('item.index',$items);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request ->all();
        // dd($request);
        Item::create($data);
        return redirect(route("item.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = "None";
        $items = [
            1 => "コーヒー",
            2 => "紅茶",
            3 => "ほうじ茶"
        ];
        
        if ( $id >0 &&in_array($id,array_keys($items))) $item = $items[$id];
        $data = ["item" => $item];
        return view("item.show",$data);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        
        //商品IDから商品データを取得
        // SELECT * FROM items WHERE id = xx;
        $item = Item::find($id);
        $data['item'] = $item;
        //編集画面を表示
        return view('item.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Item::find($id)->fill("data")->save();
        return redirect(route("item.edit",$id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Item::destroy($id);
        return redirect(route("item.index"));
    }
}
