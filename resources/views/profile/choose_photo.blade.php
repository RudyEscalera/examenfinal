@extends('layouts.master')
@section('estilo')
    <style>
        body{
            background-image: url('/collage.jpg');
            background-size: cover;
            background-repeat: repeat;

        }
        .container{
            background-color: #122b40;
            opacity: 0.9;
            padding-bottom: 50px;
            padding-top: 40px;
            width: 500px;
            margin: 0 auto;
            border-radius: 12px;
            color: #ffffff;
        }
        h3 {
            color: #ffffff;
            text-align: center;

        }
    </style>
@endsection
@section('content')
    <div class="container">
        <h3>ELIGE UNA FOTO</h3>

        {!! Form::open(array('route'=>'save_photo', 'files'=>true, 'method'=>'post')) !!}
        {!! Form::label('name','Imagen: ') !!} <br/>
        {!! Form::file('image')!!} <br/>
        {!! Form::label('category', 'Paises:') !!}
        {!! Form::select('pais', array(
          'Bolivia' => 'Bolivia',
        'Chile' => 'Chile','Argentina'=>'Argentina')
        ); !!}


        <button type="submit"  class="btn btn-info">Guardar</button>
        {!! Form::close() !!}
    </div>

@endsection

