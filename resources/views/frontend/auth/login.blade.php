@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <div class="container_back clearfix">
                <div class="col-md-6 login-left">
                    <h3>New Customers</h3>
                    <p>By creating an account with our store, you will be able to move through the checkout process
                        faster, store multiple shipping addresses, view and track your orders in your account and
                        more.</p>
                    <a class="acount-btn" href="register.html">Create an Account</a>
                </div>
                <div class="col-md-6 login-right">
                    <h3>{{ trans('labels.frontend.auth.login_box_title') }}</h3>
                    <p>If you have an account with us, please log in.</p>
                    {!! Form::open(['url' => 'login', 'class' => 'form-horizontal']) !!}
                        <div>
                            <span>{!! Form::label('email', trans('validation.attributes.frontend.email')) !!}<label>*</label></span>
                            <input type="text">
                        </div>
                        <div>
                            <span>{!! Form::label('password', trans('validation.attributes.frontend.password')) !!}<label>*</label></span>
                            <input type="text">
                        </div>
                        {!! link_to('password/reset', trans('labels.frontend.passwords.forgot_password')) !!}
                        {!! Form::submit(trans('labels.frontend.auth.login_button'), ['class' => 'btn btn-primary', 'style' => 'margin-right:15px']) !!}
                    {!! Form::close() !!}
                </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('labels.frontend.auth.login_box_title') }}</div>

                <div class="panel-body">

                    {!! Form::open(['url' => 'login', 'class' => 'form-horizontal']) !!}

                    <div class="form-group">
                        {!! Form::label('email', trans('validation.attributes.frontend.email'), ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.email')]) !!}
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    <div class="form-group">
                        {!! Form::label('password', trans('validation.attributes.frontend.password'), ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.password')]) !!}
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('remember') !!} {{ trans('labels.frontend.auth.remember_me') }}
                                </label>
                            </div>
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit(trans('labels.frontend.auth.login_button'), ['class' => 'btn btn-primary', 'style' => 'margin-right:15px']) !!}

                            {!! link_to('password/reset', trans('labels.frontend.passwords.forgot_password')) !!}
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    {!! Form::close() !!}

                    <div class="row text-center">
                        {!! $socialite_links !!}
                    </div>
                </div><!-- panel body -->

            </div><!-- panel -->

        </div><!-- col-md-8 -->

    </div><!-- row -->

@endsection