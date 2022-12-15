<?php

namespace App\Http\Json;

interface JsonInterface
{
    public function getJson(array $keys);

    public function formatedJson(
        mixed $json,
        string $title,
        string $description = null,
        mixed  $createdAt = null,
        string $author = null
    );
}
