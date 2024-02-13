<?php

namespace App\Http\JsonBuilder;

trait JsonSerializable
{


    public function jsonBuilder()
    {
        return new JsonBuilder($this->attributes);
    }
}
