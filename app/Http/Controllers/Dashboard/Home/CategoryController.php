<?php

namespace App\Http\Controllers\Dashboard\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\home\CategoryRequest;
use App\Models\Category;
use App\Services\Home\CategoryService;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.categories.index');
    }

    public function getAll(){
      return $this->categoryService->getAll();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryService->getCategoriesParent();
        return view('dashboard.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {

        $data = $request->only(['name','parent','status']);
        if( !$this->categoryService->store($data) ){
            return redirect()->back()->with(['error'=>'something went wrong']);
        }
        return redirect()->route('dashboard.categories.index')
            ->with(['success'=>'category created successfully']);
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
        $category = $this->categoryService->findById($id);
        $categories = $this->categoryService->getCategoriesExceptChildren($id);
       return view('dashboard.categories.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        if (!$this->categoryService->update($id,$request)){
            return redirect()->back()->with(['error'=>'something went wrong']);
        }
        return redirect()->route('dashboard.categories.index')
            ->with(['success'=>'category updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       if (!$this->categoryService->destroy($id)){
           return redirect()->back()->withErrors(['error'=>'try again later']);
       }
       return redirect()->route('dashboard.categories.index')
           ->with(['success'=>'category delete success']);
    }

    public function changeStatus($catID)
    {
        $cat = $this->categoryService->changeStatus($catID);
        if (!$cat){
            return response()->json([
                'status' => 'error',
                'msg'=>'something went wrong',
                'data'=>null,
            ]);
        }
        return response()->json([
            'status' => 'success',
            'msg'=>'status change successfully',
            'data'=>$cat,
        ]);
    }
}
