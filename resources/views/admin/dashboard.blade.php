@extends('layouts.admin-dashboard')
@section('title')
{{__("Dashboard")}} : {{__("Home")}}
@endsection
@section('sidebar-dashboard')
    active
@endsection

@section('main-content')
    <h1>{{__('Dashboard')}}</h1>
@endsection
