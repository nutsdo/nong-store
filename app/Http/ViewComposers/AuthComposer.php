<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/27/15
 * Time: 8:03 PM
 */

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class AuthComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $user = Auth::guard('admin')->user();
        $view->with('login_admin_user', $user);
    }
} 