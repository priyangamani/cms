<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Alert;

class UserMiddleware
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
        // dump(Auth::user()->roles()->pluck('name'));
        // exit();

// MANAGER

        if($request->is('manager/dataprofile')){    
            if (!Auth::user()->hasRole('Manager')) {     
                Alert::warning('This User Has No Access', 'WARNING');
                return redirect()->back();
            }else{
                
                return $next($request);
            }
        }

        if($request->is('salesactivity')){    
            if (!Auth::user()->hasRole('Manager')) {     
                Alert::warning('This User Has No Access', 'WARNING');
                return redirect()->back();
            }else{
                
                return $next($request);
            }
        }

        if($request->is('internetpackage ')){    
            if (!Auth::user()->hasRole('Manager')) {     
                Alert::warning('This User Has No Access', 'WARNING');
                return redirect()->back();
            }else{
                
                return $next($request);
            }
        }

        if($request->is('user')){    
            if (!Auth::user()->hasRole('Manager')) {     
                Alert::warning('This User Has No Access', 'WARNING');
                return redirect()->back();
            }else{
                
                return $next($request);
            }
        }

        if($request->is('agent')){
            if (!Auth::user()->hasRole('Manager')) {     
                Alert::warning('This User Has No Access', 'WARNING');
                return redirect()->back();
            }else{
                
                return $next($request);
            }
        }

        if($request->is('admin')){
            if (!Auth::user()->hasRole('Manager')) {     
                Alert::warning('This User Has No Access', 'WARNING');
                return redirect()->back();
            }else{
                
                return $next($request);
            }
        }

        if($request->is('runner')){    
            if (!Auth::user()->hasRole('Manager')) {     
                Alert::warning('This User Has No Access', 'WARNING');
                return redirect()->back();
            }else{
                
                return $next($request);
            }
        }

        if($request->is('supervisor')){    
            if (!Auth::user()->hasRole('Manager')) {     
                Alert::warning('This User Has No Access', 'WARNING');
                return redirect()->back();
            }else{
                
                return $next($request);
            }
        }

        if($request->is('status')){    
            if (!Auth::user()->hasRole('Manager')) {     
                Alert::warning('This User Has No Access', 'WARNING');
                return redirect()->back();
            }else{
                
                return $next($request);
            }
        }

        if($request->is('state')){    
            if (!Auth::user()->hasRole('Manager')) {     
                Alert::warning('This User Has No Access', 'WARNING');
                return redirect()->back();
            }else{
                
                return $next($request);
            }
        }

        if($request->is('branch')){    
            if (!Auth::user()->hasRole('Manager')) {     
                Alert::warning('This User Has No Access', 'WARNING');
                return redirect()->back();
            }else{
                
                return $next($request);
            }
        }

        if($request->is('roles')){    
            if (!Auth::user()->hasRole('Manager')) {     
                Alert::warning('This User Has No Access', 'WARNING');
                return redirect()->back();
            }else{
                
                return $next($request);
            }
        }

        if($request->is('roles')){    
            if (!Auth::user()->hasRole('Manager')) {     
                Alert::warning('This User Has No Access', 'WARNING');
                return redirect()->back();
            }else{
                
                return $next($request);
            }
        }

// AGENT 

        // if($request->is('agent/{user_id}/dashboard')){    
        //     if (!Auth::user()->hasRole('Agent')) {     
        //         Alert::warning('WARNING', 'This User Has No Access');
        //         return redirect()->back();
        //     }else{
                
        //         return $next($request);
        //     }
        // }


// ADMIN 

        // if($request->is('admin/{user_id}/dashboard')){    
        //     if (!Auth::user()->hasRole('Admin')) {     
        //         Alert::warning('WARNING', 'This User Has No Access');
        //         return redirect()->back();
        //     }else{
                
        //         return $next($request);
        //     }
        // }

// RUNNER      

        // if($request->is('runner/{user_id}/dashboard')){    
        //     if (!Auth::user()->hasRole('Runner')) {     
        //         Alert::warning('WARNING', 'This User Has No Access');
        //         return redirect()->back();
        //     }else{
                
        //         return $next($request);
        //     }
        // }

        return $next($request);
    }
}
