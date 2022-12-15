<?php

namespace App\Http\Json;

class Litres implements JsonInterface
{

    public function getJson($keys = null)
    {
        $json = '[ { "title": "Финансит", "desc": "Это книга о человеке, который прежде всего является Финансистом- могучим тигром в мире беззащитных овец и хищных волков.", "author": "Т. Драйзер" }, { "title": "Таинственный остров", "desc": "В ней повествуется о событиях, происходивших на вымышленном острове, куда забросило на воздушном шаре несколько человек, бежавших из Америки в результате Гражданской войны.", "author": "Жюль Верн" }, { "title": "Портрет Дориана Грея", "desc": "Тонкий эстет и романтик становится безжалостным преступником. Попытка сохранить свою необычайную красоту и молодость оборачивается провалом. ", "author": "Оскар Уайльд" } ]';

        $json = json_decode($json, true);

        if (!is_null($keys)) {
            foreach ($keys as $key) {
                if (isset($json[$key])) {
                    $json = $json[$key];
                }
            }
        }

        return $json;
    }

    public function formatedJson($json, $title, $description = null, $createdAt = null, $author = null)
    {
        $jsonResult = [];

        foreach ($json as $item) {
            $jsonResult[] = [
                'title' => $item[$title],
                'description' => (!is_null($description)) ? $item[$description] : null,
                'createdAt' => (!is_null($createdAt)) ? $item[$createdAt] : null,
                'author' => (!is_null($author)) ? $item[$author] : null,
            ];
        }

        return $jsonResult;
    }
}
