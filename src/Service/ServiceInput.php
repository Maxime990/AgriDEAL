<?php
namespace App\Service;

class ServiceInput {

    public function inputString($string)
    {
        if (preg_match('/[^a-zA-Z0-9]/', $input)) {
            return false;
        }
        return true;
    }

}