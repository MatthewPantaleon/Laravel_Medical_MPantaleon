<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
use App\Role;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

		//$user = Auth::user();

		if (!$request->user() || !$request->user()->hasRole('admin')) {
			echo '<a href="/"><button>Back to Welcome Page</button></a><br><br>';
            return response('Unauthorised.', 401);
        }
		
        return $next($request);
    }
}
