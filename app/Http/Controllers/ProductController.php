<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function index(Request $request) {

        if($request->data['sortIndex']) {

            $sortBy = $request->data['sortBy'];
            $brands = $request->data['sortingInput']['brands'];
            $categories = $request->data['sortingInput']['categories'];
            $prices = $request->data['sortingInput']['prices'];
            $discounts = $request->data['sortingInput']['discounts'];
            $rating = $request->data['sortingInput']['rating'];
            $date = $request->data['sortingInput']['date'];
            $searchInput = $request->data['searchInput'];
            $searchIndex = $request->data['searchIndex'];

            //fetch product by sorting inputs
            $products = Product::
            //search query
            when($searchIndex, function($query) use($searchInput){
                $searchInput = explode(' ', $searchInput);
                foreach($searchInput as $search) {
                    $query->where(function($query) use($search){
                        $query->where('brand', 'like', "%{$search}%")
                        ->orWhere('category', 'like', "%{$search}%")
                        ->orWhere('model', 'like', "%{$search}%");
                    });
                }
            })
            //brand query
            ->where(function($query) use($brands){
                foreach($brands as $brand) {
                    $query->orWhere('brand', $brand);
                }
            })
            //category query
            ->where(function($query) use($categories){
                foreach($categories as $category) {
                    $query->orWhere('category', $category);
                }
            })
            //price query
            ->where(function($query) use($prices){
                foreach($prices as $price) {
                    $price = explode('-', $price);
                    $query->orWhere(function($query) use($price){
                        $query->whereBetween('discount_price', [$price[0], $price[1]]);
                    });
                }
            })
            //discount query
            ->where(function($query) use($discounts){
                foreach($discounts as $discount) {
                    $discount = explode('-', $discount);
                    $query->orWhere(function($query) use($discount){
                        $query->whereBetween('discount', [$discount[0], $discount[1]]);
                    });
                }
            })
            //rating query
            ->when($rating, function($query) use($rating){
                $query->where('rating', '>=', $rating);
            })
            //New Arrival query
            ->when($date, function($query) use($date){                       
                if($date == 'old') {
                    $query->whereDate('created_at', '<', Carbon::now()->subDays(180)->toDateTimeString());
                }
                else {
                    $query->whereDate('created_at', '>=', Carbon::now()->subDays($date));
                }
            })
            //sort By query
            ->when($sortBy, function($query) use($sortBy){
                if($sortBy == 'price-decend') {
                    $query->orderBy('discount_price', 'desc');
                }
                elseif($sortBy == 'price-ascend') {
                    $query->orderBy('discount_price', 'asc');
                }
                elseif($sortBy == 'rating') {
                    $query->orderBy('rating', 'desc');
                }
                else {
                    $query->latest();
                }
            })
            ->paginate(9);

            return response()->Json($products);
        }

        else {
            $products = Product::latest()->paginate(9);
            return response()->Json($products);
        }
    }
}
