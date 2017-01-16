@extends('layouts.auth')
@section('title')
    忘记密码 - @parent
@endsection
@section('style')
{!! Html::style("assets/auth/css/media-queries.css") !!}
{!! Html::style("assets/auth/css/style.css") !!}
@endsection
<!-- Main Content -->
@section('body')
    <div class="top-content" style="position: relative; z-index: 0; background: none;">
        <div class="inner-bg">
            <div class="container">

                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1 class="wow fadeInLeftBig animated" style="visibility: visible; animation-name: fadeInLeftBig;">重置密码</h1>
                        <div class="description wow fadeInLeftBig animated" style="visibility: visible; animation-name: fadeInLeftBig;">
                            <p>
                                输入您的邮箱，找回您的密码!
                            </p>
                        </div>
                        <div class="subscribe wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                            <form class="form-inline" role="form" action="{{ url('/password/email') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="sr-only" for="email">Email</label>
                                    <input type="text" name="email" value="{{ old('email') }}" placeholder="输入您的Email..." class="subscribe-email form-control" id="email">

                                </div>
                                <button type="submit" class="btn">发送重置密码链接</button>
                            </form>
                            <div class="success-message">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{--<div class="row">--}}
                    {{--<div class="col-sm-8 col-sm-offset-2 top-video-link medium-paragraph wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">--}}
                        {{--<a href="#" class="launch-modal" data-modal-id="modal-how-it-works">--}}
                            {{--<span class="top-video-link-icon"><i class="fa fa-play"></i></span>--}}
                            {{--<span class="top-video-link-text">See how it works</span>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="row">
                    <div class="col-sm-12 top-social wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">

                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
@section('script')
    {!! Html::script("assets/auth/js/scripts.js") !!}
@endsection