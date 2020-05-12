{{ form()->open(['url' => $url ?? './', 'method' => $method ?? 'post']) }}
    @method($method ?? 'post')

    {{ $slot }}
{{ form()->close() }}
