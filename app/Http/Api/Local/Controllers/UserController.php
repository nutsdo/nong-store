<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/12/25
 * Time: 上午11:31
 */

namespace App\Http\Api\Local\Controllers;


use App\Models\User;

class UserController extends BaseController
{
    public function show($id)
    {
        $user = User::find($id);

        if(!$user){
            return $this->response->errorNotFound();
        }

        return $this->response->item($user);
    }
}