@extends('_master')

@section('title')
    XKCD for laravel
@stop

@section('content')
<a href='/'>Home</a>
<br><br>
    
<h2>XKCD Password Generator</h2>
  {{-- Display the password--}}
  @if(!is_null($word_list))
    @for($i = 0; $i < $number_of_words; $i++)
      {{$word_list[array_rand($word_list)]}}
      @if($i < ($number_of_words -1))
        -
      @endif
    @endfor
  @endif
  <br><br>
  
  {{--Display the Selection Form --}}
  {{ Form::open(array(
    'url' => '/xkcd',
    'method' => 'GET'
  )) }}
    {{ Form::label('number of words', '# of Words') }}
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
  
  <img src=' {{ URL::asset('images/password_strength.png') }} ' alt='xkcd style passwords'>
  
@stop