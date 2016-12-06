<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 9/5/15
 * Time: 4:07 PM
 */

namespace App\Http\ViewComposers;


use App\Models\ArticleCategory;
use Illuminate\View\View;

class ArticleCategoriesComposer {

    public function compose(View $view)
    {
        $article_categories = ArticleCategory::defaultOrder()->get()->toTree();
        $view->with('article_categories', $article_categories);
    }
} 