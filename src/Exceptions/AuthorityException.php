<?php

namespace Nexus\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;

class AuthorityException extends AuthorizationException
{
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
    	return $this->unauthorized($request);
    }

    private function unauthorized($request)
    {
        if ($request->expectsJson()) {
            return response()->json([
            	'success' => false,
            	'message' => 'Unauthorized call.'
            ], 403);
        }

        return redirect()->route('errors.show', 'unauthorized');
    }
}
