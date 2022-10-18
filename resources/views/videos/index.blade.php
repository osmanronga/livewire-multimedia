@extends('layouts.app')


@section('content')
  <h1>Videos</h1>
  <hr>
  <br>

  <a href="{{ route('video.create') }}" class="btn btn-primary"> add video</a>
  <br>
  @livewire('list-videos')
@endsection