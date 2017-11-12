@extends('shared.layouts.form')

@php
  $method = isset($restaurant) ? 'PUT' : 'POST';
@endphp

@section('action', $action)

@section('method', $method)

@section('content')

@endsection
