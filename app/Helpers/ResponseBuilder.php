<?php

/**
 * ------------------------------------------
 * Json Response Helper
 * ------------------------------------------
 *
 * This helper class is used to build json response.
 *
 */

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class ResponseBuilder
{
    /**
     * The request has succeeded.
     *
     * @param mixed $data Response body
     * @param string|null $key parent key (Optional key)
     * @return JsonResponse
     */
    public static function ok(mixed $data, ?string $key = null) : JsonResponse
    {
        return response()->json(self::body($data, $key));
    }

    /**
     * The request has been fulfilled and resulted in a new resource being created.
     *
     * @param  mixed      $data Response body
     * @param  string|null $key  parent key (Optional key)
     * @return JsonResponse
     */
    public static function created(mixed $data, ?string $key = null) : JsonResponse
    {
        return response()->json(self::body($data, $key), 201);
    }

    /**
     * The request has been accepted for processing, but the processing has not been completed.
     *
     * @param  mixed      $data Response body
     * @param  string|null $key  parent key (Optional key)
     * @return JsonResponse
     */
    public static function accepted(mixed $data, ?string $key = null) : JsonResponse
    {
        return response()->json(self::body($data, $key), 202);
    }

    /**
     * The request successfully deleted the resource
     *
     * @return JsonResponse
     */
    public static function noContent() : JsonResponse
    {
        return response()->json(self::body(null), 204);
    }

    /**
     * The request could not be understood by the server due to malformed syntax.
     * The client SHOULD NOT repeat the request without modifications.
     *
     * @param  mixed      $data Response body
     * @param  string|null $key  parent key (Optional key)
     * @return JsonResponse
     */
    public static function badRequest(mixed $data, ?string $key = null) : JsonResponse
    {
        return response()->json(self::body($data, $key), 400);
    }

    /**
     * The request requires user authentication.
     *
     * @param  mixed      $data Response body
     * @param  string|null $key  parent key (Optional key)
     * @return JsonResponse
     */
    public static function unauthorized(mixed $data, ?string $key = null) : JsonResponse
    {
        return response()->json(self::body($data, $key), 401);
    }

    /**
     * The original intention was that this code might be used as part of some form of digital cash or micropayment scheme,
     * but that has not happened, and this code is not usually used.
     *
     * @param  mixed      $data Response body
     * @param  string|null $key  parent key (Optional key)
     * @return JsonResponse
     */
    public static function paymentRequired(mixed $data, ?string $key = null) : JsonResponse
    {
        return response()->json(self::body($data, $key), 402);
    }

    /**
     * The server understood the request, but is refusing to fulfill it.
     * Authorization will not help and the request SHOULD NOT be repeated.
     *
     * @param  mixed      $data Response body
     * @param  string|null $key  parent key (Optional key)
     * @return JsonResponse
     */
    public static function forbidden(mixed $data, ?string $key = null) : JsonResponse
    {
        return response()->json(self::body($data, $key), 403);
    }

    /**
     * The server has not found anything matching the Request-URI.
     * No indication is given of whether the condition is temporary or permanent.
     *
     * @param  mixed      $data Response body
     * @param  string|null $key  parent key (Optional key)
     * @return JsonResponse
     */
    public static function notFound(mixed $data, ?string $key = null) : JsonResponse
    {
        return response()->json(self::body($data, $key), 404);
    }

    /**
     * The server understands the content type of the request entity,
     * and the syntax of the request entity is correct,
     * but was unable to process the contained instructions.
     *
     * @param  mixed      $data Response body
     * @param  string|null $key  parent key (Optional key)
     * @return JsonResponse
     */
    public static function invalid(mixed $data, ?string $key = null) : JsonResponse
    {
        return response()->json(self::body($data, $key), 422);
    }

    /**
     * Optionally add a parent key to the response body
     *
     * @param  mixed      $data Response body
     * @param  string|null $key  parent key (Optional key)
     * @return mixed
     */
    public static function body(mixed $data, ?string $key = null): mixed
    {
        return is_null($key) ? $data : [$key => $data];
    }
}
