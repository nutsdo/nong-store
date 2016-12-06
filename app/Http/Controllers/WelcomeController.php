<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 9/7/15
 * Time: 1:44 PM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class WelcomeController extends Controller{


    public function test(Request $request)
    {
        return $request->header();
    }
} 