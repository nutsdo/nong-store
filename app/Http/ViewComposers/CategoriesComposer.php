<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/30/15
 * Time: 10:11 AM
 */

namespace App\Http\ViewComposers;


use App\Models\Category;
use Illuminate\View\View;

class CategoriesComposer {

    public function compose(View $view)
    {
        $categories = Category::defaultOrder()->get()->toTree();
        $view->with('categories', $categories);
    }
} 