<?php
namespace crawler\Lib;

use DOMDocument;
use DOMXPath;

abstract class BaseSpider
{
    protected DOMDocument $dom;
    
    protected abstract function middle(string $selector): iterable;
    protected abstract function location(string $page): void;

    protected function getDom(): DOMDocument
    {
        if(empty($this->dom))
            $this->dom = new DOMDocument;

        return $this->dom;
    }

    protected function getXPath(): DOMXPath
    {
        return new DOMXPath($this->getDom());
    }

    protected function getElementXML(string $selector,string $tag): string
    {
        list($id,$content) = explode("=",$selector);
        $selectorxml = ".//".$tag."[@".$id."=\"".$content."\"]";
        return $selectorxml;
    }

    protected function loadAll(string $page): bool
    {
        return $this->getDom()
        ->loadHTML(
            file_get_contents($page)
        );
    }   
}