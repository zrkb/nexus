@include('nexus::layouts/error', [
    'pretitle' => "Error {$exception->getStatusCode()}",
    'title' => 'Error Inesperado',
    'message' => 'Estamos experimentando un problema pero ya estamos trabajando para solucionarlo. Por favor vuelve más tarde.',
])
