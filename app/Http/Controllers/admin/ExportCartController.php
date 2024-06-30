<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\chitiethoadons;
use App\Models\sanphams;
use Illuminate\Http\Request;
use App\Models\hoadons;
use App\Models\size;
class ExportCartController extends Controller
{
  
    public function index()
    {
        //
        $query = hoadons::orderBy('MaHoaDon','ASC')->paginate(5);
        // dd($query);
        return view("admin.exportCart.index",compact('query'));
    }

    
    public function create($id)
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

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit($id)
    {
        //
        $hoadon = hoadons::findOrFail($id);
        $cthoadon = chitiethoadons::where('MaHoaDon', $hoadon->MaHoaDon)->get()->first();
        $sanpham = sanphams::where('MaSanPham',$cthoadon->MaSanPham)->get()->first();

        $sizes = size::where('MaSize', $sanpham->MaSize)->get();
        $products = sanphams::orderBy('MaSanPham','ASC')->get();
        return view("admin.exportCart.edit",compact('hoadon','cthoadon','sanpham','sizes','products'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'TrangThai'=>'required|boolean',
            'NgayTao'=>'required|date',
            'TongGia'=>'required|numeric',
            'DiaChiGiaoHang'=>'required|string',
            
        ]);
        $dataHD = $request->only('TrangThai','NgayTao','TongGia','DiaChiGiaoHang');
        $dataHD['TrangThai'] = (int) $request->input('TrangThai'); // Ép kiểu thành int
        // dd($dataHD);
        
        $hoadon = hoadons::findOrFail($id);
        // dd($hoadon);
        $hoadon->update($dataHD);
        return redirect()->back()->with('success', 'Hóa đơn đã được cập nhật thành công.');
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
        $sp=hoadons::find($id);
        if ($sp->delete()) {
            return redirect()->route('exportcart.index')->with('ok', 'Xóa thành công');
        }
        return redirect()->back()->with('no', 'Không thành công');
    }
}
