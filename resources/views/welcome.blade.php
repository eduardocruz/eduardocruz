@extends('layouts.app')

@section('content')
<div id="welcome">
    <div class="jumbotron">
        <div class="container">
            <h1 class="jumbotron__header">EduardoCruz.com</h1>

            <p class="jumbotron__body">
                Bem-vind@ ao meu site pessoal.
            </p>
        </div>
    </div>

    <div class="container">
        <ol class="steps">
            <li class="steps__item">
                <div class="body">
                    <h2>Currículo</h2>
                    <p>
                        Meu currículo.
                    </p>
                </div>
            </li>
            <li class="steps__item">
                <div class="body">
                    <h2>Blog/Notícias</h2>
                    <p>
                        Onde publico
                    </p>
                    <ul>
                        <li><a href="http://laravel.com/docs">Laravel Documentation</a></li>
                        <li><a href="https://laracasts.com">Laravel 5 From Scratch (via Laracasts)</a></li>
                    </ul>
                </div>
            </li>

            <li class="steps__item">
                <div class="body">
                    <h2>Projetos</h2>
                    <p>
                        Conheça alguns projetos.
                    </p>
                </div>
            </li>
        </ol>
    </div>
</div>
@stop
