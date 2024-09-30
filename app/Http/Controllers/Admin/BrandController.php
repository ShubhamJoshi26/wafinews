<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    use FileUploadTrait;
    public function __construct()
    {
        $this->middleware(['permission:brand index,admin'])->only('index');
        $this->middleware(middleware: ['permission:brand create,admin'])->only(['create', 'store']);
        $this->middleware(middleware: ['permission:brand update,admin'])->only(['edit', 'update']);
        $this->middleware(['permission:brand delete,admin'])->only(['destroy']);
    }
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        return view('admin.brand.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'name' => ['required', 'max:255', 'unique:brands,name'],
            'image' => ['required','mimes:png,jpg,webp']
        ])->validate();
        $imagePath = $this->handleFileUpload($request, 'image');
        $Brand = new Brand();
        $Brand->name = $request->name;
        $Brand->is_active = $request->is_active;
        $Brand->show_at_nav = $request->show_at_nav;
        $Brand->slug = \Str::slug($request->name);
        $Brand->image = $imagePath;
        $Brand->save();

        toast(__('admin.Created Successfully'),'success')->width('350');

        return redirect()->route('/news/auth/admin/brand.index');
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
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact( 'brand'));
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
        $Brand = Brand::findOrFail($id);
        $Brand->name = $request->name;
        $Brand->is_active = $request->is_active;
        $Brand->show_at_nav = $request->show_at_nav;
        $Brand->slug = \Str::slug($request->name);
        if($request->hasFile('image'))
        {
            $imagePath = $this->handleFileUpload($request, 'image');
            $Brand->image = $imagePath;
        }
        $Brand->save();

        toast(__('admin.Update Successfully'),'success')->width('350');

        return redirect()->route('/news/auth/admin/brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

       try {
            $Brand = Brand::findOrFail($id);
            $Brand->delete();
            return response(['status' => 'success', 'message' => __('admin.Deleted Successfully!')]);
       } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('admin.Someting went wrong!')]);
       }
    }
}
