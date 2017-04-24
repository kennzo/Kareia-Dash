<?php

namespace App\Http\Middleware;

use App\Models\Property\Property as PropertyModel;
use Auth;
use Closure;

class Property
{
    /**
     * Handle an incoming request.
     *
     * Redirects back to properties page if trying to access a property not created/owned by user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // todo: Later, add logic to check that property has been shared with user or not.
        // That property will be viewable but not editable

        $propertyId = $request->route()->parameter('id');
        $userId = PropertyModel::find($propertyId)->user_id;

        if($userId != Auth::getUser()->getAuthIdentifier()) {
            return redirect()->route('properties');
        }

        return $next($request);
    }
}
