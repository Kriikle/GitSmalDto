<?php

interface BasicInterfaceDto
{
    public function getJson();
    public function getArray();
    public function __toString(); // or to Html
    static function fromJson($json);
}

