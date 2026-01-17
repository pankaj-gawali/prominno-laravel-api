<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use PDF;

class ProductController extends Controller
{
    /**
     * Store Product with Brands (Seller Only)
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'brands'      => 'required|array',
            'brands.*.name'   => 'required|string',
            'brands.*.detail' => 'required|string',
            'brands.*.price'  => 'required|numeric',
            'brands.*.image'  => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $product = Product::create([
            'user_id'     => auth()->id(),
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        foreach ($request->brands as $brand) {
            // Store image in storage/app/public/brands
            $imagePath = $brand['image']->store('brands', 'public');

            Brand::create([
                'product_id' => $product->id,
                'name'       => $brand['name'],
                'detail'     => $brand['detail'],
                'price'      => $brand['price'],
                'image'      => $imagePath,
            ]);
        }

        return response()->json([
            'message' => 'Product added successfully'
        ], 201);
    }

    /**
     * Seller Product Listing with Brands (Pagination)
     */
    public function index()
    {
        return response()->json(
            Product::where('user_id', auth()->id())
                ->with('brands')
                ->paginate(10)
        );
    }

    /**
     * Delete Product (Only Owner)
     */
    public function destroy(Product $product)
    {
        if ($product->user_id !== auth()->id()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
        }

        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }

    /**
     * Generate Product PDF with Brand Images
     */
    public function pdf(Product $product)
    {
        if ($product->user_id !== auth()->id()) {
            abort(403);
        }

        $product->load('brands');
        $total = $product->brands->sum('price');

        $pdf = PDF::loadView('pdf.product', compact('product', 'total'));

        return $pdf->stream('product.pdf');
    }
}
