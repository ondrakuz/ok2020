@extends('admin.base')

@section('title', env('APP_NAME').' - '. __('Administrator'))
@section('description', env('APP_NAME').' - '. __('Administrator').' - '. __('Home page'))

@section('content')
    <h4>{{  __('Welcome in administrator of site').' '.env('APP_NAME') }}</h4>
@endsection
