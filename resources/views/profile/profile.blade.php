@extends('layouts.master')
@section('title', 'Proyecto final')

@section('estilo')
    <style>
        table{
            width: 100%;
        }
        .boton{
            float: left;
            padding: 0px 5px 0px 0px;
        }
        #form_review{
            display: none;
        }
        #separador{
            width: 100%;
            background-color: #1b6d85;
            border-radius: 5px;
            padding: 1px;
        }

    </style>
@endsection

@section('script')
    <script>

        function mostrarForm(){
            var  boton = document.getElementById("btn-review");
            var formulario = document.getElementById("form_review");
            boton.addEventListener("click", MouseClick);
            function MouseClick(e){
                boton.style.display = "none";
                formulario.style.display = "initial";
            }
        }

        function cargarFunciones(){

            mostrarForm();
        }

        window.onload = cargarFunciones;
    </script>
@endsection





@section('content')

    <div class="container">
        <div class="row">

                <div class="jumbotron">
                    <img src="{{ ($user->image == null) ? '/uploads/15707.jpg' : $user->image}}" alt="" id="img_perfil">
                    <h3>Nombre: {{$user->name}}</h3>
                    <h3>Siguiendo: {{$user->idols->count()-1}}</h3>
                    <h3>Seguidores: {{App\Idol::where('idol_id', $user->id)->count()-1}}</h3>
                    <h3>Publicaciones: {{$user->posts->count()}}</h3>

                    @if($user->id != Auth::id())
                        @include('partials.form_seguir')
                    @endif
                </div>
                <div class="form_publicar">
                    {!! Form::open(array('route' => 'posts.store', 'method'=>'post')) !!}
                        {!! Form::hidden('user_id',  Auth::id()) !!}
                        {!! Form::textarea('body',null, ['class'=>'form-control', 'maxlength'=>140, 'rows'=>2]) !!}
                        <button type="submit" class="btn btn-primary" >Postear</button>
                    {!! Form::close() !!}
                </div>
                <div>
                    <table class="table-bordered">
                        <tbody>

                        @foreach($posts as $post)
                                    <tr>
                                        <td colspan="6"  id="separador"></td>
                                    </tr>
                                    <tr>
                                        <img src="{{ ($user->image == null) ? '/uploads/15707.jpg' : $user->image}}" alt="" id="img_perfil">
                                        <td colspan="5">{{$post->user->name}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">{{$post->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">{{$post->body}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1" class="boton">

                                            <button type="button" class="btn btn-info" id="btn-review">
                                                <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>5
                                            </button>
                                            <div id="form_review">
                                                @include('partials.form_comentar')
                                            </div>
                                        </td>
                                        <td colspan="1" class="boton">

                                                @include('partials.form_repostear')

                                        </td>
                                        <td colspan="1" class="boton">
                                            <a class="btn btn-info" href="#" role="button">
                                                <span class="glyphicon glyphicon-hand-right"></span>7
                                            </a>
                                        </td>
                                        <td colspan="1" class="boton">
                                            <a class="btn btn-info" href="#" role="button">
                                                <span class="glyphicon glyphicon-thumbs-down"></span>23
                                            </a>
                                        </td>
                                        <td colspan="2"></td>

                                    </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>

        </div>
    </div>
@endsection


