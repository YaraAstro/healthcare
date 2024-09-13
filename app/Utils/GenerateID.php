<?php

namespace App\Utils;

use Illuminate\Support\Facades\DB;

class GenerateID {

    private static $category = [
        'DC' => 'doctor',
        'PT' => 'patient',
        'PR' => 'prescription',
        'MD' => 'drug',
        'PY' => 'payment',
        'AP' => 'appointment'
    ];

    public static function generateId($prefix) {

        if (!array_key_exists($prefix, self::$category)) {
            throw new \InvalidArgumentException("Invalid prefix: {$prefix}");
        }

        $table = self::$category[$prefix] ;

        $maxId = DB::table($table)->max('id');

        if ($maxId !== null) {
            $updated_value = (int)substr($maxId, strlen($prefix)) + 1;
            $new_id = $prefix . str_pad($updated_value, 3, '0', STR_PAD_LEFT);
        } else {
            $new_id = $prefix . str_pad( 1, 3, '0', STR_PAD_LEFT);
        }

        return $new_id;
    }
}