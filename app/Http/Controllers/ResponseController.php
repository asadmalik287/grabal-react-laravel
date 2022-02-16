<?php

namespace App\Http\Controllers;

class ResponseController extends Controller
{
    public function sendResponse($status, $message, $result)
    {
        $response = [
            'status' => $status,
            'message' => $message,
            'result' => $result,
        ];
        return response()->json($response, 200);
    }

    public function sendError($status, $error, $debug = null)
    {
        $response = [
            'status' => $status,
            'message' => $error,
            // 'debug' => $debug
        ];

        return response()->json($response);
    }
}
