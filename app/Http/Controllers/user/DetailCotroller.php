<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\giohang;
use App\Models\sanphams;
use Illuminate\Http\Request;

class DetailCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("");
    }

    public function create(Request $request)
    {
        $maTaiKhoan = session('maTaiKhoan');
        //
        $request->validate([
            'MaSize'=>'required',
            'TenSanPham'=>'required',
            'MaSanPham'=>'required',
            'AnhDaiDien'=>'required',
            'Gia'=>'required',
            'SoLuong'=>'required',
        ]);
        // dd($request);
        //kiem tra tồn tại
        $product = sanphams::where('TenSanPham', $request->TenSanPham)
                            ->where('MaSize', $request->MaSize)
                            ->first();
        // dd($product);

        $productInCart = giohang::where('MaTaiKhoan',$maTaiKhoan)
                            ->where('MaSanPham', $product->MaSanPham)
                            ->first();
        // dd($productInCart);
        if ($productInCart) {
            return redirect()->back()->with('error', 'Sản phẩm đã tồn tại trong giỏ hàng!');
        }
        else{
            $tongTien = $product ->Gia * $request->SoLuong;
            // dd($maTaiKhoan);
            giohang::create([
                'MaTaiKhoan'=> $maTaiKhoan,
                'MaSanPham' => $product->MaSanPham,
                'AnhDaiDien' => $product->AnhDaiDien,
                'TenSanPham' => $product->TenSanPham,
                'SoLuong' => $request->SoLuong,
                'Gia' => $product->Gia,
                'Size' => $product->MaSize,
                'TongTien'=>$tongTien,
            ]);
            return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công!');
            // return redirect()->back()->with('error', 'ok!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
