<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class VerifyApiToken extends Middleware
{
    public function handle($request, Closure $next) {
    	$user = User::where('token', $request->token)->first();
    	if (!empty($user)) {
    		$request->merge(['user_id' => $user->id]);
    		return $next($request);
    	} else {
    		return response()->json([
                'status' => 'error',
                'result' => null,
                'messages' => 'Missing Authentication Token'
            ]);
    	}
    }
}
