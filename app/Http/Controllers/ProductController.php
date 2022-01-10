<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:products|string|max:255',
            'price' => 'required',
            'category_id' => 'required',
            'description' => 'required|string',
            'image_url' => 'required|image|file|max:10240',
        ]);

        if ($request->file('image_url')) {
            $validateData['image_url'] = $request->file('image_url')->store('product-image');
        }

        Product::create($validateData);

        session()->flash('flash.banner', 'New product has been added !');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $validateData = $request->validate([
            'name' => 'required|string|max:255|unique:products' . ',id,' . $product->id,
            'price' => 'required',
            'description' => 'required|string',
            'image_url' => 'image|file|max:10240',
        ]);

        if ($request->file('image_url')) {
            $validateData['image_url'] = $request->file('image_url')->store('product-image');
        } else {
            $validateData['image_url'] = $product->image_url;
        }

        $product->update($validateData);

        session()->flash('flash.banner', 'New product has been updated !');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();


        session()->flash('flash.banner', 'Product has been removed !');
        session()->flash('flash.bannerStyle', 'danger');
        return redirect()->route('products.index');
    }

    public function pages($pages)
    {
        switch ($pages) {
            case ('man'):
                $products = Product::where('category_id', 1)->get();
                $top = Product::where('category_id', 1)->first();

                $title = 'Man daily.';
                break;
            case ('women'):
                $products = Product::where('category_id', 2)->get();
                $top = Product::where('category_id', 2)->first();

                $title = 'Women daily.';
                break;
            case ('pants'):
                $products = Product::where('category_id', 3)->get();
                $top = Product::where('category_id', 3)->first();

                $title = 'Special pants.';
                break;
            default:
                return redirect()->back();
        }

        return view('products.list-product', compact(['products', 'title', 'top']));
    }
}
