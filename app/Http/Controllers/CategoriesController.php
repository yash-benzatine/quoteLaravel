<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Intervention\Image\Facades\Image;


class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Display a listing of the categories.
    public function index()
    {
        $categories = Category::orderBy('id','desc')->get();
        return view('categories.index', compact('categories'));
    }

    // Show the form for creating a new category.
    public function create()
    {
        return view('categories.create');
    }

    // Store a newly created category in the database.
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension(); // Use getClientOriginalExtension() instead of extension()

        // Upload thumbnail
        $destinationPathThumbnail = public_path('images/category/thumbnail');
        $img = Image::make($image->path());
        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPathThumbnail . '/' . $imageName);

        // Move the original image to another directory
        $destinationPathOriginal = public_path('images/category/original');
        $image->move($destinationPathOriginal, $imageName);


        $ins['category_name'] = $request->name;
        $ins['category_img'] = 'images/category/original/' . $imageName;
        $ins['category_thumbnail'] = 'images/category/thumbnail/' . $imageName;
        // Save data to database


        Category::create($ins);

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    // Display the specified category.
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    // Show the form for editing the specified category.
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Update the specified category in the database.
    public function update(Request $request, Category $category)
    {

        $image = $request->file('image');
        if ($image) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Use getClientOriginalExtension() instead of extension()

            // Upload thumbnail
            $destinationPathThumbnail = public_path('images/category/thumbnail');
            $img = Image::make($image->path());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPathThumbnail . '/' . $imageName);

            // Move the original image to another directory
            $destinationPathOriginal = public_path('images/category/original');
            $image->move($destinationPathOriginal, $imageName);


            $ins['category_name'] = $request->name;
            $ins['category_img'] = 'images/category/original/' . $imageName;
            $ins['category_thumbnail'] = 'images/category/thumbnail/' . $imageName;
        } else {
            $ins['category_name'] = $request->name;
        }
        // Validation logic can be added here if needed
        $category->update($ins);

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    // Remove the specified category from the database.
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
