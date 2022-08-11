<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Multipic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Image;

class BrandController extends Controller
{
    public function All()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function StoreBrand(Request $request)
    {
        $validatedData = $request->validate(
            [
                'brand_name' => 'required|unique:brands|max:255',
                'brand_image' => 'required|mimes:jpg,jpeg,png'
            ],
            [
                'brand_name.required' => 'Please input brand name.',
                'brand_name.max' => 'Category should less than 255 characters.'
            ]
        );

        $brand_image = $request->file('brand_image');

        // $name_gen = hexdec(uniqid());
        // $img_ext = strtolower($brand_image->getClientOriginalExtension());
        // $img_name = $name_gen . '.' . $img_ext;
        // $location = 'image/brands/';
        // $last_img = $location . $img_name;
        // $brand_image->move($location, $img_name);

        $name_gen = hexdec(uniqid()) . '.' . $brand_image->getClientOriginalExtension();
        Image::make($brand_image)->save('image/brands/' . $name_gen);

        $last_img = 'image/brands/' . $name_gen;

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Brand successfully inserted!',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

    public function Edit($id)
    {
        $brands = Brand::find($id);
        return view('admin.brand.edit', compact('brands'));
    }

    public function Update(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'brand_name' => 'required'
            ],
            [
                'brand_name.required' => 'Please input brand name.'
            ]
        );

        $old_image = $request->old_image;

        $brand_image = $request->file('brand_image');

        if ($brand_image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $location = 'image/brands/';
            $last_img = $location . $img_name;
            $brand_image->move($location, $img_name);

            unlink($old_image);

            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now()
            ]);

            return redirect()->route('all.brand')->with('success', 'Data berhasil diubah!');
        } else {
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()
            ]);

            return redirect()->route('all.brand')->with('success', 'Data berhasil diubah!');
        }
    }

    public function Delete($id)
    {
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);
        Brand::find($id)->delete();

        $notification = array(
            'message' => 'Data berhasil dihapus!',
            'alert-type' => 'warning'
        );

        return redirect()->route('all.brand')->with($notification);
    }

    public function MultiImage()
    {
        $images = Multipic::all();
        return view('admin.multi.index', compact('images'));
    }

    public function StoreImage(Request $request)
    {
        $image = $request->file('image');

        foreach ($image as $multi_image) {

            $name_gen = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();
            Image::make($multi_image)->save('image/multi/' . $name_gen);

            $last_img = 'image/multi/' . $name_gen;

            Multipic::insert([
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
        }

        return Redirect()->back()->with('success', 'Brand successfully inserted!');
    }

    public function Logout()
    {
        Auth::logout();
        return Redirect()->route('login')->with('success', 'User Logout');
    }
}
