<?php

namespace App\Http\Json;

class Meloman implements JsonInterface
{

    public function getJson($keys = null)
    {
        $json = '{ "data": [ { "name": "Война и мир", "description": "роман-эпопея Льва Николаевича Толстого, описывающий русское общество в эпоху войн против Наполеона в 1805—1812 годах.", "createdAt": "2022-06-30" }, { "name": "Ревизор", "description": "комедия в пяти действиях, написанная Н. В. Гоголем в 1835 г.", "createdAt": "2022-05-11" }, { "name": "Горе от ума", "description": "комедия в стихах Александра Сергеевича Грибоедова. Она сочетает в себе элементы классицизма и новых для начала XIX века романтизма и реализма.", "createdAt": "2022-07-18" } ] }';

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
