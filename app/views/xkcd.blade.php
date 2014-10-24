@extends('_master')

@section('head')
<link rel='stylesheet' href='/css/p3_xkcd.css' type='text/css'>
@stop

@section('title')
    XKCD for laravel
@stop

@section('content')
<a href='/' class="button">Home</a>
<br><br>
    
<h2>XKCD Password Generator</h2>
  <p class="password"> 
  {{-- Display the password--}}
  @if(!is_null($word_list))
    @for($i = 0; $i < $number_of_words; $i++)
      {{$word_list[array_rand($word_list)]}}
      @if($i < ($number_of_words -1))
        -
      @endif
    @endfor
  @endif
  </p>
  <br><br>
  
  {{--Display the Selection Form --}}
  {{ Form::open(array(
    'url' => '/xkcd',
    'method' => 'GET'
  )) }}
    {{ Form::label('number_of_words', '# of Words') }}
    {{ Form::text('number_of_words', $number_of_words,['maxlength' => '1'],['value' => '3']) }}
    <br>

    {{ Form::label('add_number', 'Use Numbers')}}
    {{-- Make sticky --}}
    @if($use_number==true)
      {{ Form::checkbox('add_number', '1', true) }}
    @else
      {{ Form::checkbox('add_number', '1', false) }}
    @endif    
    
    <br>
    
    {{ Form::label('add_symbol', 'Use Symbols')}}
    {{-- Make sticky --}}
    @if($use_symbol==true)
      {{ Form::checkbox('add_symbol', '1', true) }}
    @else
      {{ Form::checkbox('add_symbol', '1', false) }}
    @endif
    <br>
    {{ Form::submit('Create another Password') }}
  {{ Form::close() }}<br><br>
  
  <img class="image" src=' {{ URL::asset('images/password_strength.png') }} ' alt='xkcd style passwords'>
  
@stop