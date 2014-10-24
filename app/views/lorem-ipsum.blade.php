@extends('_master')

@section('head')
<link rel='stylesheet' href='/css/p3_lorem_ipsum.css' type='text/css'>
@stop

@section('content')
  <a href='/' class="button">Home</a>
  <br><br>

  <h2>Lorem Ipsum Text Generator</h2>
  Please select the number of paragraphs of lorem ipsum text that you want.<br>
  The default number is 2<br>
  1 to 99 paragraphs are allowed<br><br>
        
  {{ Form::open(array(
    'url' => '/lorem-ipsum',
    'method' => 'GET'
  )) }}
    {{ Form::label('num_paragraphs', '# of Paragraphs',
    array('id' => 'paragraphs')) }}
    {{ Form::text('num_paragraphs', $num_paragraphs,['maxlength' => '2']) }}
    {{ Form::submit('Generate!') }}              
  {{ Form::close() }}<br><br>
  
  <div class="lorem">
  {{implode('<p>', $paragraphs)}}
  </div>
  
      
    
@stop
