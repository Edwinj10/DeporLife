<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;

class Admin
{
    protected $auth;

    public function __construct(Guard $auth)

    {
        $this->auth=$auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->user()-> tipo !=0) {
            Session::flash('message', ' Uste no tiene privilegios para realizar esta accion, porfavor ponerse en contacto con el administrador edwinjosealtamirano@gmail.com');
            return redirect() -> to('/');
        }
        return $next($request);
    }
}
