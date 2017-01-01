<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Supplier;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SupplierController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $suppliers = Supplier::paginate(20);
        return view('dashboard.supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('dashboard.supplier.create');
    }

    public function store(Request $request)
    {
        $data = $request->only('supplier_name', 'is_banned');
        $this->validate($request,[
            'supplier_name'     => 'required|unique:supplier,supplier_name'
        ]);
        $data['sys_user_id']    = Auth::guard('admin')->user();

        $supplier = Supplier::create($data);
        if($supplier){
            flash()->success('操作成功');
            return redirect()->route('dashboard.supplier.index');
        }else{
            flash()->error('操作失败');
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('dashboard.supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only('supplier_name', 'is_banned');
        $this->validate($request,[
            'supplier_name'     => 'required|unique:supplier,supplier_name,'.$id
        ]);
        $data['sys_user_id']    = Auth::guard('admin')->user();

        $supplier = Supplier::where('id', $id)->update($data);
        if($supplier){
            flash()->success('操作成功');
            return redirect()->route('dashboard.supplier.index');
        }else{
            flash()->error('操作失败');
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $supplier = Supplier::destroy($id);

        if($supplier) {

            flash()->success('删除成功');

        } else {

            flash()->error('删除失败');

        }

        return redirect()->back();
    }
}
