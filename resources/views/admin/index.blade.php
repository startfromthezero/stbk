@extends('admin.layouts.base')

@section('title','�������')

@section('pageHeader','�������')

@section('pageDesc','DashBoard')

@section('content')
    <iframe src="{{ url('/admin/show') }}"></iframe>
@endsection