@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@php
    $colors = ["#ff5e51","#f89f51","#4dd153","#2da0f3","#af74f7","#17b6e6","#6094c1","#ee335d"];
    $tcolors = ["#ff6347","#6a5acd","#1c90ff","#af74f7","#17b6e6",];
@endphp

@section('content')
    <div class="content">
    	 <h5>Clinic by Townships</h5>
    	  <div class="row">
            @foreach ($townships as $i=>$township)
                <div class="col-md-3">
                    <div class="card text-white" style="background-color: {!! $colors[$i] !!}">
                        <a href="{{  url('history?tsh_id='.$township->id) }}" class="text-white">
                        <div class="card-body">
                            <h4 align="center">{{ $township->tsh_name_en }}</h4>
                            <br/>
                            <div class="row">
                                <div class="col-md-6">Clinic</div>
                                <div class="col-md-6" style="text-align: right">{{ $township->clinics->count() }}</div>
                            </div>
                            <br>
                        </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <br>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
