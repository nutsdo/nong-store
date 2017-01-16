<?php

namespace App\Http\Controllers\Front;

use App\Models\ExperienceApply;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExperienceApplyController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function apply()
    {
        $user = $this->login_user;
        $apply = ExperienceApply::ofUser($user->id)->first();
        return view('front.experience.apply', compact('apply'));
    }

    public function store(Request $request)
    {
        $user = $this->login_user;
        $apply = ExperienceApply::ofUser($user->id)->first();

        if($apply->status==1) return back();

        $data = $request->only('title','body');
        if($apply){
            $result = ExperienceApply::ofUser($user->id)->update($data);
        }else{
            $data['user_id'] = $user->id;
            $result = ExperienceApply::create($data);
        }
        return back();
    }

}
