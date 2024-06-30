<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\hoadons;

class HistoryController extends Controller
{

    public function index()
    {
        //
        $maKH = session('maKH');
        $cus = DB::table("khachhang")
            ->where('MaKH', $maKH)
            ->first();

        $cart = Hoadons::select(
            'hoadons.MaHoaDon',
            'hoadons.TrangThai',
            'hoadons.NgayTao',
            'hoadons.TongGia',
            'hoadons.DiaChiGiaoHang',
            'chitiethoadons.SoLuong',
            'sanphams.MaSize',
            'sanphams.TenSanPham',
            'sanphams.AnhDaiDien',
            'sanphams.Gia'
        )
            ->join('chitiethoadons', 'hoadons.MaHoaDon', '=', 'chitiethoadons.MaHoaDon')
            ->join('sanphams', 'chitiethoadons.MaSanPham', '=', 'sanphams.MaSanPham')
            ->where('hoadons.MaKH', $maKH)
            ->orderBy('hoadons.TrangThai', 'ASC')
            ->get();
        // dd($hoadons);
        [$category, $categoryAo] = $this->getAllCategory();
        return view('user.historyCart', compact('category', 'categoryAo','cus','cart'));
    }


    public function getAllCategory()
    {
        $category = DB::table("chuyenmucs")->get();
        $categoryAo = DB::table("chuyenmucs")
            ->where("TenChuyenMuc", "like", "Áo%")
            ->get();
        return [$category, $categoryAo];
    }
    
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
