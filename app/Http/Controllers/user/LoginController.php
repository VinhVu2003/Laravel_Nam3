<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\khachhang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

   
    public function create(Request $request)
    {
        $request->validate([
            'TenTaiKhoan' => 'required',
            'MatKhau' => 'required',
        ]);
        $account = DB::table('taikhoan')
                    ->where('TenTaiKhoan', $request->TenTaiKhoan)
                    ->where('MatKhau', $request->MatKhau)
                    ->first();
        // dd($account);
        if ($account) {
            // Lấy MaTaiKhoan và MaKH của bản ghi
            $maTaiKhoan = $account->MaTaiKhoan;
            $maKH = $account->MaKH;
            
            // Sử dụng MaKH để lấy tên của khách hàng
            $khachHang = khachhang::find($maKH);
            $tenKH = $khachHang->TenKH;
           

             // Lưu vào session
            Session::put('tenKH', $tenKH);
            Session::put('maTaiKhoan', $maTaiKhoan);
            Session::put('maKH', $maKH);
            
            if ($maTaiKhoan == 1) {
                return redirect()->route('admin.index')->with('success', 'Đăng nhập thành công');
            } else {
                return redirect()->route('user.home')->with('success', 'Đăng nhập thành công');
            }    
               
        }
        return redirect()->back()->with('error', 'Tên tài khoản hoặc mật khẩu không đúng');
    }


    public function checklogin(Request $request)
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
