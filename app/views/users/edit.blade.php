@extends('layouts.master')

@section('title')
    <title>{{{ 'Edit ' . ucfirst($user->first_name) . '\'s Profile'}}}</title>
@stop

@section('content')
    <div class="container">
        <div class="rows">
            <h2>{{{ 'Edit ' . ucfirst($user->first_name) . '\'s Profile'}}}</h2>
        {{ Form::model($user, array('action' => array('UsersController@update', $user->id), 'method' => 'PUT')) }}
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Change Username</a></h4>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="current_username">Current Username</label>
                            <input type="text" name="current_username" class="form-control" value="{{{ $user->username }}}" readonly>
                        </div>
                        <div class="form-group">
                            {{ $errors->first('new_username', '<span class="help-block alert alert-danger">:message</span>') }}
                            <label for="new_username">New Username</label>
                            <input type="text" name="new_username" class="form-control">
                        </div>
                    </div>
                </div>
                <h4 class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Change First or Last Name</a></h4>
    
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <div class="form-group">
                        <label for="current_firstname">Current First Name</label>
                            <input type="text" name="current_first_name" class="form-control" value="{{{ $user->first_name }}}" readonly>
                        </div>
                        <div class="form-group">
                            {{ $errors->first('new_first_name', '<span class="help-block alert alert-danger">:message</span>') }}
                            <label for="new_first_name">New First Name</label>
                            <input type="text" name="new_first_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="current_lastname">Current Last Name</label>
                            <input type="text" name="current_last_name" class="form-control" value="{{{ $user->last_name }}}" readonly>
                        </div>
                        <div class="form-group">
                            {{ $errors->first('new_last_name', '<span class="help-block alert alert-danger">:message</span>') }}
                            <label for="new_last_name">New Last Name</label>
                            <input type="text" name="new_last_name" class="form-control">
                        </div>
                    </div>
                </div>
                <h4 class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Change Email</a></h4>
        
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="current_email">Current Email</label>
                            <input type="text" name="current_username" class="form-control" value="{{{ $user->email }}}" readonly>
                        </div>
                        <div class="form-group">
                            {{ $errors->first('new_email', '<span class="help-block alert alert-danger">:message</span>') }}
                            <label for="new_email">New Email</label>
                            <input type="text" name="new_email" class="form-control">
                        </div>
                    </div>
                </div>
                <h4 class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Change Password</a></h4>
        
                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                    <div class="panel-body">
                        <div class="form-group">
                            {{ $errors->first('new_password', '<span class="help-block alert alert-danger">:message</span>') }}
                            <label for="new_password">New Password</label>
                            <input type="password" name="new_password" class="form-control">
                        </div>
                        <div class="form-group">
                            {{ $errors->first('confirm_password', '<span class="help-block alert alert-danger">:message</span>') }}
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;Submit</button>
        <a href="{{{ action('HomeController@showIndex') }}}" class="btn btn-success"><i class="fa fa-undo"></i>&nbsp;Cancel</a>
    {{ Form::close() }}
    </div>
@stop