@include('nexus::layouts/error', [
    'pretitle' => "Error {$exception->getStatusCode()}",
    'title' => 'Acceso prohibido',
    'message' => 'El acceso a esta página no está permitido por el Administrador.',
])
