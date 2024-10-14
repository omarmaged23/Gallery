<x-mail::message>
# From User ({{$name}})
<sm>{{$email}}</sm> <br>

Problem {{$message}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
