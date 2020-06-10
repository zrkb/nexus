@php
    $config = ['url' => $url ?? './', 'method' => $method ?? 'post', 'id' => $id ?? null];
@endphp

{{ form()->open($config) }}
    @method($method ?? 'post')

    {{ $slot }}
{{ form()->close() }}
