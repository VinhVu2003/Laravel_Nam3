<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\chuyenmucs;
use App\Models\nhaphanphois;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\sanphams;
use App\Models\size;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $query = sanphams::orderBy('MaSanPham','ASC')->paginate(10);
        // print_r( $query);
        return view("admin.product.index",compact('query'));
    }

    public function getAllProduct()
    {
        $listProduct = DB::table("sanphams")->get();
        return [$listProduct];
    }
    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $categorys = chuyenmucs::orderBy('TenChuyenMuc','ASC')->get();
        $sizes = size::orderBy('TenSize','ASC')->get();
        $providers = nhaphanphois::orderBy('TenNhaPhanPhoi','ASC')->get();
        return view("admin.product.create",compact('categorys','sizes','providers'));
        //
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function store(Request $request)
    {
        //
        $request->validate([
            'MaChuyenMuc'=>'required',
            'TenSanPham'=>'required|min:0|max:150',
            'AnhDaiDien'=>'file|mimes:jpg,png,gif',
            'Gia'=>'required|numeric',
            'SoLuong'=>'required|numeric',
            'MaSize'=>'required',
            'MaNhaPhanPhoi'=>'required',
        ]);
        $data = $request->only('MaChuyenMuc','TenSanPham','Gia','SoLuong','MaSize','MaNhaPhanPhoi');
        $img = $request->AnhDaiDien->getClientOriginalName();
        // $img = $request->img->hashName();
        $request->AnhDaiDien->move(public_path('anh'),$img);
        $data['AnhDaiDien']= $img;
        // dd($data
        
        if(sanphams::create($data)){
            return redirect()->route('product.index')->with('ok','Thêm sản phẩm thành công');
        }
        else{
            redirect()->back()->with('no','Lỗi, vui lòng thử lại');
        }
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
        $categorys = chuyenmucs::orderBy('TenChuyenMuc','ASC')->select('MaChuyenMuc','TenChuyenMuc')->get();
        $sizes = size::orderBy('TenSize','ASC')->get();
        $providers = nhaphanphois::orderBy('TenNhaPhanPhoi','ASC')->get();
        $sanpham = sanphams::findOrFail($id);
        return view("admin.product.edit",compact('categorys','sizes','providers','sanpham'));

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
        $request->validate([
            'MaChuyenMuc'=>'required',
            'TenSanPham'=>'required|min:0|max:150',
            'AnhDaiDien'=>'file|mimes:jpg,png,gif',
            'Gia'=>'required|numeric',
            'SoLuong'=>'required|numeric',
            'MaSize'=>'required',
            'MaNhaPhanPhoi'=>'required',
        ]);
    
        $data = $request->only('MaChuyenMuc','TenSanPham','Gia','SoLuong','MaSize','MaNhaPhanPhoi');
        
        $sanpham = sanphams::findOrFail($id);
        if($request->hasFile('AnhDaiDien')){
            $img = $request->AnhDaiDien->getClientOriginalName();
            // $img = $request->img->hashName();
            $request->AnhDaiDien->move(public_path('anh'),$img);
            $data['AnhDaiDien']= $img;
        }
    
        if($sanpham->update($data)){
            return redirect()->route('product.index')->with('ok','Cập nhật thành công ');
        }
        return redirect()->back()->with('no','Thất bại');
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
        $sp=sanphams::find($id);
        if ($sp->delete()) {
            return redirect()->route('product.index')->with('ok', 'Xóa thành công');
        }
        return redirect()->back()->with('no', 'Không thành công');
    }
}
