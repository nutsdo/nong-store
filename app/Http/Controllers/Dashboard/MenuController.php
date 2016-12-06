<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\StoreMenuPostRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kalnoy\Nestedset\Collection;

class MenuController extends BaseController
{
    protected $view_path = 'dashboard.menu.';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $menus = Menu::defaultOrder()->get()->toTree();
        return view($this->view_path.__FUNCTION__,compact('menus'));
    }

    public function create(Request $request)
    {
        $data = $request->only('father_id');
        $categories = $this->getCategoryOptions();
        return view($this->view_path.__FUNCTION__, compact('data','categories'));
    }

    public function store(StoreMenuPostRequest $request)
    {
        $input = $request->all();
        //$input['user_id'] = $this->login_user->id;
        $res = Menu::create($input);
        if($res){
            flash()->success('操作成功');
        }else{
            flash()->error('操作失败');
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        $categories = $this->getCategoryOptions();
        return view($this->view_path.__FUNCTION__, compact('menu','categories'));
    }

    public function update(StoreMenuPostRequest $request, $id)
    {
        $menu = Menu::find($id);

        $res = $menu->update($request->all());

        Menu::fixTree();

        if($res){
            flash()->success('操作成功');
        }else{
            flash()->error('操作失败');
        }

        return redirect()->back();
    }

    /**
     * @param Collection $items
     *
     * @return static
     */
    protected function makeOptions(Collection $items)
    {
        //dd($items);
        $options = [ '' => '顶级菜单' ];

        foreach ($items as $item)
        {
            $options[$item->getKey()] = str_repeat('‒', $item->depth + 1).' '.$item->fun_name;
        }

        return $options;
    }

    /**
     * @param Category $except
     *
     * @return CategoriesController
     */
    protected function getCategoryOptions($except = null)
    {
        /** @var \Kalnoy\Nestedset\QueryBuilder $query */
        $query = Menu::select('id', 'fun_name')->withDepth();

        if ($except)
        {
            $query->whereNotDescendantOf($except)->where('id', '<>', $except->id);
        }

        return $this->makeOptions($query->get());
    }

}
