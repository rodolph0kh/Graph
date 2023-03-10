<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Node;
use App\Models\Relationship;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class RequestParameterValidator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $rules = [
            'name' => [
                'required',
                Rule::exists('nodes', 'name'),
            ],
            'relationshipType' => [
                'required',
                Rule::exists('relationships', 'type'),
            ],
        ];

        $validatedData = Validator::make($request->route()->parameters(), $rules)->validate();


        return $next($request);
    }
}
