<?php
namespace App\Traits;

trait ExceptionHandler
{
    protected $CODE_BAD_REQUEST = 400;
    protected $CODE_UNAUTHORIZED = 401;
    protected $CODE_NOT_FOUND = 404;
    protected $CODE_SERVICE_UNAVAILABLE = 503;
    protected $CODE_UNPROCESSABLE_ENTITY = 422;
    protected $CODE_SUCCESSFUL = 200;
    protected $CODE_ACCEPTED = 202;

    /**
     * @param bool $status
     * @param string $msg
     * @param number $code
     * @param array $data
     * @return array
     */
    public function response($status = true, $msg = '', $code = 200, $data = [])
    {
        return [
                'status' => $status,
                'msg' => $msg,
                'code' => $code,
                'data' => $data
        ];
    }

    /**
     * RETURN API RESPONSE WITH JSON FORMAT
     * @param bool $status
     * @param string $msg
     * @param number $code
     * @param array $data
     * @param array $header
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseJSON($status = false, $msg, $code = 404, $data = [], $header = [])
    {
        return response()->json([
                'status' => $status,
                'msg' => $msg,
                'data' => $data
        ], $code, $header);
    }
}