@extends('layouts.app')


@section('content')
  
  @livewire('reset-password',['tokens'=>$tokens->email])

  
@endsection