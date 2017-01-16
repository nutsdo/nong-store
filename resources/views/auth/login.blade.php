@extends('layouts.auth')
@section('title')
    用户登录 - @parent
@endsection
@section('style')
    {!! Html::style("assets/auth/css/login-forms.css") !!}
@endsection
@section('body')
    <div class="l-form-1-container section-container section-container-image-bg" style="position: relative; z-index: 0; background: none;">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 l-form-1 section-description wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                    <h2>Hey <strong>等你进来哦</strong></h2>
                    <div class="divider-1 wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"><span></span></div>
                    <p>{{ $slogan }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 l-form-1-box wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">

                    <div class="l-form-1-top">
                        <div class="l-form-1-top-left">
                            <h3>等你进来哦～</h3>
                            <p>输入您的帐号密码马上进入哦:</p>
                        </div>
                        <div class="l-form-1-top-right">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    <div class="l-form-1-bottom">
                        <form role="form" action="{{ url('/login') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="sr-only" for="email">E-mail</label>
                                <input type="text" name="email" placeholder="邮箱..." class="l-form-1-username form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="password">Password</label>
                                <input type="password" name="password" placeholder="密码..." class="l-form-1-password form-control" id="password">
                            </div>
                            <button type="submit" class="btn">登录</button>
                        </form>
                        <div class="form-elements-divider"></div>
                        <div class="l-form-1-questions">
                            <a href="{{ url('/password/reset') }}">忘记密码?</a> -
                            <a href="{{ url('/register') }}">还未注册?</a>
                        </div>
                    </div>

                </div>
            </div>
            {{--<div class="row">--}}
                {{--<div class="col-sm-6 col-sm-offset-3 l-form-1-social-login">--}}
                    {{--<h3>...第三方登录:</h3>--}}
                    {{--<div class="l-form-1-social-login-buttons">--}}
                        {{--<a class="btn btn-link-2" href="">--}}
                            {{--<i class="fa fa-facebook"></i> Facebook--}}
                        {{--</a>--}}
                        {{--<a class="btn btn-link-2" href="">--}}
                            {{--<i class="fa fa-twitter"></i> Twitter--}}
                        {{--</a>--}}
                        {{--<a class="btn btn-link-2" href="">--}}
                            {{--<i class="fa fa-google-plus"></i> Google Plus--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
@endsection

@section('script')
    {!! Html::script("assets/auth/js/login-forms.js") !!}
@endsection