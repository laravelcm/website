<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Inertia\Inertia;
use Modules\Core\Exceptions\GeneralException;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        GeneralException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  Exception $exception
     *
     * @throws Exception
     * @return mixed|void
     */
    public function report(Exception $exception)
    {
        if (app()->environment('production') &&
            (app()->bound('sentry') && $this->shouldReport($exception))
        )
        {
            app('sentry')->captureException($exception);
        }

        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception $exception
     * @return \Illuminate\Http\Response
     * @throws Exception
     */
    public function render($request, Exception $exception)
    {
        $response = parent::render($request, $exception);

        if ($exception instanceof UnauthorizedException) {
            return redirect()
                ->route(home_route())
                ->withFlashDanger(__('auth.general_error'));
        }

        if (
            !(app()->environment('production'))
            && $request->header('X-Inertia')
            && in_array($response->status(), [500, 503, 404, 403])
        ) {
            return Inertia::render('error/Index', ['status' => $response->status()])
                ->toResponse($request)
                ->setStatusCode($response->status());
        }

        return $response;
    }

    /**
     * @param  \Illuminate\Http\Request $request
     * @param  AuthenticationException  $exception
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return $request->expectsJson()
            ? response()->json(['message' => 'Unauthenticated.'], 401)
            : redirect()->guest(route('frontend.auth.login'));
    }
}
