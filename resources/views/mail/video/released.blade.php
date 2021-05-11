@component('mail::message')
# Aula disponível

Uma nova aula está disponível para você.

**Titulo:** {{$video->title}}

**Descrição:** {!! $video->description !!}

@component('mail::button', ['url' => url('/videos/'.$video->id)])
Assistir agora
@endcomponent

**Lembrete**: *Você está dando atenção ao seu futuro profissional?*

[]s,<br>

Eduardo Cruz<br/>
{{ config('app.name') }}
@endcomponent
