@extends('index')

@section('user-generator')
    <h2>Random User Generator</h2>
    Please select the number of Users that you want.<br>
    The default number is 2<br>
    A maximum of 99 Users is allowed<br><br>
    
    {{ Form::open(array(
      'url' => '/user-generator',
      'method' => 'GET'
    )) }}
      {{ Form::label('num_users', '# of Users',
        array('id' => 'num_users')) }}
      {{ Form::text('num_users', $num_users,['maxlength' => '2']) }}
      {{ Form::submit('Generate!') }}              
    {{ Form::close() }}    
    
    <br><br>       
    
    
   <?php
   for ($i=0; $i < $num_users; $i++) {
     echo $faker->name, "<br>";
   }
   ?> 
    
@stop