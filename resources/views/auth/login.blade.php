@extends('layouts.maket')

@section('content')

<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

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
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
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


                    <form action="{{ url('/login') }}" class="form newtopic" method="post">
                        {{ csrf_field() }}
                        <div class="postinfotop">
                            <h2>Log in</h2>
                        </div>
                        <div class="accsection networks">
                            <div class="acccap">
                                <div class="userinfo pull-left">&nbsp;</div>
                                <div class="posttext pull-left">

                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="topwrap">
                                <div class="userinfo pull-left">&nbsp;</div>
                                <div class="posttext pull-left">

                                    <div class="row">
                                        <a href="{{url('auth/facebook')}}" >
                                            <div class="col-lg-6 col-md-6">
                                                <span class="btn btn-fb">Log In Facebook Account</span>
                                            </div>
                                        </a>
                                        <div class="col-lg-6 col-md-6">
                                            <button class="btn btn-gp">Log In Google + Account</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>  
                        </div><!-- acc section END -->

                        <!-- acc section -->
                        <div class="accsection">

                            <div class="topwrap">
                                <div class="userinfo pull-left">

                                </div>
                                <div class="posttext pull-left">

                                    <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input type="text" name="email" placeholder="Email" class="form-control" />
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input type="password" name='password' placeholder="Password" class="form-control" />
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div>&nbsp;<br></div>
                                    
                                       
                                        
                                           
                                       
                                    


                                </div>
                                <div class="clearfix"></div>
                            </div>  
                        </div><!-- acc section END -->
                        <!-- acc section -->
                        <div class="postinfobot">
                            <div class="notechbox pull-left">
                                <input type="checkbox" name="remember" id="note" class="form-control"> 
                                
                            </div>
                            <div class="pull-left lblfch">
                                <label for="note"> Remember Me</label>
                            </div>
                            <div class="pull-right postreply">
                                <div class="pull-left"> <div>
                                            <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                                Forgot Your Password?
                                            </a>
                                        </div></div>
                                <div class="pull-left"><button type="submit" class="btn btn-primary">Sign Up</button></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div><!-- POST -->






            </div>
           
@endsection
