<?php

namespace App\Helpers;

class SystemResponse
{
  public static function basicResponse($message, $status = 200)
  {
    return response([
      'timestamp' => now()->format('Y-m-d H:i:s'),
      'status'    => $status,
      'message'   => $message,
    ], $status);
  }

  public static function dataResponse($data, $message = '查詢成功', $status = 200)
  {
    return response([
      'timestamp' => now()->format('Y-m-d H:i:s'),
      'status'    => $status,
      'message'   => $message,
      'data'      => $data,
    ], $status);
  }

  public static function errorResponse($errors, $message = '參數錯誤', $status = 400)
  {
    return response([
      'timestamp' => now()->format('Y-m-d H:i:s'),
      'status'    => $status,
      'message'   => $message,
      'errors'    => $errors,
    ], $status);
  }
}
