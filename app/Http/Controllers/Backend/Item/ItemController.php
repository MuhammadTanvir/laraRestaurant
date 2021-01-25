<?php

namespace App\Http\Controllers\Backend\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ItemController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Item::all();
        return view('backend.pages.item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        return view('backend.pages.item.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
            'description' => 'required',
           
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/item'))
            {
                mkdir('uploads/item', 0777 , true);
            }
            $image->move('uploads/item',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $item = new Item();
        $item->name = $request->name;
        $item->category_id = $request->category_id;
        $item->price = $request->price;
        $item->image = $imagename;
        $item->description = $request->description;
        $item->save();

        session()->flash('success','Data Stored Successfully!!!');
        return redirect()->route('admin.item.index');
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
        $item=Item::find($id);
        $categories= Category::all();
        return view('backend.pages.item.edit',compact('item','categories'));
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
        $this->validate($request,[
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'image' => 'mimes:jpeg,jpg,bmp,png',
            'description' => 'required',
           
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->name);
        $item = Item::find($id);
         if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/item'))
            {
                mkdir('uploads/item',0777,true);
            }
            unlink('uploads/item/'.$item->image);
            $image->move('uploads/item',$imagename);
        }else{
            $imagename = $item->image;
        }

        $item->name = $request->name;
        $item->category_id = $request->category_id;
        $item->price = $request->price;
        $item->image = $imagename;
        $item->description = $request->description;
        $item->save();

        session()->flash('success','Data Updated Successfully!!!');
        return redirect()->route('admin.item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Item::find($id);
        $item->delete();

        session()->flash('success','Data Deleted Successfully!!!');
        return redirect()->route('admin.item.index');

    }
}
