@extends('spark::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h1>
                        {{-- __('teams.wheres_your_team') --}}
                        Inscrições abertas para a Comunidade Dev Remoto.
                    </h1>
                </div>
                <div class="card-body">
                    <h4>Para você aprender com quem sabe, como trabalhar com desenvolvimento de software, de casa e ganhando em dólar.</h4>
                    <p>
                        Se você chegou nessa página, você já me conhece. Já sabe que meu nome é Eduardo Cruz, que desde
                        2013 eu trabalho como desenvolvedor de software remotamente do Brasil para startups americanas.
                        E que eu comecei a compartilhar o que eu aprendi desde 2012 através de vídeos do Youtube, Facebook
                        Video e Instagram/IGTV.
                    </p>
                    <p>
                        E o mais importante não é sobre mim. Mas que eu tenho ajudado pessoas como você a evoluir profissionalmente.
                        Aprender a trabalhar remotamente, prospectar clientes no Exterior através do Upwork e ganhar em dólar
                        valores acima da média salarial brasileira.
                    </p>
                    <p class="col text-center"><a href="/register" class="btn btn-primary btn-large">Fazer a minha inscrição agora.</a></p>
                    <h4>O foco</h4>
                    <p>
                        O foco aqui é ter aulas semanais ligadas a desenvolvimento web (com ênfase no framework Laravel)
                        empreendedorismo, marketing digital e tudo que você precisa para: trabalhar com desenvolvimento
                        web apoiando alguém a criar a uma startup baseada em um serviço web (SaaS).  Ou você criando a sua
                        startup. Prospectando clientes no Brasil ou no exterior. Os das aulas semanais são diversos. Ferramentas,
                        framwork, infra-estrutura ... mas o objetivo é um só. Levar você para o seu próximo patamar profissional.
                    </p>
                    <h4>Levando você para o seu próximo patamar profissional</h4>
                    <p>
                        Não importa quem você seja ou com o que você trabalhe. Não só eu tenho certeza que você pode
                        evoluir profisionalmente e existe espaço para você otimizar a forma como você trabalhar, como
                        eu sei que daqui a seis meses, um ano, você vai continuar precisando se atualizar. Como eu sei disso?
                        Pois é o que eu venho fazendo nos últimos vinte anos. Me mantendo atualizado dia a dia, mês a mês,
                        ano a ano. O próximo patamar profissional para você pode ser efetivamente começar a trabalhar com
                        programação pois você ainda se sente confortável em trabalhar profissionalmente na área. Ou
                        o seu próximo patamar profissional pode ser se aprofundar na parte de infra-estrutura. Ou mesmo
                        aumentar a sua produtividade. Entender como usar metodologias ágeis na prática ou como prospectar
                        o seu primeiro cliente no exterior. Cada pessoa vai ter um critério diferente do que considera o
                        seu próximo patamar profissional. Mas o importante é que na comunidade estamos todos indo na
                        mesma direção.
                    </p>
                    <h4>Inscrição</h4>
                    <p>
                        O processo de incrição é super simples. Você vai para a página de registro, coloca os seus dados
                        de pagamento e automaticamente faz a sua inscrição. O valor será cobrado mensalmente no seu cartão
                        de crédito. (Infelizmente não existe outra opção de pagamento além de cartão de crédito) Após você
                        fazer a sua inscrição você terá acesso imeadiato a sequência de vídeos abaixo. Eles são uma amostra
                        do que você terá acesso após você "entrar para o time  de alunos".
                    </p>
                    <h4>Entrando para o time de alunos</h4>
                    <p>
                        Entrar para o time de alunos também é um processo simples. Após você se inscrever, basta você
                        participar da próxima aula ao vivo na Segunda-feira as 20h. Todas as aulas ao vivo acontecem as
                        Segundas-feiras as 20h. E porque é necessário que você participe de pelo menos uma aula ao vivo
                        para ter acesso a todos os vídeos gravados? Exatamente para que nos possamos entender quem é você,
                        qual o seu nível de experiência, qual a sua expectativa em relação a comunidade e como você pode
                        contribuir. "Forçar" você a participar de uma aula ao vivo é o que permite nós saibamos quem é você.
                        E você também vai começar a perceber a importância disso após você estar na turma e começar a
                        outras pessoas chegando depois de você e se apresentando também. O que vai ajudar entre outras
                        coisas a melhorar o seu networking.
                    </p>
                    <h4>Faça a sua inscrição agora</h4>
                    <p>
                        Creio que essas informações já são o suficiente para tirar as principais dúvidas e lhe dar uma
                        noção de como será participar da comunidade. Assim que você se inscrever eu vou receber uma
                        notificação e tentarei enviar um email para você em até 24h. Aproveite a oportunidade e faça a
                        sua inscrição agora.

                    </p>
                    <p class="col text-center"><a href="/register" class="btn btn-primary btn-large">Fazer a minha inscrição agora.</a></p>
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
                    <h4>Estamos esperando você</h4>

                    @foreach(\App\User::whereNotNull('stripe_id')->orderBy('created_at', 'desc')->get() as $user)
                        @isset($user->email)
                            <img
                                src="{{$user->photo_url}}"
                                class="img-thumbnail rounded-circle rounded-full w-8 h-8 mr-2 mt-2 mb-2"
                                width="100"
                            />
                            {{--
                                <span class="text-90">
                            {{ $user->name ?? $user->email ?? __('Nova User') }}
                            </span>
                            --}}
                        @endisset
                    @endforeach
                    <h2  class="mb-4">Algumas aulas que você terá acesso.</h2>
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
