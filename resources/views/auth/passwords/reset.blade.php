@extends('layouts.maket')

@section('content')
<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

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

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
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


                    <form action="{{ url('/password/reset') }}" class="form newtopic" method="post">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ csrf_field() }}
                        <div class="postinfotop">
                            <h2>Log in</h2>
                        </div>
                        

                        <!-- acc section -->
                        <div class="accsection">

                            <div class="topwrap">
                                <div class="userinfo pull-left">

                                </div>
                                <div class="posttext pull-left">

                                    <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                        <input type="text" name="email" value="{{old('email')}}"placeholder="Email" class="form-control" />
                                        
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 {{ $errors->has('password') ? ' has-error' : '' }}">
                                                <input type="password" name='password' placeholder="Password" class="form-control" />
                                                 @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-lg-6 col-md-6 error1">
                                                <input type="password" name='password_confirmation' placeholder="Password Confirmation" class="form-control" />
                                                @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div>&nbsp;<br></div>
                                    
                                       
                                        
                                           
                                       
                                    


                                </div>
                                <div class="clearfix"></div>
                            </div>  
                        </div><!-- acc section END -->
                        <!-- acc section -->
                        <div class="postinfobot">
                            <div class="notechbox pull-left">
                               
                                
                            </div>
                            <div class="pull-left lblfch">
                               
                            </div>
                            <div class="pull-right postreply">
                                <div class="pull-left"> </div>
                                <div class="pull-left"><button type="submit" class="btn btn-primary"> Reset Password</button></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div><!-- POST -->






            </div>



@endsection
