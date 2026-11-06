<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::paginate(5);
        return view("management.menu", ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("management.createMenu", ['categories' => $categories]);
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
            'name' => 'required|max:255|unique:menus',
            'price' => 'required|max:255|numeric',
            'image' => 'nullable|file|image|mimes:jpeg,png,jpg|max:5000',
            'description' => 'required',
            'category_id' => 'required|numeric',
        ]);
        //  If a user does not upload a image use no image.
        $imageName = "noimage.png";
        //  if a user upload a image
        $imageName = date('mdYHis') . uniqid() . '.' . $request->image->extension();
        $request->image->move(public_path('assets/menu_images'), $imageName);
        // For saving data to menu table
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->description = $request->description;
        $menu->image = $imageName;
        $menu->category_id = $request->category_id;
        $menu->save();
        session()->flash('status', $request->name . "Menu has been saved successfully");
        return redirect("/management/menu");
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
        $menu = Menu::find($id);
        $categories = Category::all();
        return view("management.editMenu", ['menu' => $menu, 'categories' => $categories]);
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
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|max:255|numeric',
            'description' => 'required',
            'category_id' => 'required|numeric',
        ]);
        $menu = Menu::find($id);
        if ($request->image) {
            $request->validate([
                'image' => 'nullable|file|image|mimes:jpeg,png,jpg|max:5000'
            ]);
            if ($menu->image != "noimage.png") {
                $imageName = $menu->image;
                unlink(public_path('assets/menu_images') . "/" . $imageName);
            }
            $imageName = date('mdYHis') . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/menu_images'), $imageName);
        } else {
            $imageName = $menu->image;
        }
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->image = $imageName;
        $menu->description = $request->description;
        $menu->category_id = $request->category_id;
        $menu->save();
        session()->flash('status', $request->name  . ' Menu Has been Updated Successfully');
        return redirect('/management/menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::destroy($id);
        session()->flash('status', 'menu has been deleted successfully');
        return redirect('/management/menu');
    }
}
