<?php

namespace App\Http\Middleware;

use Closure;
use Hashids\Hashids;

class WebRbac
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (request()->route()->action['as'] == 'contentById') {
            $hash = request()->route('hash');
            $hashids = new Hashids();
            $id = $hashids->decode($hash);
            if (!isset($id[0])) {
                abort(500);
            }
            $model = \App\Post::find($id);
        }
        if (request()->route()->action['as'] == 'view page') {
            $id = request()->route('slug');
            $model = \App\Page::where('slug', '=', $id)->first();
        }

        if (!isset($model) && !isset($id)) {
            if (request()->route()->action['as'] != 'homepage') {
                abort(404);
            }
        } elseif (
            isset($model) &&
            (request()->route()->action['as'] == 'view page' or
                request()->route()->action['as'] == 'homepage') &&
            defaultPageExists($id)
        ) {
        } else {
            if (
                method_exists($model, 'schema') &&
                $model->schema() != null &&
                isset($model->schema()->permissions) &&
                isset($model->schema()->permissions->read)
            ) {
                $rules = json_decode(
                    json_encode($model->schema()->permissions->read),
                    true
                );

                if (
                    isset($rules['requires_auth']) &&
                    $rules['requires_auth'] == true &&
                    \Auth::user() == null
                ) {
                    abort(401);
                }
                if (
                    isset($rules['requires_permission']) &&
                    \Auth::user() == null
                ) {
                    abort(401);
                }
                if (
                    isset($rules['requires_permission']) &&
                    \Auth::user() != null
                ) {
                    foreach ($rules['requires_permission'] as $permission) {
                        try {
                            if (
                                \Auth::user()->hasPermissionTo(
                                    $rules['requires_permission'] !== true
                                )
                            ) {
                                abort(403);
                            }
                        } catch (\Exception $exception) {
                            abort(403);
                        }
                    }
                }
            }
        }
        return $next($request);
    }
}
