@extends('_master')

@section('content')
  <a href='/'>Home</a>
  <br><br>

  <h2>Lorem Ipsum Text Generator</h2>
  Please select the number of paragraphs of lorem ipsum text that you want.<br>
  The default number is 2<br>
  A maximum of 99 paragraphs is allowed<br><br>
        
  {{ Form::open(array(
    'url' => '/lorem-ipsum',
    'method' => 'GET'
  )) }}
    {{ Form::label('num_paragraphs', '# of Paragraphs',
    array('id' => 'num_paragraphs')) }}
    {{ Form::text('num_paragraphs', $num_paragraphs,['maxlength' => '2']) }}
    {{ Form::submit('Generate!') }}              
  {{ Form::close() }}    
    
  <br><br>    
    
  <?php
  echo implode('<p>', $paragraphs);
  ?>
@stop
