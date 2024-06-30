<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator; 
use App\Models\khachhang;
use App\Models\taikhoan;
class RegistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listTaiKhoan = DB::table("taikhoan")->get();
        // print_r(($listTaiKhoan));
        return view('user.registry', compact('listTaiKhoan'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create(Request $request)
{
    // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'TenTaiKhoan' => [
                'required',
                Rule::unique('taikhoan', 'TenTaiKhoan')
            ],
            'MatKhau' => 'required|min:0|max:150',
            'Email' => 'required',
            'TenKH' => 'required',
            'DiaChi' => 'required',
            'SDT' => 'required'
        ], [
            'TenTaiKhoan.unique' => 'Tên tài khoản này đã tồn tại, vui lòng chọn tên tài khoản khác.',
            'TenTaiKhoan.required' => 'Tên tài khoản là bắt buộc.',
            'MatKhau.required' => 'Mật khẩu là bắt buộc.',
            'MatKhau.min' => 'Mật khẩu phải có ít nhất :min ký tự.',
            'MatKhau.max' => 'Mật khẩu không được vượt quá :max ký tự.',
            'Email.required' => 'Email là bắt buộc.',
            'Email.email' => 'Email không hợp lệ.',
            'TenKH.required' => 'Tên khách hàng là bắt buộc.',
            'DiaChi.required' => 'Địa chỉ là bắt buộc.',
            'SDT.required' => 'Số điện thoại là bắt buộc.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $khachHang = KhachHang::create([
            'TenKH' => $request->TenKH,
            'DiaChi' => $request->DiaChi,
            'SDT' => $request->SDT,
        ]);

        TaiKhoan::create([
            'MaKH' => $khachHang->MaKH,
            'TenTaiKhoan' => $request->TenTaiKhoan,
            'MatKhau' => $request->MatKhau, // Encrypt the password
            'Email' => $request->Email,
            'LoaiTaiKhoan' => 2,
        ]);

        // Redirect to login page on successful registration
        return redirect()->route('user.login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
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
