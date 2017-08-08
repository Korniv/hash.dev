<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use App\hash_md5;

class HashController extends BaseController
{
    public function hash($hash_method,$data = false)
    {
        if ($data)
        {
            $class_name  = 'App\hash_'.$hash_method;
            if (in_array($hash_method,hash_algos()))
            {
                return $class_name::getHash($data);
            }
            return $data;
        }
        return null;
    }

    public function unhash($hash_method,$hash)
    {
        if (in_array($hash_method,hash_algos()))
        {
            $class_name  = 'App\hash_'.$hash_method;
            return $class_name::unHash($hash);
        }
        return null;
    }

}