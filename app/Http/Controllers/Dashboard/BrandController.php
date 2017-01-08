<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Brand;
use App\Models\Supplier;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $suppliers = Supplier::where('is_banned', 0)->get();
        return view('dashboard.brand.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $data = $request->only('supplier_id', 'brand_name', 'is_banned');

        $this->validate($request,[
            'brand_name'     => 'required|unique:brand,brand_name'
        ]);

        $user = Auth::guard('admin')->user();

        $data['sys_user_id']    = $user->id;

        $data['supplier_id'] = $data['supplier_id']?:0;

        $supplier = Brand::create($data);

        if($supplier){
            flash()->success('操作成功');
            return redirect()->route('dashboard.brand.index');
        }else{
            flash()->error('操作失败');
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        $suppliers = Supplier::where('is_banned', 0)->get();
        return view('dashboard.brand.edit', compact('brand', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only('supplier_id', 'brand_name', 'is_banned');

        $this->validate($request,[
            'brand_name'     => 'required|unique:brand,brand_name,'.$id
        ]);

        $user = Auth::guard('admin')->user();

        $data['sys_user_id']    = $user->id;

        $data['supplier_id'] = $data['supplier_id']?:0;

        $supplier = Brand::where('id', $id)->update($data);

        if($supplier){
            flash()->success('操作成功');
            return redirect()->route('dashboard.brand.index');
        }else{
            flash()->error('操作失败');
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $supplier = Brand::destroy($id);

        if($supplier) {

            flash()->success('删除成功');

        } else {

            flash()->error('删除失败');

        }

        return redirect()->back();
    }
}
