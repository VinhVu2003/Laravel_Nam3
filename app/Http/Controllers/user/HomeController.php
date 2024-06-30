<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\chuyenmucs;
use App\Models\sanphams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller\admin\ProductController;
class HomeController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function index()
    {
        //
        $query = DB::table("sanphams")->take(8)->get();
        [$category, $categoryAo] = $this->getAllCategory();
        [$listProduct] = $this->getAllProduct();
        // $listProduct = app()->call('App\Http\Controllers\admin\ProductController@getAllProduct');
        return view("user.home", compact("query", "categoryAo","category","listProduct"));
    }


    public function getAllProduct()
    {
        $listProduct = DB::table("sanphams")->get();
        return [$listProduct];
    }
    
    public function getAllCategory()
    {
        $category = DB::table("chuyenmucs")->get();
        $categoryAo = DB::table("chuyenmucs")
            ->where("TenChuyenMuc", "like", "Áo%")
            ->get();
        return [$category, $categoryAo];
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
    public function getDetail(Request $request)
    {
        // Retrieve categories
        [$category, $categoryAo] = $this->getAllCategory();

        $id = ($request->get('id'));
        $product = sanphams::find($id);
        // Kiểm tra xem sản phẩm có tồn tại không
    
        $productName = $product->TenSanPham;
        $productsWithSameName = sanphams::where('TenSanPham', $productName)->get();
        $sizes = [];
        foreach ($productsWithSameName as $product) {
            if ($product->Size) {
                // Thêm size vào mảng sizes
                $sizes[] = $product->size;
            }
        }
        // Loại bỏ các size trùng lặp
        $sizes = array_unique($sizes);
        // Đây là mảng chứa danh sách size của các sản phẩm có cùng tên
        // dd($sizes);
        return view('user.detail',compact('category','categoryAo','sizes'))->with('product', $product);
    }
    
    public function getCategory(Request $request){
        [$category, $categoryAo] = $this->getAllCategory();

        $id = ($request->get('cate'));
        $products = sanphams::where('MaChuyenMuc', $id)->get();
        $nameCat = chuyenmucs::find($id);
        // print_r( $products);

        return view('user.category',compact('category','categoryAo','products','nameCat'));
    }
    public function getProductSearch(Request $request){
        [$category, $categoryAo] = $this->getAllCategory();
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
        ->paginate(3);
        $dataSearch = $request->input('dataSearch');
        $searchResults = sanphams::where('TenSanPham', 'like', '%' . $dataSearch . '%')->paginate(9);
        // dd($searchResults);
        return view('user.search',compact('category','categoryAo','searchResults','dataSearch','products'));
    }
    
    public function getAllTaiKhoan(){
        $listTaiKhoan = DB::table("taikhoan")->get();
        return [$listTaiKhoan];
    }
    public function getLogin(){
        [$listTaiKhoan]=$this->getAllTaiKhoan();
        // print_r($listTaiKhoan);
        return view('user.login',compact('listTaiKhoan'));
    }

    
}
