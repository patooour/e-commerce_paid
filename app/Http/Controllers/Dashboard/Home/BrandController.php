<?php

namespace App\Http\Controllers\Dashboard\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\home\BrandRequest;
use App\Services\Home\BrandService;
use App\Utils\imageManager;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $brandService;
    protected $imageManager;
    public function __construct(BrandService $brandService  , imageManager $imageManager)
    {
        $this->brandService = $brandService;
        $this->imageManager = $imageManager;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.brands.index');
    }

    public function getAll(){
        return $this->brandService->getAll();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = $this->brandService->getbrandsParent();
        return view('dashboard.brands.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {


        $request['status'] = $request['status'] === 'on' ? 1 : 0;
        $data = $request->only(['name','logo','status']);
        if( !$this->brandService->store($data) ){
            return redirect()->back()->with(['error'=>'something went wrong']);
        }
        return redirect()->route('dashboard.brands.index')
            ->with(['success'=>'Brand created successfully']);
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
        $brand = $this->brandService->findById($id);
        return view('dashboard.brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, string $id)
    {

        if (!$this->brandService->update($id,$request)){
            return redirect()->back()->with(['error'=>'something went wrong']);
        }
        return redirect()->route('dashboard.brands.index')
            ->with(['success'=>'category updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->brandService->destroy($id)){
            return redirect()->back()->withErrors(['error'=>'try again later']);
        }
        return redirect()->route('dashboard.brands.index')
            ->with(['success'=>'Brand delete success']);
    }

    public function changeStatus($brandID)
    {
        $brand = $this->brandService->changeStatus($brandID);
        if (!$brand){
            return response()->json([
                'status' => 'error',
                'msg'=>'something went wrong',
                'data'=>null,
            ]);
        }
        return response()->json([
            'status' => 'success',
            'msg'=>'status change successfully',
            'data'=> $brand,
        ]);
    }
}
