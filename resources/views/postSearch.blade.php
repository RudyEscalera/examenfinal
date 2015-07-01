@extends('layouts.master')
@section('title', 'Proyecto final')
@section('content')
@foreach ($posts as $post)
	<h1>user id: {{$post->user_id}}</h1>  
	<H1>nombre: {{$post->body}}</H1>  
@endforeach
@endsection