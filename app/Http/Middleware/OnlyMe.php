<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlyMe
{
    public function handle(Request $request, Closure $next): Response
    {
      if(auth()->check()) { // this to check if the user is logged in or not
           
          if(auth()->user()->email == 'a@a.com') { // check if the logged in user email is equal to = a@a.com'
            
              return $next($request); // if true allow the request to proceed

              }
             // after checking the email if not equal return 403 forbidden
              return response(['message'=> 'Access isnt prober!'], 403); 
         }
         // if the user is not logged in return 401 unauthorized
         return response(['message'=> 'You dont have access!'], 401);
         
    }
}
