@extends('layouts.maket')

<!-- Main Content -->
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
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
                <a href="#">Reset Password</a> 
            </div>
        </div>
    </div>


    <div class="container">

        <div class="row">

            <div class="col-lg-8 col-md-8">



                <!-- POST -->
                <div class="post">
                   

                    <form action="{{ url('/password/email') }}" class="form newtopic" method="post">
                        {{ csrf_field() }}
                        <div class="postinfotop">
                            <h2>Reset Password</h2>
                        </div>
                        

                        <!-- acc section -->
                        <div class="accsection">

                            <div class="topwrap">
                                
                                <div class="userinfo pull-left">
                                    
                                </div>
                                
                                <div class="posttext pull-left">
                                     @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input type="text" name="email" placeholder="E-Mail Address" class="form-control" />
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    
                                   
                                    
                                       
                                        
                                           
                                       
                                    


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
                                <div class="pull-left"> 
                                </div>
                                <div class="pull-left"><button type="submit" class="btn btn-primary">Send Password Reset Link</button></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div><!-- POST -->






            </div>
@endsection
