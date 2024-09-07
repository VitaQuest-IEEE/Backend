<?php

namespace App\Exceptions\Api\Auth;

class AuthException extends ApiBaseException
{
   public static function userNotFound($errors,$code = null){
        return new self($errors,__("User Data Not Found"),$code ?? 404);
   }

   public static function otpNotGenerated($errors,$code = null){
      return new self($errors,__("Failed Operation"),$code ?? 500);
   }

   public static function userFailedRegistration($errors,$code = null){
      return new self($errors,__("Failed Operation"),$code ?? 500);
   }

   public static function accountStatusDeactive($errors,$code = null){
      return new self($errors,__("Failed Operation"),$code ?? 401);
   }
}
