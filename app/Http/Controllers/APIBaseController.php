<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIBaseController extends Controller
{
    public function sendResponse($msg, $data = '', $code = 200)
    {
        $res = [
            'success'   => true,
            'msg'       => $msg
        ];

        if ($data)
            $res['data'] = $data;

        return response()->json($res, $code);
    }

    public function sendError($msg, $data = '', $code = 400)
    {
        $res = [
            'success'   => false,
            'msg'       => $msg
        ];

        if ($data)
            $res['data'] = $data;

        return response()->json($res, $code);
    }
}
