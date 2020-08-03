<?php
namespace App\Services;

class ApiResponseService{

    /**
     * Success Response
     * @param $code
     * @param $msg
     * @param $data
     */
    public function success($code, $data = [], $msg = 'Completed', $error = [])
    {
        $response = [
            'success' => true,
            'http_status' => $code,
            'http_status_message' => 'success message',
            'data' => $data,
            'msg' => $msg,
            'error' => $error
        ];

        return response()->json($response, $code);
    }

     /**
     * Failed Response Method
     * @param $code
     * @param string $system_error
     * @param string $msg
     * @param array $error
     * @return \Illuminate\Http\JsonResponse
     */
    public function failed($exception, $code, $system_error = 'Error occured', $msg = 'failed', $error = [])
    {


        $response = [
            'success' => false,
            'http_status' => $code,
            'http_status_message' => 'failed message',
            'data' => [],
            'msg' => $msg,
            'error' => $error
        ];

        return response()->json($response, $code);
    }
}
