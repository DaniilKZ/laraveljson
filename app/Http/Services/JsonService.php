<?php

namespace App\Http\Services;

class JsonService
{
    function compareJson(array $json): array|null
    {
        $resultJson = [];

        foreach ($json as $item) {
            foreach ($item as $value) {
                $resultJson[] = $value;
            }
        }

        return $resultJson;
    }
}
