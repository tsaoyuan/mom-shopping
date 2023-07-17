<?php

namespace App\Helpers;

class BasicResponse{
  public $timestamp;
  public $status;
  public $message;
  public $data;
  public $errors;
  
  public function __construct($timestamp = null, $status = null, $message = null, $data = null, $errors = null)
  {
    $this->timestamp = $timestamp;
    $this->status = $status;
    $this->message = $message;
    $this->data = $data;
    $this->errors = $errors;
  }

  public function getBasic(){

    return [
          'timestamp' => $this->timestamp,
          'status' => $this->status,
          'message' => $this->message,
      ];
  }


  public function getErrors()
  {
    return [
      'timestamp' => $this->timestamp,
      'status' => $this->status,
      'message' => $this->message,
      'errors' => $this->errors,
    ]; 
  }
}