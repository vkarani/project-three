@extends('_master')

@section('title')
    Victor Karani Project three
@stop

@section('head')
   <!--   <link rel='stylesheet' href='/css/hello-world.css' type='text/css'> -->
@stop

@section('content')
  <h1>Developer's Best Friend</h1>
  <h2>Lorem Ipsum Generator</h2>
  Lorem ipsum is a filler text commonly used to demonstrate the graphic elements of a document or visual presentation.<br> 
  Replacing meaningful content that could be distracting with placeholder text 
  may allow viewers to focus on graphic aspects such as font, typography, and page layout.       
  <br><br>         
  <a href='/lorem-ipsum'>Make some Lorem Ipsum Text...</a>
    
  <br><br>
    
  <h2>Random User Generator</h2>
  Occasionaly, Developers need random users. Click on the link below to create some.
  <br><br>
  <a href='/user-generator'>Create some Random Users...</a> 
  <br><br>   
@stop

@section('footer')
  <footer>
  Victor Karani Project 3
  </footer>
@stop

