@extends('_master')

@section('title')
    Victor Karani Project three
@stop

@section('head')
 <!--   <link rel='stylesheet' href='/css/hello-world.css' type='text/css'> -->
@stop

@section('content')
    <h1>Victor Karani Project three</h1>
    @yield('user-generator')
    @yield('lorem')    
@stop

@section('footer')
  <!--   <script src="/js/hello-world.js"></script> -->  {{-- TODO Do I need this?? --}}
@stop

