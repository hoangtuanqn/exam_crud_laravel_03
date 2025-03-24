<?php

namespace App\Http\Controllers;

use App\Models\PhoneBrand;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $listBrand = PhoneBrand::orderBy('pbid', 'DESC')->get();
        return view('home', compact('listBrand'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|max:50',
            'country'   => 'required|max:50',
            'logo'      => 'required'
        ]);
        $file = $request->file('logo');
        $randomFileName = $file->hashName();
        $file->move(public_path('uploads/brand'), $randomFileName);

        PhoneBrand::create([
            'name'      => $request->name,
            'country'   => $request->country,
            'logo'      => 'uploads/brand/' . $randomFileName
        ]);
        return redirect()->route('index')->with('success', 'Bạn đã thêm dữ liệu thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(request $request, int $id)
    {
        $request->session()->put('id', $id);
        $brand = PhoneBrand::find($id);
        if (empty($brand)) {
            return back()->with('error', 'Không tìm thấy dữ liệu');
        }
        return view('edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->session()->get('id');
        $request->validate([
            'name'      => 'required|max:50',
            'country'   => 'required|max:50',
            'logo'      => 'nullable|image'
        ]);

        $brand = PhoneBrand::find($id);
        if (empty($brand)) {
            return back()->with('error', 'Không tìm thấy dữ liệu');
        }

        $brand->name = $request->name;
        $brand->country = $request->country;

        if ($request->hasFile('logo')) {
            // Xóa ảnh hiển thị
            $filePath = public_path($brand->logo);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
            // Upload ảnh mới
            $file = $request->file('logo');
            $randomFileName = $file->hashName();
            $file->move(public_path('uploads/brand'), $randomFileName);
            
            $brand->logo = 'uploads/brand/' . $randomFileName;
        }

        $brand->save();

        return redirect()->route('index')->with('success', 'Bạn đã cập nhật dữ liệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $brand = PhoneBrand::find($id);
        if(!empty($brand)) {
            // Xóa ảnh hiển thị
            $filePath = public_path($brand->logo);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }

            $brand->delete();
            return back()->with('success', 'Đã xóa dữ liệu này thành công');
 
        } else {
            return back()->with('error', 'Không tìm thấy dữ liệu');
        }
    }

    public function search(Request $request) {
        $listBrand = PhoneBrand::where('name', 'LIKE', '%'.$request->keyword.'%')->get();
        return view('home', compact('listBrand'));
    }
}
