<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;


class CategoryController extends Controller
{
    private static $imagePath = 'images/categories/featured-images';

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admins.categories.index', [
            'categories' => Category::with(['parent'])
                ->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admins.categories.create', [
            'categories' => Category::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');

            $imageName = Storage::disk('public')
                ->putFileAs(
                    self::$imagePath,
                    $image,
                    date('Ymd')
                        . '_' . $validated['slug']
                        . '_' . $image->hashName(),
                );

            $validated['featured_image'] = $imageName;
        }

        Category::create($validated);

        return to_route('admins.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): View
    {
        return view('admins.categories.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return view('admins.categories.edit', [
            'category' => $category,
            'categories' => Category::get()
                ->where('id', '<>', $category->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');

            if (!empty($category->featured_image)) {
                Storage::disk('public')
                    ->delete($category->featured_image);
            }

            $imageName = Storage::disk('public')
                ->putFileAs(
                    self::$imagePath,
                    $image,
                    date('Ymd')
                        . '_' . $category->slug
                        . '_' . $image->hashName(),
                );

            $validated['featured_image'] = $imageName;
        }

        $category->update($validated);

        return to_route('admins.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        if (!empty($category->featured_image)) {
            Storage::disk('public')
                ->delete($category->featured_image);
        }

        $category->delete();

        return to_route('admins.categories.index');
    }
}
