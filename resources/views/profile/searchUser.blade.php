@extends('layouts.master')
@section('title', 'Proyecto final')
@section('content')
<h1>usuarios</h1>
@foreach ($users as $user)
	<h1>user id: {{$user->email}}</h1>  
	<H1>nombre: {{$user->name}}</H1>  
@endforeach
@endsection