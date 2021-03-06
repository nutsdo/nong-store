@extends('layouts.auth')
@section('style')
    {!! Html::style("assets/auth/css/registration-forms.css") !!}
@endsection
@section('body')
    <div class="r-form-1-container section-container section-container-image-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 r-form-1 section-description wow fadeIn animated">
                    <h2> <strong>重置密码</strong></h2>
                    <div class="divider-1 wow fadeInUp animated"><span></span></div>
                    <p>请填写以下信息.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 r-form-1-box wow fadeInUp animated">

                    <div class="r-form-1-top">
                        <div class="r-form-1-top-left">
                            <h3>重置密码</h3>
                            <p>请填写以下信息以重置密码:</p>
                        </div>
                        <div class="r-form-1-top-right">
                            <i class="fa fa-pencil"></i>
                        </div>
                    </div>
                    <div class="r-form-1-bottom">
                        <form role="form" action="{{ url('/password/reset') }}" method="post">
                            {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="sr-only" for="email">E-mail</label>
                                <input type="text" name="email" placeholder="请输入您的邮箱..." class="r-form-1-first-name form-control" id="email">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="sr-only" for="password">密码</label>
                                <input type="password" name="password" placeholder="密码..." class="r-form-1-last-name form-control" id="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="sr-only" for="password_confirmation">确认密码</label>
                                <input type="password" name="password_confirmation" placeholder="确认密码..." class="r-form-1-email form-control" id="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <button type="submit" class="btn">确定重置!</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {!! Html::script("assets/auth/js/registration-forms.js") !!}
@endsection