<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (auth()->user()->role_id === 1) {
            $wishlists = Wishlist::with('products')->get();
        } else {
            $wishlists = Wishlist::where('user_id', auth()->user()->id)->get();
        }
        return view('wishlists.index', compact('wishlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productId = $request->id;

        Wishlist::create([
            'user_id' => auth()->user()->id,
            'product_id' => $productId,
        ]);

        session()->flash('flash.banner', 'Product has been added to wishlist !');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        return view('wishlists.detail', compact('wishlist'));
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
        Wishlist::find($id)->delete();

        session()->flash('flash.banner', 'Product has been remove from wishlist !');
        session()->flash('flash.bannerStyle', 'danger');
        return redirect()->to('wishlists.index');
    }

    public function removeAll(Request $request)
    {
        $tmpWishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        $tmpWishlist->each->delete();

        session()->flash('flash.banner', 'Product has been removed from wishlist !');
        session()->flash('flash.bannerStyle', 'danger');
        return redirect()->back();
    }
}
