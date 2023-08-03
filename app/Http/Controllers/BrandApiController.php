<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $brand = Brand::all();
        return response()->json($brand);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
    
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        //không có ảnh
        $brand  = Brand::create($request->all());
        //nếu có ảnh
        // $image = $request->file('image')->getClientOriginalName();
        // $request->file('image')->stogeAs('public/uploads',$image);
        // $data =[
        //     'brand_name' =>$request->input('brand_name'),
        //     'description' => $request->input('description'),
        //     'image' => $image,
        // ];
        // $brand = Brand::create($data);
        return response()->json($brand);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand){
        return response()->json($brand);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand){
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand){
        //không có ảnh
        $brand->update($request->all());
        // dd($request->all());
        //nếu có ảnh
        // $image = $request->file('image')->getClientOriginalName();
        // $request->file('image')->stogeAs('public/uploads',$image);
        // $data =[
        //     'brand_name' =>$request->input('brand_name'),
        //     'description' => $request->input('description'),
        //     'image' => $image,
        // ];
        // $brand = Brand::update($data);
        return response()->json($brand);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand){
        $brand->delete();
    return response()->json(['message','Xóa sản phẩm thành công']);
    }
}
