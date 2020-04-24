<?php

namespace myApp\Core;

class View
{
    public static function show(string $path, array $variables = [])
    {
        require 'App/View/' . $path;
    }
}