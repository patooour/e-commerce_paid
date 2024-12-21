<?php

namespace App\Repositories\Home;

use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;

class CategoryRepository
{

    public function findById($id)
    {
        $category = Category::findorfail($id);
        return $category;
    }
    public function getAll(){
        $categories = Category::all();

        $categories =  Datatables::of($categories)
            ->addIndexColumn()
            ->addColumn('name' ,function($categories){
                return $categories->getTranslation('name', app()->getLocale());
            })
            ->addColumn('status' ,function($categories){
                return $categories->status == 1 ? 'Active' : 'Inactive';
            })
            ->addColumn('actions' ,function($category){
                return view('dashboard.categories.actions' , compact('category'));
            })

            ->make(true);
        return $categories;

    }

    public function store($data)
    {
        $category = Category::create($data);
        return $category;
    }

    public function getCategoriesExceptChildren($id)
    {
       $categories =  Category::where('id','!=',$id)
            ->whereNull('parent')
            ->get();

       return $categories;
    }
    public function getCategoriesParent()
    {
        $categories =  Category::whereNull('parent')
            ->get();

        return $categories;
    }
    public function update($category , $request)
    {
        $category =   $category->update([
            'name'=>[
                'ar'=>$request->name['ar'],
                'en'=>$request->name['en'],
            ],
            'parent'=>$request->parent,
            'status'=>$request->status,
        ]);
        return $category;

    }
    public function destroy($category)
    {
        $category->delete();
        return true;
    }

    public function changeStatus($catID)
    {
        $category = self::findById($catID);
        $category->update([
            'status' => $category->status == 1 ? 0 : 1
        ]);
        return $category;
    }
}
