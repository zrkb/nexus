@include('nexus::layouts/error', [
    'pretitle' => "Error {$exception->getStatusCode()}",
    'title' => 'Esta página no existe.',
    'message' => 'Es posible que hayas escrito mal la dirección o puede que la página se haya movido a otro lugar.',
    'url' => url()->previous(),
])
