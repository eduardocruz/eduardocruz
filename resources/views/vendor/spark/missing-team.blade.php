@extends('spark::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h1>
                        {{-- __('teams.wheres_your_team') --}}
                        Bem-vindo(a), {{auth()->user()->name}}
                    </h1>
                </div>
                <div class="card-body">
                    <h4>ATENÇÃO</h4>
{{--
                    <a href="https://us02web.zoom.us/j/82689275145" class="text-center">
                        <h3>Zoom Meeting 20/07 20h - https://us02web.zoom.us/j/82689275145</h3>
                    </a>
--}}
                    <p>
                        Você concluiu a sua inscrição mas ainda falta um passo muito importante que é você efetivamente
                        entrar no time de alunos.
                        Para isso, se você é um aluno novo, deverá participar da próxima aula ao vivo no dia 25/05/2020 às 20h00.
                        Os dados de acesso a aula ao vivo estará disponível aqui uma hora antes da aula.
                    </p>
                    <p>
                        Enquanto você não participar da aula ao vivo, você terá acesso apenas a alguns videos gravados.
                        Até lá, assista os vídeos abaixo para ir se situando. Alguns exemplos de por onde começar:
                    <ul>
                        <li><a href="https://www2.eduardocruz.com/videos/2">Aula #001 - Introdução e Parte 1</a> -
                            Nessa aula eu dou as boas vindas a primeira turmas e eles também se apresentam apresentam.
                            Assista caso você queira entender quem são as pessoas que já estão participando.</li>
                        <li><a href="https://www2.eduardocruz.com/videos/28">Aula #004 - Introdução ao Laravel</a> -
                            Caso você esteja começando com o Laravel ou mesmo que já trabalhe quer revisar alguns
                            conceitos básicos, dá uma olhada nessa aula. Ou nunca viu nada do Laravel e quer ter alguma
                            noção essa aula é para você.</li>
                        <li><a href="https://www2.eduardocruz.com/videos/26">Aula #003 - Stripe e Marketplaces</a> -
                            Se você quer conhecer mais sobre um dos gateways de
                            pagamento mais usados por desenvolvedores americanos, comece por essa aula. Se você tem
                            interesse no conceito de Marketplaces é mais um motivo para assistir.</li>

                    </ul>
                    </p>
                    @foreach(\App\User::whereNotNull('stripe_id')->orderBy('created_at', 'desc')->get() as $user)
                        @isset($user->email)
                            <img
                                src="{{$user->photo_url}}"
                                class="img-thumbnail rounded-circle rounded-full w-8 h-8 mr-2 mt-2"
                                width="100"
                            />
                            {{--
                                <span class="text-90">
                            {{ $user->name ?? $user->email ?? __('Nova User') }}
                            </span>
                            --}}
                        @endisset
                    @endforeach
                    <div class="row">
                        @foreach(\App\Models\Video::whereNotNull('video_url')->where('created_at', '<', '2020-04-20 00:00:00')->orderby('created_at', 'desc')->get() as $video)
                            <div class="col-md-6">
                                <div class="card mb-4 shadow-sm">
                                    <img src="{{$video->image_url}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">
                                            {!! $video->summary !!}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a type="button" class="btn btn-sm btn-outline-secondary" href="/videos/{{$video->id}}">Assistir</a>
                                            </div>
                                            <small class="text-muted">{{$video->duration}} mins</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


                <div class="card-body">
                    {{-- __('Your application\'s dashboard.') --}}



                </div>
            </div>
            <div class="intro mt-5">
                {{--
                <div class="intro-img">
                    <img src="{{asset('/img/create-team.svg')}}" class="h-90" alt="{{__('Create Team')}}" />
                </div>
                --}}

                <p class="intro-copy">

                    {{--__('teams.looks_like_you_are_not_part_of_team')--}}
                    Assista ao vídeo abaixo com as instruções iniciais.
                </p>
                {{--
                <div class="intro-btn">
                    <a href="/settings#/{{ Spark::teamsPrefix() }}" class="btn btn-outline-dark">
                        {{}}_('teams.create_team')}}
                    </a>
                </div>
            --}}
                <p class="intro-copy">

                    {{--__('teams.looks_like_you_are_not_part_of_team')--}}
                    Você está a um passo de fazer parte da nossa comunidade
                </p>

            </div>
        </div>
    </div>
</div>
@endsection
