<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;

class ResponseResource extends JsonResource
{
    protected $statusCode;
    protected $message;
    protected $success;

    public function __construct($resource = '', $message = 'Success', $success = true, $statusCode = 200)
    {
        parent::__construct($resource);
        $this->message = $message;
        $this->success = $success;
        $this->statusCode = $statusCode;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $response = [
            'status' => $this->statusCode,
            'success' => $this->success,
            'message' => $this->message,
        ];

        if ($this->resource !== '') {
            $response['data'] = $this->resource;
        }

        // Handle pagination metadata if resource is paginated
        if (method_exists($this->resource, 'currentPage')) {
            $response['meta'] = [
                'current_page' => $this->resource->currentPage(),
                'from' => $this->resource->firstItem(),
                'last_page' => $this->resource->lastPage(),
                'path' => $this->resource->path(),
                'per_page' => $this->resource->perPage(),
                'to' => $this->resource->lastItem(),
                'total' => $this->resource->total(),
                'links' => [
                    'first' => $this->resource->url(1),
                    'last' => $this->resource->url($this->resource->lastPage()),
                    'prev' => $this->resource->previousPageUrl(),
                    'next' => $this->resource->nextPageUrl(),
                ]
            ];
        }

        return $response;
    }

    /**
     * Customize the outgoing response for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\JsonResponse  $response
     * @return void
     */
    public function withResponse($request, $response)
    {
        $response->setStatusCode($this->statusCode);
        $response->header('Content-Type', 'application/json');
    }

    public static function success($data = null, $message = 'Success', $statusCode = 200)
    {
        $response = [
            'status' => $statusCode,
            'success' => true,
            'message' => $message,
            'data' => $data
        ];

        // Tambahkan meta pagination jika $data memiliki field pagination
        if (
            is_object($data) &&
            method_exists($data, 'currentPage') &&
            method_exists($data, 'lastPage') &&
            method_exists($data, 'perPage') &&
            method_exists($data, 'total')
        ) {
            $response['meta'] = [
                'current_page' => $data->currentPage(),
                'from' => $data->firstItem(),
                'last_page' => $data->lastPage(),
                'path' => $data->path(),
                'per_page' => $data->perPage(),
                'to' => $data->lastItem(),
                'total' => $data->total(),
                'links' => [
                    'first' => $data->url(1),
                    'last' => $data->url($data->lastPage()),
                    'prev' => $data->previousPageUrl(),
                    'next' => $data->nextPageUrl(),
                ]
            ];
        }

        return response()->json($response, $statusCode);
    }

    public static function invalid($message = 'Data Tidak Valid', $statusCode = 404)
    {
        return response()->json([
            'status' => $statusCode,
            'success' => false,
            'message' => $message
        ], $statusCode);
    }

    public static function error($message, $statusCode = 400, $data = null)
    {
        return (new self($data, $message, false, $statusCode))->response();
    }

}