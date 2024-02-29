<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Intervention\Image\Facades\Image;

use Illuminate\Http\Request;

class ThemesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $themes = Theme::orderBy('id', 'desc')->get();
        return view('themes.index', compact('themes'));
    }

    public function create()
    {
        return view('themes.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $destinationPathOriginal = public_path('images/theme/');
        $image->move($destinationPathOriginal, $imageName);


        $ins['theme_name'] = $request->name;
        $ins['theme_img'] = 'images/theme/' . $imageName;
        $ins['is_purchase'] = $request->is_purchase == "on" ? 1 : 0;

        Theme::create($ins);
        return redirect()->route('themes.index');
    }

    public function show(Theme $theme)
    {
        return view('themes.show', compact('theme'));
    }

    public function edit(Theme $theme)
    {
        return view('themes.edit', compact('theme'));
    }

    public function update(Request $request, Theme $theme)
    {
        $image = $request->file('image');
        if ($image) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $destinationPathOriginal = public_path('images/theme/');
            $image->move($destinationPathOriginal, $imageName);


            $ins['theme_name'] = $request->name;
            $ins['theme_img'] = 'images/theme/' . $imageName;
            $ins['is_purchase'] = $request->is_purchase == "on" ? 1 : 0;
        } else {
            $ins['theme_name'] = $request->name;
            $ins['is_purchase'] = $request->is_purchase == "on" ? 1 : 0;
        }
        // Validation logic can be added here if needed
        $theme->update($ins);
        return redirect()->route('themes.index');
    }

    public function destroy(Theme $theme)
    {
        $theme->delete();
        return redirect()->route('themes.index');
    }
}
