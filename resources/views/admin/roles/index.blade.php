@extends('adminlte::page')
@section('content_header')
    <script src=" {{ asset('toasterjquery.js') }}" ></script>
    <link rel="stylesheet" type="text/css" href="{{asset('toasterbootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('toastermin.css')}}">
    <script type="text/javascript" src="{{asset('toastermin.js')}}"></script>
@stop
@section('content')
<!-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <p>Role Management</p>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
            @endcan
        </div>
    </div>
</div> -->
<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-12">
        <p style="font-size:18px;padding-left:10px" class="text-left"><b>Role Management</b></p>
    </div>
    <div class="col-lg-1 col-md-1 col-sm-12">
      {{-- <a class="btn btn-secondary btn-sm" href="{{ route('home') }}" style="font-size:15px"> Back</a> --}}
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12">
        <a class="btn btn-success btn-sm" href="{{ route('roles.create') }}" style="font-size:15px"> Create New Role</a>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
            @endcan
            @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{!! $roles->render() !!}

@endsection
@section('js')
<script type="text/javascript">
  @if(Session::has('success'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.success("{{ session('success') }}");
        @endif
        
        @if(Session::has('error'))
          toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
          }
                toastr.error("{{ session('error') }}");
          @endif
</script>
@stop