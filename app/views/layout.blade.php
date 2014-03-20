<!DOCTYPE html>
<html ng-app>
<head>
    <title>Waldo Demo Application</title>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.12/angular.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/js/standalone/selectize.min.js"></script>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/css/selectize.bootstrap3.css">
    <style>
        body {
            padding-top: 70px;
        }
    </style>
</head>
<body ng-controller="MainCtrl">
    <div class="container">
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">PHP Demo Application</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::to('categories') }}">List</a></li>
                            @if(Auth::check())
                            	<li><a href="{{ URL::to('categories/create') }}">New</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Customers<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::to('customers') }}">List</a></li>
                            @if(Auth::check())
                            	<li><a href="{{ URL::to('customers/create') }}">New</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Employees<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::to('employees') }}">List</a></li>
                            @if(Auth::check())
                            	<li><a href="{{ URL::to('employees/create') }}">New</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Offices<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::to('offices') }}">List</a></li>
                            @if(Auth::check())
                            	<li><a href="{{ URL::to('offices/create') }}">New</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Orders<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::to('orders') }}">List</a></li>
                            @if(Auth::check())
                            	<li><a href="{{ URL::to('orders/create') }}">New</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Payments<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::to('payments') }}">List</a></li>
                            @if(Auth::check())
                            	<li><a href="{{ URL::to('payments/create') }}">New</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::to('products') }}">List</a></li>
                            @if(Auth::check())
                            	<li><a href="{{ URL::to('products/create') }}">New</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @if(Auth::check())
                                {{ Auth::user()->name }}<b class="caret"></b>
                            @else
                                User<b class="caret"></b>
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            @if(Auth::check())
                                <li><a href="{{ route('auth_dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('auth_logout') }}">Logout</a></li>
                            @else
                                <li><a href="" data-toggle="modal" data-target="#loginModal">Login</li>
                                <li><a href="" data-toggle="modal" data-target="#registerModal">Register</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
                
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{ Form::open(array('route' => 'auth_login')) }}

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="loginModalLabel">Login</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="loginEmail">Email</label>
                            <input type="text" class="form-control" id="loginEmail" name="email" placeholder="Enter email" required="required">
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Password</label>
                            <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Enter password" required="required">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{ Form::open(array('route' => 'auth_new')) }}

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="registerModalLabel">New User</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="userName">Name</label>
                            <input type="text" class="form-control" id="userName" name="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="userEmail">Email</label>
                            <input type="email" class="form-control" id="userEmail" name="email" placeholder="Enter email" required="required">
                        </div>
                        <div class="form-group">
                            <label for="userPassword">Password</label>
                            <input type="password" class="form-control" id="userPassword" name="password" placeholder="Enter password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Register">
                    </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
    
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    @yield('content')
    </div>
</body>
</html>
