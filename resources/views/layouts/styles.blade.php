{{-- Stylesheets --}}
<link rel="stylesheet" href="{{ asset('vendor/nexus/assets/libs/flatpickr/dist/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/nexus/assets/libs/quill/dist/quill.core.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/nexus/assets/libs/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/nexus/assets/libs/highlight.js/styles/vs2015.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/nexus/assets/libs/fancybox/fancybox.min.css') }}">

{{-- Map --}}
<link href='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' rel='stylesheet' />

{{-- Theme CSS --}}
<link href="{{ mix('/assets/css/' . config('nexus.theme') . '.css', 'vendor/nexus') }}" rel="stylesheet" id="stylesheetLight">

@stack('styles')
