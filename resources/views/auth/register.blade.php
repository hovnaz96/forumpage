@extends('layouts.maket')

@section('content')
<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->

<style>
    .error{
        border:1px solid red !important;
    }
</style>



<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 breadcrumbf">
                <a href="#">Create New account</a> 
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <!-- POST -->
                <div class="post">
                    <form action="{{ url('/register')}}" class="form newtopic" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="postinfotop">
                            <h2>Create New Account</h2>
                        </div>

                        <!-- acc section -->
                        <div class="accsection">
                            <div class="acccap">
                                <div class="userinfo pull-left">&nbsp;</div>
                                <div class="posttext pull-left"><h3>Required Fields</h3></div>
                                <div class="clearfix"></div>
                            </div>
                            @if(session('status'))
                                <div class="alert alert-success">
                                    {{session('status')}}
                                <div>
                            @endif
                            @if(count($errors) > 0)
                                <div class="acccap">
                                    <div class="userinfo pull-left">&nbsp;</div>
                                    <ul class="posttext pull-left" style="color:red">
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="topwrap">
                                <div class="userinfo pull-left">
                                    <div class="avatar">
                                        <img src="images/avatar-blank.jpg" alt="" />
                                        <div class="status green">&nbsp;</div>
                                    </div>
                                    <div class="imgsize"></div>
                                    <div style="width:51px;">
                                        <button class="btn {{ $errors->has('avatar_image') ? ' error' : '' }}" style="position:relative;"><input  style="font-size:24px;opacity:0;width:51px;position:absolute;left:0px;top:-1px;" type='file' name='avatar_image'  />Add</button>
                                    </div>
                                </div>
                                <div class="userinfo posttext pull-left">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 error1">
                                            <input type="text" placeholder="First Name"  value="{{ old('first_name') }}" class="form-control {{ $errors->has('first_name') ? ' error' : '' }}" name="first_name" />
                                        </div>
                                        <div class="col-lg-6 col-md-6 error1">
                                            <input type="text" placeholder="Last Name"  value="{{ old('last_name') }}" class="form-control {{ $errors->has('last_name') ? ' error' : '' }}" name="last_name" />
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                           
                                            <div>
                                                <input type="text" placeholder="Email" value="{{ old('email') }}" class="form-control {{ $errors->has('password') ? ' error' : '' }}" name="email"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 error1">
                                            <input type="password" placeholder="Password" class="form-control {{ $errors->has('password') ? ' error' : '' }}" id="pass" name="password" />
                                        </div>
                                        <div class="col-lg-6 col-md-6 error1">
                                            <input type="password" placeholder="Retype Password" class="form-control" id="pass2" name="password_confirmation" />
                                        </div>
                                    </div>

                                </div>
                                <div class="clearfix"></div>
                            </div>  
                        </div><!-- acc section END -->
                        <div class="postinfobot">

                            <div class="notechbox pull-left">
                                <input type="checkbox" name="note" id="note" class="form-control" />
                            </div>

                            <div class="pull-left lblfch">
                                <label for="note"> I agree with the Terms and Conditions of this site</label>
                            </div>

                            <div class="pull-right postreply">
                                <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                                <div class="pull-left"><button type="submit" class="btn btn-primary">Sign Up</button></div>
                                <div class="clearfix"></div>
                            </div>


                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div><!-- POST -->
            </div>
           
    @endsection
