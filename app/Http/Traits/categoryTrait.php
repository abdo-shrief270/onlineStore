<?php


namespace App\Http\Traits;


trait categoryTrait
{

    public function productsCount($categories)
    {
        foreach ($categories as $category) {
            $category['countOfProducts'] = count($category->products);
        }
        return $categories;
    }
}
