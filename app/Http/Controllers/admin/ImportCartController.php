<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\chitiethoadonnhaps;
use Illuminate\Http\Request;
use App\Models\hoadonnhaps;
use App\Models\nhaphanphois;
use App\Models\sanphams;
use Carbon\Carbon;
class ImportCartController extends Controller
{
   
    public function index()
    {
        //
        $query = hoadonnhaps::orderBy('MaHoaDon','ASC')->paginate(5);
        // dd($query);
        return view("admin.importCart.index",compact('query'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $providers = nhaphanphois::orderBy('TenNhaPhanPhoi','ASC')->get();
        $products = sanphams::orderBy('TenSanPham','ASC')->get();
        return view("admin.ImportCart.create",compact('products','providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ngayHienTai = Carbon::now();
        //
        $request->validate([
            'GiaNhap'=>'required',
            'SoLuong'=>'required',
            'DonViTinh'=>'required',
            'KieuThanhToan'=>'required',
            'MaNhaPhanPhoi'=>'required',
            'MaSanPham'=>'required'
        ]);
        // Calculate the total price
        $TongTien = $request->SoLuong * $request->GiaNhap;
        $data = $request->only('MaNhaPhanPhoi','NgayTao','KieuThanhToan',);
        $data['TongTien'] = $TongTien;
        $data['NgayTao'] = $ngayHienTai ;
        // dd($data);
        $hoadon=hoadonnhaps::create($data);
        $datact = $request->only('MaSanPham','SoLuong','DonViTinh','GiaNhap');
        $datact['MaHoaDon']=$hoadon->MaHoaDon;
        $datact['TongTien']= $TongTien;
        chitiethoadonnhaps::create($datact);
//
        $product = sanphams::find($request->MaSanPham);
            $product->SoLuong += $request->MaSanPham;
            $product->save();
        return redirect()->route('importcart.index')->with('success', 'Thêm thành công!');
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
