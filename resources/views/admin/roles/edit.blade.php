@extends('adminlte::page')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <!-- <div class="pull-left">
            <p style="font-size:18px;">Edit Role</p>
        </div> -->
        <div class="pull-right">
            <a class="btn btn-primary btn-sm" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
</div><br>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div> 
    <!-- <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong>
            <br/>
            @foreach($permission as $value)
              
            <div class="col-md-3">
                        <label>
                            {{-- <input type="checkbox" name="permission[]" value="{{$value->id}}" class="name">&nbsp;{{ $value->name }} --}}
                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                            <br/>
                        </label>
                    </div>
            @endforeach
        </div>
    </div> -->
    <div class="row"  style="font-size: 15px;margin-left:50px">
        <div class="col-md-12">
            <div class="form-group row {{$errors->has('image') ? ' has-error' :'' }}">
                <label  class="col-sm-6 control-label">Permission<span class="text-danger">*</span></label>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label>
                            <input type="checkbox" id="checkAll">Check All
                        </label>
                        
                    </div>
                    @foreach($permission as $value)  
                    <div class="col-md-3">
                        <label>
                            {{-- <input type="checkbox" name="permission[]" value="{{$value->id}}" class="name">&nbsp;{{ $value->name }} --}}
                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                            <br/>
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


@endsection
@section('js')
<script>
    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
@endsection
