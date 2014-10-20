@extends('index')

@section('lorem')
    Lorem ipsum text
    <?php
    echo implode('<p>', $paragraphs);
    ?>
@stop
