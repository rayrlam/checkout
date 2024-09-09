<?php
namespace App\Helpers;

use App\Repositories\CategoryRepository;

class CategoryHelper
{
    static private $path = 'category';

    static public function breadcrumb(int $id, string $sep = ">", bool $withUrl = true): array
    {
        $breadcrumb = [];
        $i = 0;
       
        $arr = CategoryRepository::getCategory($id);
       
        while(1){    
            $breadcrumb[$i]['name'] = $arr['name'];
            $breadcrumb[$i]['sep'] = $sep;
            if($withUrl === true){
                $breadcrumb[$i]['url'] = self::$path . "/" . $arr['id'];
            }
            
            if($arr['parent_id'] == 0) {
                break;
            }

            $arr = CategoryRepository::getCategory($arr['parent_id']);
            $i++;
        }

        return array_reverse($breadcrumb);
    }
} 