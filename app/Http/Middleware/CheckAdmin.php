<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use session;

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
        if(Auth::id())
        {
            $checkAdminUser = session::get('admin_user');
            $currRoute = $request->route()->getPrefix();
            if($checkAdminUser)
            {                
                if($currRoute == '/admin')
                {
                  return redirect('dashboard')->with('success', 'Please switch use back to admin button..!!');  
                }
            }
            if(Auth::id() == 1 && $currRoute != '/admin')
            {
                return redirect('/admin');
            }
        }
        return $next($request);
    }
}
