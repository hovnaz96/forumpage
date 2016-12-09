<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Forum :: Home Page</title>
         <!-- CSRF Token -->
       <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Bootstrap -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Custom -->
        <link href="{{asset('css/custom.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        <!-- CSS STYLE-->
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" media="screen" />
    </head>
    <body>
        <style>
            .statusdropdown{
                float:left;
                border-radius:1000px;
                width:15px;
                height:15px;
                margin-right: 10px;
            }
            .dropdown-menu>li>a{
                padding:9px 20px;
            }
            .divider{
                margin:2px !important;
            }
            .menu li a{
                color:#939593  !important;
            }
        </style>
        <div class="container-fluid">
            <div class="headernav">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1 col-xs-3 col-sm-2 col-md-2 logo "><a href="index.html"><img src="images/logo.jpg" alt=""  /></a></div>
                        <div class="col-lg-3 col-xs-9 col-sm-5 col-md-3 selecttopic">
                            <div class="dropdown">
                                <a data-toggle="dropdown" href="#" >Borderlands 2</a> <b class="caret"></b>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Borderlands 1</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-2" href="#">Borderlands 2</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-3" href="#">Borderlands 3</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 search hidden-xs hidden-sm col-md-3">
                            <div class="wrap">
                                <form action="#" method="post" class="form">
                                    <div class="pull-left txt"><input type="text" class="form-control" placeholder="Search Topics"></div>
                                    <div class="pull-right"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xs-12 col-sm-5 col-md-4 avt">
                            <div class="stnt pull-left">                            
                                <form action="03_new_topic.html" method="post" class="form">
                                    <button class="btn btn-primary">Start New Topic</button>
                                </form>
                            </div>
                            <div class="env pull-left"><i class="fa fa-envelope"></i></div>

                            <div class="avatar pull-left dropdown">
                                <a data-toggle="dropdown" href="javascript:void(0)">
                                    @if (Auth::guest())
                                        <img src="images/default-user.png"  width="37px" height="37px" alt="" /></a> <b class="caret"></b>
                                        <!--<div class="status green">&nbsp;</div>-->
                                        <ul class="dropdown-menu" role="menu">
                                            <li role="presentation" ><a data-toggle="modal" data-target="#myModal" role="menuitem" tabindex="-3" href="javascript:void(0)">Log In</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-4" href="/register">Create account</a></li>
                                        </ul>
                                    @else
                                        <img src="{{url('uploads/'.Auth::user()->avatar_user)}}" width="37px" height="37px" alt="" /></a> <b class="caret"></b>
                                        <div data="{{ Auth::user()->status}}" class="avatar_status status {{ Auth::user()->status}}">&nbsp;</div>
                                        <ul class="dropdown-menu menu" role="menu">
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">My Profile</a></li>
                                            <li class="divider" ></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">My Threads</a></li>
                                            <li class="divider" ></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Messages</a></li>
                                            <li class="divider" ></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Settings</a></li>
                                            <li class="divider" ></li>
                                            <li role="presentation"><strong style="margin-left:15px;font-size:13px">SET STATUS</strong></li>
                                            <li class="divider" ></li>
                                            <li role="presentation"><a role="menuitem" data="green" class="status_set" tabindex="-1" href="javascript:void(0)"><div class="statusdropdown green">&nbsp;</div> Online</a></li>
                                            <li class="divider" ></li>
                                            <li role="presentation"><a role="menuitem" data="yellow" class="status_set" tabindex="-1" href="#"><div class="statusdropdown yellow">&nbsp;</div>Away</a></li>
                                            <li class="divider" ></li>
                                            <li role="presentation"><a role="menuitem" data="red" class="status_set" tabindex="-1" href="#"><div class="red statusdropdown">&nbsp;</div>Busy</a></li>
                                            <li class="divider" ></li>
                                            <li role="presentation"><a role="menuitem" data="silver" class="status_set" tabindex="-1" href="#"><div class="silver statusdropdown">&nbsp;</div>Oflline</a></li>
                                            <li class="divider" ></li>
                                            <li role="presentation">
                                                <a role="menuitem"  tabindex="-1" href="{{ url('/logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                     <span style="color:#ADADAD;margin-right: 10px " class="glyphicon glyphicon-off"></span>Logout
                                                </a>
                                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                            
                                        </ul>
                                    @endif
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')


            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1 col-xs-3 col-sm-2 logo "><a href="#"><img src="images/logo.jpg" alt=""  /></a></div>
                        <div class="col-lg-8 col-xs-9 col-sm-5 ">Copyrights 2014, websitename.com</div>
                        <div class="col-lg-3 col-xs-12 col-sm-5 sociconcent">
                            <ul class="socialicons">
                                <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-cloud"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
<!--         Modal 
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                 Modal content
                <div class="modal-content">
                    <div class="modal-body" style="overflow: hidden">
                        <div class="col-lg-6 col-md-6">
                            <form action="{{ url('/login')}}" class="form newtopic" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <input type="text" placeholder="Email or Username" class="form-control" name="username" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <input type="password" placeholder="Password" class="form-control" id="pass" name="password" />
                                    </div>
                                </div>
                                <div class="pull-right" style="margin-bottom:20px"><button type="submit" class="btn btn-primary">Login</button></div>
                            </form>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="accsection networks">
                                <div class="topwrap">
                                    <div class="posttext pull-left" style="width:100%">

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <button class="btn btn-fb" style="padding:14px">Link Facebook Account</button>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <button class="btn btn-gp" style="padding:14px">Link Google + Account</button>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="clearfix"></div>
                                </div>  
                            </div>

                        </div>
                    </div>


                </div>
            </div>-->

            <!-- get jQuery from the google apis -->
            <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
            <script src="{{asset('js/bootstrap.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/init.js')}}"></script>
    </body>
</html>
