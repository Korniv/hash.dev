<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class hash_md5 extends Model
{
    const HASH_METHOD = 'md5';
    protected $table = 'hash_md5';

    public static function getHash($data)
    {
        $data_row = self::where('data',$data)->first();
        if ($data_row) $hash = $data_row->hash;
        else
        {
            $hash = hash(self::HASH_METHOD,$data);
            self::insert(
                ['data' => $data, 'hash' => $hash]);
        }
        return $hash;
    }
    public static function unHash($hash)
    {
        $data_row = self::where('hash',$hash)->first();
        if ($data_row) $data = $data_row->data;
        else $data = null;
        return $data;
    }
}
