<?php

namespace App\Http\Controllers;

use App\Models\items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allItems = items::sortable()->paginate(3);
        return view('items.items', compact('allItems'))->with('i', (request()->input('page', 1) - 1) * 3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'stock' => 'required',
            'unit_price' => 'required',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // $request->file->store('images', 'public');
        $img = $request->file('image_url');
        $new_img = rand() . '.' . $img->getClientOriginalExtension();

        $img->move(public_path('images'), $new_img);
        //save data
        $_item = new items([
            "item_name" => $request->get('item_name'),
            "stock" => $request->get('stock'),
            "unit_price" => $request->get('unit_price'),
            "description" => $request->get('description'),
            "discount" => $request->get('discount'),
            "image_url" => $new_img
        ]);
        $_item->save();

        // return dd($request);
        // items::create($request->all());

        // return redirect()->route('items.items')->with('success', 'Item added successfully');
        return Redirect::route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return dd($id);
    }

    public function filtering(Request $request)
    {
        $filter = $request->query('filter');

        if (!empty($filter)) {
            $items = items::sortable()
                ->where('item_name', 'like', '%' . $filter . '%')
                ->paginate(3);
        } else {
            $items = items::sortable()
                ->paginate(3);
        }

        return view('items.index')->with('items', $items)->with('filter', $filter);
    }
}
