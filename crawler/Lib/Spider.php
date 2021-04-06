<?php
namespace crawler\Lib;

class Spider extends BaseSpider implements DOMInterface
{
    public function middle(string $selector): iterable
    {
        list($tag,$rest) = explode(":",$selector);
        return $this->getXPath()->query($this->getElementXML($rest, $tag));
    }

    public function location(string $page): void
    {
        $this->loadAll($page);
    }
}