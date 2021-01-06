@php
    $id = $id ?? uniqid();
    $route = $route ?? '/logout';
    $class = $class ?? '';
@endphp

<a class="{{ $class }}" href="{{ $route }}"
    onclick="event.preventDefault(); document.getElementById('logout-form-{{ $id }}').submit();">
    {{ $slot }}
</a>

<form id="logout-form-{{ $id }}" action="{{ $route }}" method="POST" class="d-none">
    @csrf
</form>
