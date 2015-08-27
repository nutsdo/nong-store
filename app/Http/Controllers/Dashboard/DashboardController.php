<?php namespace App\Http\Controllers\Dashboard;
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/25/15
 * Time: 9:51 AM
 */

class DashboardController extends BaseController{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('dashboard.index');
    }
} 