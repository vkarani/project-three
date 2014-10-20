@extends('index')

@section('user-generator')
    User generator text <br>
    
   <?php
   for ($i=0; $i < 10; $i++) {
     echo $faker->name, "<br>";
   }
   ?> 
    
@stop