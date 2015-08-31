<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/31/15
 * Time: 9:37 AM
 */

namespace App\Http\Controllers\Dashboard;


class ProductController extends BaseController{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return '产品首页';
    }

} 