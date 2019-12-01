<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('VerifyCategoryHasNoPosts')->only(['destroy']);
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        return view('admin.category.index')->with('categories', Category::all());
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * @param CreateCategoryRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreateCategoryRequest $request)
    {
        Category::create([
           'name' => $request->name,
        ]);

        session()->flash('success', 'Category successfully created');

        return redirect(route('category.index'));
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function show($id)
    {
        return view('admin.category.index')->with('categories', Category::all());
    }

    /**
     * @param Category $category
     * @return Factory|View
     */
    public function edit(Category $category)
    {
        return view('admin.category.create')->with('category', $category);
    }

    /**
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return RedirectResponse|Redirector
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
        ]);

        session()->flash('success', 'Category successfully updated');

        return redirect(route('category.index'));
    }

    /**
     * @param Category $category
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', 'Category deleted successfully');

        return redirect(route('category.index'));
    }
}
