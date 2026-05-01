<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\User;
use App\Models\Blog;

class PagesController extends Controller
{
    public function index() {

    // Only New Arrival products
    $products = Product::where('status', 1)
        ->where('is_new_arrival', 1)
        ->latest()
        ->limit(8)
        ->get();

    $categories = Category::all();
      return view('pages.index', compact('products', 'categories'));
    }

    public function about() {
        return view('pages.about-us');
    }

    public function blog(){
         $blogs = Blog::orderBy('id', 'DESC')->get();
        return view('pages.blog', compact('blogs'));
    }

       public function showblog($slug){
        $blogs = Blog::where('slug', $slug)->firstOrFail();
        return view('pages.details', compact('blogs'));
    }

    public function contact() {
        return view('pages.contact-us');
    }

     public function gallery() {
         $galleries = Gallery::latest()->get();
        return view('pages.gallery', compact('galleries'));
    }

      public function franchise() {
        return view('pages.franchise');
    }

    // product pages

    public function solarpanel() {
         // Get category
        $category = Category::where('name', 'Solar Panel')->firstOrFail();

        // Get products in ASC order
        $products = Product::where('status', 1)
            ->where('category_id', $category->id)
            ->orderByRaw("FIELD(id, 3,4,1,2)") // ASCENDING ORDER
            ->get();

        // All categories (for menu/sidebar)
        $categories = Category::all();

        return view('products.solar-panel', compact('products','categories','category'
        ));
    }

    public function hybrideight() {
         // Get category
        $category = Category::where('name', 'Hybrid 8g Inverter')->firstOrFail();

        // Get products in ASC order
        $products = Product::where('status', 1)
            ->where('category_id', $category->id)
            ->orderByRaw("FIELD(id, 3,4,1,2)") // ASCENDING ORDER
            ->get();

        // All categories (for menu/sidebar)
        $categories = Category::all();

        return view('products.hybrid-8g-inverter', compact('products','categories','category'
        ));
    }

    public function hybridnine() {
           // Get category
        $category = Category::where('name', 'Hybrid 9g Inverter')->firstOrFail();

        // Get products in ASC order
        $products = Product::where('status', 1)
            ->where('category_id', $category->id)
            ->orderByRaw("FIELD(id, 3,4,1,2)") // ASCENDING ORDER
            ->get();

        // All categories (for menu/sidebar)
        $categories = Category::all();

        return view('products.hybrid-9g-inverter', compact('products','categories','category'
        ));
    }

    public function lithiumbattery() {
          // Get category
        $category = Category::where('name', 'Lithium Po4 Battery')->firstOrFail();

        // Get products in ASC order
        $products = Product::where('status', 1)
            ->where('category_id', $category->id)
            ->orderByRaw("FIELD(id, 3,4,1,2)") // ASCENDING ORDER
            ->get();

        // All categories (for menu/sidebar)
        $categories = Category::all();

        return view('products.lithium-po4-battery', compact('products','categories','category'
        ));
    }

    public function solarbattery() {
           // Get category
        $category = Category::where('name', 'Solar c10 Battery')->firstOrFail();

        // Get products in ASC order
        $products = Product::where('status', 1)
            ->where('category_id', $category->id)
            ->orderByRaw("FIELD(id, 3,4,1,2)") // ASCENDING ORDER
            ->get();

        // All categories (for menu/sidebar)
        $categories = Category::all();

        return view('products.solar-c10-battery', compact('products','categories','category'
        ));
    }

    public function solarac() {
           // Get category
        $category = Category::where('name', 'Solar Hybrid Ac')->firstOrFail();

        // Get products in ASC order
        $products = Product::where('status', 1)
            ->where('category_id', $category->id)
            ->orderByRaw("FIELD(id, 3,4,1,2)") // ASCENDING ORDER
            ->get();

        // All categories (for menu/sidebar)
        $categories = Category::all();

        return view('products.solar-hybrid-ac', compact('products','categories','category'
        ));
    }

    public function allUsers()
    {
        $users = User::latest()->get();
        return view('admin.user.index', compact('users'));
    }

    public function show($slug)
    {
        $product = Product::with('addons')
                          ->where('slug', $slug)
                          ->where('status', 1)
                          ->firstOrFail();

        return view('products.show', compact('product'));
    }
}
