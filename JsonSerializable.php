<?php

namespace App\Http\JsonBuilder;

trait JsonSerializable
{
    private $jsonResponse;

    public function jsonBuilder()
    {
        $this->jsonResponse = new JsonBuilder($this->attributes);
        return $this->jsonResponse;
    }
}
