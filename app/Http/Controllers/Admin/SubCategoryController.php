<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:sub-category index,admin'])->only('index');
        $this->middleware(middleware: ['permission:sub-category create,admin'])->only(['create', 'store']);
        $this->middleware(middleware: ['permission:sub-category update,admin'])->only(['edit', 'update']);
        $this->middleware(['permission:sub-category delete,admin'])->only(['destroy']);
    }
    public function index()
    {
        $subcategories = SubCategory::all();
        return view('admin.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allCategory = Category::where('language','en')->get();

        return view('admin.subcategory.create', compact('allCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'name' => ['required', 'max:255', 'unique:sub_categories,name'],
            'category_id' => ['required']
        ])->validate();
        $SubCategory = new SubCategory();
        $SubCategory->name = $request->name;
        $SubCategory->is_active = $request->is_active;
        $SubCategory->category_id = $request->category_id;
        $SubCategory->save();

        toast(__('admin.Created Successfully'),'success')->width('350');

        return redirect()->route('auth/admin.subcategory.index');
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
    public function edit(string $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $allCategory = Category::all();
        return view('admin.subcategory.edit', compact( 'subcategory','allCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(),[
            'name' => ['required', 'max:255'],
        ])->validate();
        // dd($request->toArray());
        $SubCategory = SubCategory::findOrFail($id);
        $SubCategory->name = $request->name;
        $SubCategory->is_active = $request->is_active;
        $SubCategory->category_id = $request->category_id;
        $SubCategory->save();

        toast(__('admin.Update Successfully'),'success')->width('350');

        return redirect()->route('auth/admin.subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

       try {
            $SubCategory = SubCategory::findOrFail($id);
            $SubCategory->delete();
            return response(['status' => 'success', 'message' => __('admin.Deleted Successfully!')]);
       } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('admin.Someting went wrong!')]);
       }
    }
}
