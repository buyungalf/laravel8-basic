<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use App\Models\HomeServices;
use App\Models\Multipic;
use App\Models\Slider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin_master');
    }

    //Slider
    public function HomeSlider()
    {
        $sliders = Slider::latest()->get();
        return view('admin.home.slider.index', compact('sliders'));
    }

    public function AddSlider()
    {
        return view('admin.home.slider.add');
    }

    public function EditSlider($id)
    {
        $sliders = Slider::find($id);
        return view('admin.home.slider.edit', compact('sliders'));
    }

    public function UpdateSlider(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|max:255',
                'description' => 'required',
            ],
            [
                'title.required' => 'Please input brand name.',
                'title.max' => 'Category should less than 255 characters.',
                'description.required' => 'Please input the description'
            ]
        );

        $old_image = $request->old_image;

        $image = $request->file('image');

        if ($image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $location = 'image/sliders/';
            $last_img = $location . $img_name;
            $image->move($location, $img_name);

            unlink($old_image);

            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);

            return redirect()->route('home.slider')->with('success', 'Data berhasil diubah!');
        } else {
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);

            return redirect()->route('admin.slider')->with('success', 'Data berhasil diubah!');
        }
    }

    public function StoreSlider(Request $request)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|max:255',
                'description' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png'
            ],
            [
                'title.required' => 'Please input brand name.',
                'title.max' => 'Category should less than 255 characters.',
                'description.required' => 'Please input the description'
            ]
        );

        $image = $request->file('image');

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1920, 1080)->save('image/sliders/' . $name_gen);

        $last_img = 'image/sliders/' . $name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return Redirect('home/slider')->with('success', 'Brand successfully inserted!');
    }

    public function DeleteSlider($id)
    {
        $image = Slider::find($id);
        $old_image = $image->image;
        unlink($old_image);
        Slider::find($id)->delete();

        return redirect()->route('admin.slider')->with('success', 'Data berhasil dihapus!');
    }

    //About
    public function HomeAbout()
    {
        $homeAbout = HomeAbout::latest()->get();
        return view('admin.home.about.index', compact('homeAbout'));
    }

    public function AddAbout()
    {
        return view('admin.home.about.add');
    }

    public function EditAbout($id)
    {
        $about = HomeAbout::find($id);
        return view('admin.home.about.edit', compact('about'));
    }

    public function UpdateAbout(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|max:255',
                'long_desc' => 'required',
                'short_desc' => 'required'
            ],
            [
                'title.required' => 'Please input the title.',
                'long_desc.required' => 'Please input the description.',
                'short_desc.required' => 'Please input the description.',
                'title.max' => 'Title should less than 255 characters.',
            ]
        );
        HomeAbout::find($id)->update([
            'title' => $request->title,
            'long_desc' => $request->long_desc,
            'short_desc' => $request->short_desc,
            'created_at' => Carbon::now()
        ]);

        return Redirect('admin/about')->with('success', 'Data successfully updated!');
    }

    public function StoreAbout(Request $request)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|max:255',
                'long_desc' => 'required',
                'short_desc' => 'required'
            ],
            [
                'title.required' => 'Please input the title.',
                'long_desc.required' => 'Please input the description.',
                'short_desc.required' => 'Please input the description.',
                'title.max' => 'Title should less than 255 characters.',
            ]
        );

        HomeAbout::insert([
            'title' => $request->title,
            'long_desc' => $request->long_desc,
            'short_desc' => $request->short_desc,
            'created_at' => Carbon::now()
        ]);

        return Redirect('admin/about')->with('success', 'Data successfully inserted!');
    }

    public function DeleteAbout($id)
    {
        HomeAbout::find($id)->delete();

        return redirect()->route('admin.about')->with('success', 'Data berhasil dihapus!');
    }

    //Services
    public function HomeServices()
    {
        $homeServices = HomeServices::latest()->get();
        return view('admin.home.services.index', compact('homeServices'));
    }

    public function AddServices()
    {
        return view('admin.home.services.add');
    }

    public function EditServices($id)
    {
        $services = HomeServices::find($id);
        return view('admin.home.services.edit', compact('services'));
    }

    public function UpdateServices(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|max:255',
                'description' => 'required',
                'icon' => 'required',
                'color' => 'required'
            ],
            [
                'title.required' => 'Please input the title.',
                'description.required' => 'Please input the description.',
                'icon.required' => 'Please input the icon.',
                'color.required' => 'Please input the color.',
                'title.max' => 'Title should less than 255 characters.',
            ]
        );
        HomeServices::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'color' => $request->color,
            'created_at' => Carbon::now()
        ]);

        return Redirect('admin/services')->with('success', 'Data successfully updated!');
    }

    public function StoreServices(Request $request)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|max:255',
                'description' => 'required',
                'icon' => 'required',
                'color' => 'required'
            ],
            [
                'title.required' => 'Please input the title.',
                'description.required' => 'Please input the description.',
                'icon.required' => 'Please input the icon.',
                'color.required' => 'Please input the color.',
                'title.max' => 'Title should less than 255 characters.',
            ]
        );

        HomeServices::insert([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'color' => $request->color,
            'created_at' => Carbon::now()
        ]);

        return Redirect('admin/services')->with('success', 'Data successfully inserted!');
    }

    public function DeleteServices($id)
    {
        HomeServices::find($id)->delete();

        return redirect()->route('admin.services')->with('success', 'Data berhasil dihapus!');
    }

    //Portfolio
    public function HomePortfolio()
    {
        $images = Multipic::all();
        return view('admin.home.portfolio.index', compact('images'));
    }

    //Profile Menu
    public function Profile()
    {
        $data = User::find(Auth::user()->id);
        return view('admin.profile.profile', compact('data'));
    }

    public function PasswordForm()
    {
        return view('admin.profile.change_password');
    }

    public function ChangePassword(Request $request)
    {
        $validatedData = $request->validate(
            [
                'cpassword' => 'required',
                'password' => 'required|min:6|confirmed'
            ],
            [
                'cpassword.required' => 'Password yang Anda masukkan salah'
            ]
        );

        $oldPassword = Auth::user()->password;
        if (Hash::check($request->cpassword, $oldPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            return back()->with('success', 'Password berhasil diubah!');
        } else {
            return Redirect('admin/password_form')->with('error', 'Password yang Anda masukkan salah!');
        }
    }

    public function UpdateProfile(Request $request)
    {
        $validatedData = $request->validate(
            [
                'email' => 'required|max:255',
                'name' => 'required',
            ],
            [
                'email.required' => 'Please input the email.',
                'name.required' => 'Please input your name.',
                'icon.required' => 'Please input the icon.',
                'color.required' => 'Please input the color.',
                'title.max' => 'Title should less than 255 characters.',
            ]
        );
        User::find(Auth::user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => Carbon::now()
        ]);

        return Redirect('admin/profile_form')->with('success', 'Your profile is successfully updated!');
    }
}
