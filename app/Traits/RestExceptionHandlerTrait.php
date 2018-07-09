<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;




trait RestExceptionHandlerTrait
{

    /**
     * Creates a new JSON response based on exception type.
     *
     * @param Request $request
     * @param Exception $e
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getJsonResponseForException(Request $request, Exception $e)
    {
      if($e instanceof ModelNotFoundException){
        $responseData = response()->json(
          ['title' => 'Model not found', 'message' => $e->getMessage()],
           $e->getStatusCode()
         );
      }elseif ($e instanceof UnauthorizedHttpException) {
        $responseData = response()->json(
          ['title' => 'Unauthorized request', 'message' => $e->getMessage()],
          $e->getStatusCode()
        );
      }elseif ($e instanceof MethodNotAllowedHttpException ) {
        $responseData = response()->json(
          ['title' => 'Method not allowed', 'message' => 'Method not allowed'],
          $e->getStatusCode()
        );
      }elseif ($e instanceof NotFoundHttpException) {
        $responseData = response()->json(
          ['title' => 'Page not found', 'message' => 'Page not found'],
          $e->getStatusCode()
        );
      }elseif ($e instanceof QueryException) {
        $responseData = response()->json(
          ['title' => 'Error in query', 'message' => $e->getMessage()],
          400
        );
      }elseif ($e instanceof ValidationException) {
        $responseData = response()->json(
          ['title' => 'Validation error', 'message' => $e->getMessage()],
          400
        );
      }else{
        $responseData = response()->json(
          ['title' => 'Generic Error', 'message' => 'Something went wrong'],
          400
        );
      }
        return $responseData;
    }

    /**
     * Returns json response for generic bad request.
     *
     * @param string $message
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function badRequest($message='Bad request', $statusCode=400)
    {
        return $this->jsonResponse(['error' => $message], $statusCode);
    }

    /**
     * Returns json response for Eloquent model not found exception.
     *
     * @param string $message
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function modelNotFound($message='Record not found', $statusCode=404)
    {
        return $this->jsonResponse(['error' => $message], $statusCode);
    }

    /**
     * Returns json response.
     *
     * @param array|null $payload
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function jsonResponse(array $payload=null, $statusCode=404)
    {
        $payload = $payload ?: [];

        return response()->json($payload, $statusCode);
    }

    /**
     * Determines if the given exception is an Eloquent model not found.
     *
     * @param Exception $e
     * @return bool
     */
    protected function isModelNotFoundException(Exception $e)
    {
        return $e instanceof ModelNotFoundException;
    }

}
