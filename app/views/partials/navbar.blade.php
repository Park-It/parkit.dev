<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top navbar-shrink">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar top-bar"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>
            </button>
            <a class="navbar-brand" href="#page-top">Park It</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
            @if(Auth::check())
               {{--  <li>
                    <a href="">{{{ $user->first_name . '\'s Profile' }}}</a>
                </li> --}}
                <li>
                    <a href="{{{ action('HomeController@getLogout') }}}">Logout</a>
                </li>
            @else
                <li>
                    <!-- Small login modal -->
                    <a href="#" data-toggle="modal" data-target="#loginModal">Login</a>
                </li>
                <li>
                    <!-- Small register modal -->
                    <a href="#" data-toggle="modal" data-target="#registerModal">Register</a>
                </li>
            @endif
            </ul>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Login</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(['action' => 'HomeController@postLogin']) }}
                        <div class="form-group">
                            {{ Form::label('email', 'Email')}}
                            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Please enter your email', 'id' => 'email'] )}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('password', 'Password')}}
                            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Please enter your password', 'id' => 'password'] )}}
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Login</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Register</h4>
                </div>
                {{ Form::open(['action' => 'UsersController@store', 'id' => 'register-form']) }}
                {{-- <form id="register-form" method="POST"> --}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input id="register-username" type="text" class="form-control" placeholder="Please enter a username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="register-email" type="text" class="form-control" placeholder="Please enter your email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="register-password" type="password" class="form-control" placeholder="Please enter your password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input id="register-cpassword" type="password" class="form-control" placeholder="Please confirm your password" name="confirm_password">
                        </div>
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input id="register-fname" type="text" class="form-control" placeholder="Please enter your first name" name="first_name">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input id="register-lname" type="text" class="form-control" placeholder="Please enter your last name" name="last_name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                {{ Form::close() }}
                {{-- </form> --}}
            </div>
        </div>
    </div>
</nav>