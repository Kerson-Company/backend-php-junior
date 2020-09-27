<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Foundation\Http\Exceptions\MaintenanceModeException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  Request  $request
     * @param  \Throwable  $exception
     * @return Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if (config('app.debug')) {
            return parent::render($request, $exception);
        }
        return $this->handleException($request, $exception);
    }

    public function handleException($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Oops. The Resource was not found'
            ], 404);
        }

        if ($exception instanceof MethodNotAllowedHttpException)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Oops. Method Not Allowed'
            ], 405);
        }

        if ($exception instanceof ModelNotFoundException)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Oops. The Resource was not found'
            ], 404);
        }

        if ($exception instanceof MaintenanceModeException) {

            return response()->json(
                [
                    'mode' => 'Schedule Maintenance',
                    'message' => $exception->getMessage(),
                    'retry' => $exception->retryAfter,
                ]
                , 503);
        }

        return parent::render($request, $exception);
    }

    /**
     * @param Request $request
     * @param AuthenticationException $exception
     * @return JsonResponse|Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return response()->json([
            'status' => 'error',
            'message' => 'Unauthenticated'
        ], 401);
    }
}
