<?php

namespace App\Http\JsonBuilder;


use Illuminate\Http\JsonResponse;

class JsonBuilder
{
    private array $jsonArray;
    public function __construct($attributes)
    {
        $this->jsonArray = $attributes;
    }
    public function getAttributes(): array
    {
        return $this->jsonArray;
    }

    public function without(array $options)
    {
        foreach ($options as $key) {
            unset($this->jsonArray[$key]);
            if(strcmp($key, 'timestamps') == 0) {
                if (array_key_exists('created_at', $this->jsonArray)) {
                    unset($this->jsonArray['created_at']);
                }
                if (array_key_exists('updated_at', $this->jsonArray)) {
                    unset($this->jsonArray['updated_at']);
                }
            }
        }
        return $this;
    }

    public function add(array $element)
    {
        $this->jsonArray = array_merge($this->jsonArray, $element);
        return $this;
    }

    public function build()
    {
        return new JsonResponse($this->jsonArray);
    }

    public function toArray()
    {
        return $this->jsonArray;
    }

    public function only(array $options)
    {
        $filteredArray = [];

        foreach ($options as $key) {
            if (array_key_exists($key, $this->jsonArray)) {
                $filteredArray[$key] = $this->jsonArray[$key];
            }
            if(strcmp($key, 'timestamps') == 0) {
                if (array_key_exists('created_at', $this->jsonArray)) {
                    $filteredArray['created_at'] = $this->jsonArray['created_at'];
                }
                if (array_key_exists('updated_at', $this->jsonArray)) {
                    $filteredArray['updated_at'] = $this->jsonArray['updated_at'];
                }
            }
        }
        $this->jsonArray = $filteredArray;
        return $this;
    }
}
