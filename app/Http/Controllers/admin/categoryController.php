<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\chuyenmucs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $query = DB::table("chuyenmucs")->get();
        // print_r( $query);


        return view("admin.category.index", compact('query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.category.create");
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
        $validatedData = $request->validate([
            'TenChuyenMuc' => 'required|min:1|max:150|unique:chuyenmucs',
            'NoiDung' => 'required|min:1|max:150'
        ]);

        if (Chuyenmucs::create($validatedData)) {
            return redirect()->route('category.index')->with('ok', 'thêm thành công');
        }

        return redirect()->back()->with('no', 'không thành công');
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
        $chuyenmuc = chuyenmucs::findOrFail($id);
        return view("admin.category.edit")->with("chuyenmuc",$chuyenmuc);
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
        $validatedData = $request->validate([
            'TenChuyenMuc' => 'required|string',
            // 'dacbiet' => 'required|boolean',
            'NoiDung' => 'required|string',
        ]);

        $danhmuc = chuyenmucs::findOrFail($id);

        $danhmuc->update([
            'TenChuyenMuc' => $validatedData['TenChuyenMuc'],
            'NoiDung' => $validatedData['NoiDung'],
        ]);

        return redirect()->route('category.index')->with('success', 'Tin tức đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chuyenmuc=chuyenmucs::find($id);
        if ($chuyenmuc->delete()) {
            return redirect()->route('category.index')->with('ok', 'Xóa thành công');
        }
        return redirect()->back()->with('no', 'Không thành công');
    }
}
