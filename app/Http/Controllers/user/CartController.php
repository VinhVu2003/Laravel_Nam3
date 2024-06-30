<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\chitiethoadons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\giohang;
use App\Models\hoadons;
use App\Models\sanphams;
use Carbon\Carbon;

class CartController extends Controller
{

    public function index()
    {
        //
        $maTaiKhoan = session('maTaiKhoan');

        $maKH = session('maKH');
        $cus = DB::table("khachhang")
            ->where('MaKH', $maKH)
            ->first();
        
        $carts = DB::table("giohang")
            ->where('MaTaiKhoan', $maTaiKhoan)
            ->get();
        $totalAmount = $carts->sum('TongTien');
        [$category, $categoryAo] = $this->getAllCategory();

        return view('user.cart', compact('category', 'categoryAo', 'carts', 'totalAmount','cus'));
    }

    public function getAllCategory()
    {
        $category = DB::table("chuyenmucs")->get();
        $categoryAo = DB::table("chuyenmucs")
            ->where("TenChuyenMuc", "like", "Áo%")
            ->get();
        return [$category, $categoryAo];
    }
    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create(Request $request)
    {
        //
        $ngayHienTai = Carbon::now();
        $maKH = session('maKH');
        $carts = json_decode($request->input('carts'));
        $diachigiaohang = $request->input('DiaChiGiaoHang');
        foreach ($carts as $cart) {
            // Tạo một hóa đơn mới
            $hoadon = hoadons::create([
                'TrangThai' => false,
                'NgayTao' => $ngayHienTai,
                'TongGia' => $cart->TongTien,
                'DiaChiGiaoHang' => $diachigiaohang,
                'MaKH' => $maKH
            ]);
    
            // Tạo một chi tiết hóa đơn cho sản phẩm hiện tại
            chitiethoadons::create([
                'MaHoaDon' => $hoadon->MaHoaDon,
                'MaSanPham' => $cart->MaSanPham,
                'SoLuong' => $cart->SoLuong,
                'TongGia' => $cart->TongTien,
            ]);
            $product = sanphams::find($cart->MaSanPham);
            $product->SoLuong-= $cart->SoLuong;
            $product->save();

        }
        $maTaiKhoan = session('maTaiKhoan');
        $gioHang = giohang::where('MaTaiKhoan', $maTaiKhoan)->get();
        // dd($gioHang);
        foreach ($gioHang as $item) {
            $item->delete();
        }
        return redirect()->route('history.index')->with('success', 'Đặt hàng thành công!');
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

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($MaGH)
    {
        // Find the cart item by id
        $deleted = giohang::destroy($MaGH);
        // If the cart item exists, delete it

        if ($deleted) {
            // $gh->delete();
            return redirect()->route('cart.index')->with('ok', 'Xóa thành công');
        }

        return redirect()->back()->with('no', 'Không tìm thấy giỏ hàng');
    }
}
