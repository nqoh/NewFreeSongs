<?php

namespace App\Utilities;

trait HttpResponse
{
   
    public function successResponse($data=[] ,$message = 'Success', $statusCode = 200)
    {
        return response()->json([
            'status' => 'success',
            'data' => $data,
            'message' => $message
        ], $statusCode);
    }

    public function errorResponse($message = 'Error', $statusCode = 400)
    {
        return response()->json([
            'status' => 'error',
            'error' => $message
        ], $statusCode);
    }
}

?>