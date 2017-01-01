<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Brand;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BrandController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $brands = Brand::all();
        return view('dashboard.brand.index', compact('brands'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
