@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Whoops!
@else
# Bon dia ha deman un reset de contrassenya!
@endif
@endif

Vostè està rebent aquest correu electrònic perquè hem rebut una sol·licitud de restabliment de contrasenya del seu compte.

{{-- Action Button --}}
@if (isset($actionText))
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endif

Salutacions des de, {{config('app.name')}}


@if (isset($actionText))
@component('mail::subcopy')
Si està tenint problemes per fer clic al boto de"{{ $actionText }}" ,
per favor faci clic al següent enllaç o copi i enganxi'l al navegador:<br>
[{{ $actionUrl }}]({{ $actionUrl }})
@endcomponent
@endif
@endcomponent
