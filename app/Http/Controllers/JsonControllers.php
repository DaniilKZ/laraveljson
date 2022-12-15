<?php

namespace App\Http\Controllers;

use App\Http\Json\Litres;
use App\Http\Json\Meloman;
use App\Http\Services\JsonService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class JsonControllers extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function index(JsonService $jsonService): null|string
    {
        $resultMelomanJson = null;
        $resultLitresJson = null;

        $meloman  = new Meloman();
        $json = $meloman->getJson(['data']);

        if (!is_null($json)){
            $resultMelomanJson = $meloman->formatedJson($json, 'name', 'description', 'createdAt', null);
        }

        $litres  = new Litres();
        $json = $litres->getJson();

        if (!is_null($json)){
            $resultLitresJson = $litres->formatedJson($json, 'title', 'desc', null, 'author');
        }

        return  json_encode($jsonService->compareJson([$resultLitresJson, $resultMelomanJson]), JSON_FORCE_OBJECT);
    }
}
