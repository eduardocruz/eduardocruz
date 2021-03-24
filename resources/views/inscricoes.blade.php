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
                    <h4>Eu trabalho como desenvolvedor Laravel para startups americanas. Se quer aprender a fazer o mesmo, continue lendo.</h4>
                    <p>
                        Meu nome é Eduardo Cruz, desenvolvedor de software a mais de vinte anos. Desde
                        2013 eu trabalho como desenvolvedor de software usando o framework Laravel, remotamente do Brasil para startups americanas.
                    </p>
                    <p>
                        Eu disponibilizei <strong>{{$video_count}} aulas gravadas, que totalizam {{floor($video_minutes/60)}} horas e {{$video_minutes%60}} minutos de conteúdo sobre diversos temas</strong> (Veja a lista no final da página). Nova aulas serão disponibilizadas em breve.
                    </p>
                    <p class="col text-center"><a href="/register" class="btn btn-primary btn-large">Fazer a minha inscrição agora.</a></p>

                    <h4>Estamos esperando você</h4>

                    @foreach(\App\User::orderBy('created_at', 'desc')->get() as $user)
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

                    <h4>O foco</h4>
                    <p>
                        O foco aqui é ter aulas semanais ligadas a desenvolvimento web (com ênfase no framework Laravel)
                        empreendedorismo, marketing digital e tudo que você precisa para: trabalhar com desenvolvimento
                        web apoiando alguém a criar a uma startup baseada em um serviço web (SaaS).  Ou você criando a sua
                        startup. Prospectando clientes no Brasil ou no exterior. Os temas das aulas semanais são diversos. Ferramentas,
                        framework, infra-estrutura ... mas o objetivo é um só. Levar você para o seu próximo patamar profissional.
                    </p>
                    <h4>Importante</h4>
                    <p>Aqui não tem esquema ou truque para ganhar dinheiro rápido. Se esse é o seu objetivo, você veio ao lugar errado.
                    Aqui é para pessoas que querem investir na sua carreira. Evoluir, fazer as coisas do jeito certo e no tempo certo.
                    Eu estou condensando mais de 20 anos de aprendizado nesse curso. O que vai lhe ajudar a economizar tempo
                        e lhe ajudar a ir na direção correta. Mas não existe mágica. Não existe enriquecimento da noite
                        pro dia. O que existe é resultado baseado em trabalho com foco e persistência.

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
                        O processo de incrição é super simples. Os pagamentos são cobrados mensalmente no cartão de crédito.
                        As cobrancas são feitas pelo Stripe (gateway de pagamento).
                        Após você fazer a sua inscrição você terá acesso imeadiato a sequência de vídeos abaixo. E as Segundas-feiras
                        você terá acesso as aulas ao vivo.
                    </p>
                    <p class="col text-center"><a href="/register" class="btn btn-primary btn-large">Fazer a minha inscrição agora.</a></p>

                    <h2  class="mb-4">Algumas aulas que você terá acesso.</h2>
                    <div class="row">

                        @foreach(\App\Models\Video::whereNotNull('video_url')->orderby('created_at', 'desc')->get() as $video)
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
