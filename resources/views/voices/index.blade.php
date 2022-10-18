@extends('layouts.app')


@section('content')
<h1>Voices</h1>
    <hr>
    <br>

  <a href="{{ route('voice.create') }}" class="btn btn-primary"> add voice</a>
  <br>
  @livewire('list-voices')
@endsection