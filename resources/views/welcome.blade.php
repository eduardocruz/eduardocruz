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
                    <h2>Blog</h2>
                    <p>
                        <a href="http://blog.eduardocruz.com">http://blog.EduardoCruz.com</a>
                    </p>
                </div>
            </li>
            <li class="steps__item">
                <div class="body">
                    <h2>Projetos</h2>
                    <p>
                        Conheça alguns projetos.
                    </p>
                    <ul>
                        <li><a href="https://github.com/eduardocruz">https://github.com/eduardocruz</a></li>
                        <li><a href="https://github.com/ReusoFafire2014">https://github.com/ReusoFafire2014</a></li>
                        <li><a href="https://github.com/PoliticaColaborativa">https://github.com/PoliticaColaborativa</a></li>
                        <li><a href="https://github.com/MySkills">https://github.com/MySkills</a></li>
                        <li><a href="https://github.com/246Apps">https://github.com/246Apps</a></li>
                        <li><a href="https://github.com/RiSE">https://github.com/RiSE</a></li>
                    </ul>
                </div>
            </li>
            <li class="steps__item">
                <div class="body">
                    <h2>Currículo</h2>
                    <p>
                        <a href="http://resume.eduardocruz.com">http://resume.EduardoCruz.com</a>
                    </p>
                </div>
            </li>
        </ol>
    </div>
</div>
@stop
