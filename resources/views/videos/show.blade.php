@extends('layouts.app')


@section('content')
  
  @livewire('show-videos',['video'=>$video])

  
@endsection