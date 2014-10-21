@extends('_master')

@section('content')
    <a href='/'>Home</a>
    <br><br>
    
    <h2>Random User Generator</h2>
    Please select the number of Users that you want and their attributes.<br>
    The default number of users is 2<br>
    2 to 99 Users are allowed<br><br>
    
    {{ Form::open(array(
      'url' => '/user-generator',
      'method' => 'GET'
    )) }}
      {{ Form::label('num_users', '# of Users',
        array('id' => 'num_users')) }}
      {{ Form::text('num_users', $num_users,['maxlength' => '2']) }}
      <br>
      
      {{ Form::label('date_of_birth', 'Date of Birth') }}
      {{--Make sticky--}}
      @if(is_null($date_of_birth))
      {{ Form::checkbox('date_of_birth', '1', false) }}
      @else
      {{ Form::checkbox('date_of_birth', '1', true) }}
      @endif
      <br>
      
      {{ Form::label('city_of_birth', 'City of Birth') }}
      {{--Make sticky--}}
      @if(is_null($city_of_birth))
      {{ Form::checkbox('city_of_birth', '1', false) }}
      @else
      {{ Form::checkbox('city_of_birth', '1', true) }}
      @endif
      <br>
      
      {{ Form::label('address', 'Address') }}
      {{--Make sticky--}}
      @if(is_null($address))
      {{ Form::checkbox('address', '1', false) }}
      @else
      {{ Form::checkbox('address', '1', true) }}
      @endif
      <br>
      {{ Form::submit('Generate!') }}              
    {{ Form::close() }}    
    
    <br><br>       
    
  @for($i=0; $i < $num_users; $i++)
    Name  :
    {{$faker->name}}<br>
    
    @if(!is_null($date_of_birth))
      Date of Birth :
      {{$faker->dateTimeThisCentury->format('Y-m-d')}}<br>
    @endif
    
    @if(!is_null($city_of_birth))
      City of Birth  :
      {{$faker->city}}<br>
    @endif
    
    @if(!is_null($address))
      Current Address :
      {{$faker->address}}<br>
    @endif
    <br>    
  @endfor   
    
@stop