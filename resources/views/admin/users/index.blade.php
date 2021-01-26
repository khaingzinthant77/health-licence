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
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        </div>
    </div>
</div> -->
<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-12">
        <!-- <p style="font-size:20px;padding-left:10px;font-weight: bold;" class="text-left"><b>Users Management</b></p> -->
    </div>
    <div class="col-lg-1 col-md-1 col-sm-12">
      {{-- <a class="btn btn-secondary btn-sm" href="{{ route('home') }}" style="font-size:15px"> Back</a> --}}
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12">
        <a class="btn btn-success btn-sm" href="{{ route('users.create') }}" style="font-size:15px"> Create New User</a>
    </div>
</div>
<br>





<table class="table table-bordered styled-table">
  <thead>
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 </thead>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
      <!--  <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}"><i class="fa fa-fw fa-eye" /></i></a>
       <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-fw fa-edit" /></i></a> -->
        <!-- {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
        {!! Form::close() !!} -->
        <form action="{{route('users.destroy',$user->id)}}" method="POST" onsubmit="return confirm('Do you really want to delete?');">
          @csrf
          @method('DELETE')
          <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}"><i class="fa fa-fw fa-eye" /></i></a>
       <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-fw fa-edit" /></i></a>
           <button type="submit" class="btn btn-sm btn-danger" ><i class="fa fa-fw fa-trash" /></i></button> 
        </form>
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}


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