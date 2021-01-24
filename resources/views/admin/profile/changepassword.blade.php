@extends('adminlte::page')

@section('title', 'Change Password')

@section('content_header')

    <h1>Change Password</h1>

@stop

@section('content')


   <div class="card-body">
        <form action="{{ route('password.resetPassword') }}" method="POST">
            @csrf

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="row">
                <label for="" class="col-md-2">{{ trans('adminlte::adminlte.password') }}</label>
                <div class="col-md-6">
                    <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                        <input type="password" name="password" class="form-control"
                               placeholder="{{ trans('adminlte::adminlte.password') }}">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                
            </div>

            <div class="row">
                <label class="col-md-2">{{ trans('adminlte::adminlte.retype_password') }}</label>
                <div class="col-md-6">
                    <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <input type="password" name="password_confirmation" class="form-control"
                               placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6" align="center">
                    <button type="submit" class="btn btn-primary btn-flat">
                      {{ trans('adminlte::adminlte.reset_password') }}
                    </button>
                </div>
            </div>
            
                
            
        </form>
  
   </div>

@stop

@section('css')

@stop

@section('js')
<script> 
      @if(Session::has('success'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.success("{{ session('success') }}");
        @endif
    $("document").ready(function(){
        setTimeout(function(){
            $("div.alert").remove();
        }, 3000 ); // 3 secs

    });
@stop