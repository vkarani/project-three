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
  <a href='/lorem-ipsum'  class="button">Make some Lorem Ipsum Text... </a>
    
  <br><br>
    
  <h2>Random User Generator</h2>
  Occasionaly, Developers need random users. Click on the button below to create some.
  <br><br>
  <a href='/user-generator'   class="button">Create some Random Users...</a> 
  <br><br>   
  
  <h2>XKCD style password generator</h2>
  Developers can also get access to a configurable XKCD style password generator
  <br><br>
  <a href='/xkcd' class="button">Create XKCD style passwords...</a> 
  <br><br>
  
@stop


