@include('nexus::layouts/error', [
	'pretitle' => 'Sin Autorización',
	'title' => 'Lo sentimos',
	'message' => 'Usted no está autorizado a realizar esta acción. Por favor consulte con el Administrador.',
	'url' => url()->previous(),
	'buttonTitle' => 'Volver',
])
