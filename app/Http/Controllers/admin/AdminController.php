<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\chuyenmucs;
use App\Models\hoadons;
use App\Models\khachhang;
use App\Models\sanphams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    
    public function index()
    {
        //
        $products = sanphams::select(
            'sanphams.MaSanPham',
            'sanphams.MaSize',
            'sanphams.Gia',
            'sanphams.TenSanPham',
            'sanphams.AnhDaiDien',
            DB::raw('SUM(chitiethoadons.SoLuong) as TongSoLuong'),
            DB::raw('SUM(chitiethoadons.SoLuong * sanphams.Gia) as TongTien')
        )
        ->join('chitiethoadons', 'sanphams.MaSanPham', '=', 'chitiethoadons.MaSanPham')
        ->groupBy('sanphams.MaSanPham', 'sanphams.TenSanPham', 'sanphams.AnhDaiDien','sanphams.MaSize', 'sanphams.Gia')
        ->get();
            // dd($products);
        $soLuongHoaDon = hoadons::count();
        $soLuongKH = khachhang::count();
        $chuyenmucs = chuyenmucs::count();
        $doanhthu = hoadons::sum('TongGia');
        return view("admin.index",compact('soLuongHoaDon','soLuongKH','doanhthu','chuyenmucs','products'));
    }
    public function getInfor(){

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
        //
        $maKH = session('maKH');
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
