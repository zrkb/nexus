@include('nexus::layouts/error', [
    'pretitle' => "Error {$exception->getStatusCode()}",
    'title' => 'Servicio No Disponible',
    'message' => 'El servidor no puede manejar la solicitud porque está sobrecargado o se encuentra inactivo por mantenimiento. Por favor vuelve más tarde.',
])
