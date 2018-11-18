<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use Auth;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function account() {
        return view("admin_account");
    }

    public function user_products() {
        $post = Products::all()->where("vendor", Auth::user()->company);
        return view("admin_products")->with('products', $post);
    }

    public function upload(Request $request) {
        $title = $request->title;
        $originalprice = $request->originalprice;
        $discountedprice = $request->discountedprice;
        $description = $request->description;
        $category = $request->category;
        $bean = $request->bean;
        $vendor = Auth::user()->company;

        $destinationPath = "images/";
        $file = $request->file;
        $file->move($destinationPath , $file->getClientOriginalName());

        $prod = new Products;
        $prod->name = Auth::user()->name;
        $prod->title = $title;
        $prod->vendor = $vendor;
        $prod->originalprice = $originalprice;
        $prod->bean = $bean;
        $prod->discountedprice = $discountedprice;
        $prod->category = $category;
        $prod->description = $description;
        $prod->url = url(str_slug($vendor) . '/' . str_slug($title));
        $prod->imageurl = url('/images/' . $file->getClientOriginalName());
        $prod->save();

        // dd($files = $request->file('file'));
        return redirect()->route("home");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_add_product');
    }
}
