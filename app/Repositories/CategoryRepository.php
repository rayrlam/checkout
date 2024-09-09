<?php
namespace App\Repositories;

use App\Models\Category\Category;

class CategoryRepository
{
    static public function getCategory(int $id): array
    {
        $category = Category::findOrFail($id);
        return ['id'=>$category->id, 'parent_id'=>$category->parent_id, 'name'=>$category->name];
    }

    static public function categories($id): object
    {
        return Category::where('parent_id', $id)->get();
    }

    static public function pid(): object
    {
        return Category::select('parent_id')->groupBy('parent_id')->get();
    }

    static public function list(): object
    {
        return Category::all();
    }
} 