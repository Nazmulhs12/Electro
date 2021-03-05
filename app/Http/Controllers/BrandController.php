<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.brand',[
            'brands'=> $brands
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.addBrand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brandImage = $request->file('brand_image');
        $imageName = $brandImage->getClientOriginalName();
        $directory = 'admin/images/brand-images/';
        $imageUrl = $directory.$imageName;
        $brandImage ->move($directory, $imageName);

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_desc = $request->brand_desc;
        $brand->brand_image = $imageUrl;
        $brand->status = $request->status;
        $brand->save();

        return back()->with('message','Brand Saved Successfully');
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
        $brand = Brand::find($id);
        return view('admin.brand.editBrand', [
            'brand' => $brand
        ]);
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
        $brand = Brand::find($id);
        $brandImage = $request->file('brand_image');

        if ($brandImage) {
            unlink($brand->brand_image);

            $imageName = $brandImage->getClientOriginalName();
            $directory = 'admin/images/brand-images/';
            $imageUrl = $directory.$imageName;
            $brandImage ->move($directory, $imageName);

            $brand->brand_name = $request->brand_name;
            $brand->brand_desc = $request->brand_desc;
            $brand->brand_image = $imageUrl;
            $brand->status = $request->status;
            $brand->save();
        } else {
            $brand->brand_name = $request->brand_name;
            $brand->brand_desc = $request->brand_desc;
            $brand->status = $request->status;
            $brand->save();
        }

        return back()->with('message','Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);

        $brand->delete();
        //return $brand;
        return back();

    }
}
