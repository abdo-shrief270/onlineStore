<?php

namespace App\Http\Controllers;

use App\Http\Traits\WishListsTrait;
use App\Models\WishList;

class WishListsController extends Controller
{
    private $wishListModel;
    use WishListsTrait;

    public function __construct(WishList $wishList)
    {
        $this->wishListModel = $wishList;
       
    }
    //////////////////////////
    public function index()
    {
        $wishLists = $this->getAllWishLists();
        return view('admin.wishLists', compact([ 'wishLists']));
    }
        
}
