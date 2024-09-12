<?php

namespace App\Utils;

use Illuminate\Support\Facades\DB;

class GenerateID {

    public static function generateId($prefix) {

        $table = $prefix === 'DC' ? 'doctor' :
            ($prefix === 'PT' ? 'patient' :
            ($prefix === 'PR' ? 'prescription' :
            ($prefix === 'MD' ? 'drug' :
            ($prefix === 'PY' ? 'payment' :
            ($prefix === 'AP' ? 'appointment' : 'unknown')))));

        $maxId = DB::table($table)->max('id');

        if ($maxId) {
            $updated_value = (int)substr($maxId, strlen($prefix)) + 1;
            $new_id = $prefix . str_pad($updated_value, 3, '0', STR_PAD_LEFT);
        } else {
            $new_id = $prefix . '001';
        }

        return $new_id;
    }
}
