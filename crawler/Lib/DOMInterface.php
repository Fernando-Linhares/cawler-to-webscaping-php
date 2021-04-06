<?php
namespace crawler\Lib;

interface DOMInterface
{
    public function middle(string $selector): iterable;
    public function location(string $page): void;
}