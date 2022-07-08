<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Methode pour les responses aux requêtes
     */
    public static function sendResponse($status, $code, $message, $data = null)
    {
        $responseContent = [
            "Status" => $status,
            "Code" => $code,
            "Message" => $message,
            "Data" => $data
        ];

        return response()->json($responseContent);
    }

    /**
     * Génération des id
     */
    public static function generateCustomID($name)
    {
        $name_array = explode(' ', trim($name));
        $initials = "";

        foreach($name_array as $word){
            $initials = $initials . "" . $word[0];
        }

        return strtoupper($initials) . mt_rand(000, 999) . Str::random(5);
    }
}
