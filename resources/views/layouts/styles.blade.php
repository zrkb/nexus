{{-- Stylesheets --}}
<link href="https://unpkg.com/boxicons@2.0.4/css/boxicons.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('vendor/nexus/assets/fonts/feather/feather.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/nexus/assets/libs/flatpickr/dist/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/nexus/assets/libs/quill/dist/quill.core.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/nexus/assets/libs/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/nexus/assets/libs/highlight.js/styles/vs2015.css') }}">

{{-- Map --}}
<link href='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' rel='stylesheet' />

{{-- Theme CSS --}}
<link href="{{ mix('/assets/css/app.css', 'vendor/nexus') }}" rel="stylesheet" id="stylesheetLight">

{{-- Core --}}

@stack('styles')
