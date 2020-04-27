@include('nexus::layouts/error', [
    'pretitle' => "Error {$exception->getStatusCode()}",
    'title' => 'Página Expirada',
    'message' => 'El Token de esta página ha expirado o se ha perdido, por favor vuelve atrás y recarga la página.',
])
