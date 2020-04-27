@include('nexus::layouts/error', [
    'pretitle' => "Error {$exception->getStatusCode()}",
    'title' => 'Demasiadas Solicitudes',
    'message' => 'Haz enviado demasiadas solicitudes en un período muy corto de tiempo determinado. Por favor no abuses con las llamadas HTTP a este sitio.',
])
