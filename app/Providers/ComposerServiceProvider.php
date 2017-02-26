<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/27/15
 * Time: 7:56 PM
 */

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        view()->composers([
            'App\Http\ViewComposers\AuthComposer' =>'dashboard.*',
            'App\Http\ViewComposers\CategoriesComposer' => 'dashboard.category.index',
            'App\Http\ViewComposers\ArticleCategoriesComposer' => 'dashboard.article_category.index',
            'App\Http\ViewComposers\CommonComposer' => 'dashboard.sidebar',
            'App\Http\ViewComposers\BreadcrumbComposer' => 'dashboard.breadcrumb',
            'App\Http\ViewComposers\FrontComposer' => ['layouts.front', 'front.*', '*'],
            'App\Http\ViewComposers\StoreCommonComposer' => ['store.*'],
        ]);

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
} 