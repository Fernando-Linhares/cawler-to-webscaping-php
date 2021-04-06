<?php
namespace crawler\Main;

use crawler\Lib\Spider;

/**
 * The entity responsible for get the data on another web applications
 * it's important to say that the purpose of this component
 * is make easy to web scraping and not violation of security on web
 * 
 * the selector must to be describe like
 *     tag:attribute=value
 * 
 * the http url must to be describe like
 *      https://address
**/
class Crawler
{
    /**
     * this method static give a interable 
     * to do a loop foreach and make an scraping
     * with more performering 
     */
    public static function querySelector(string $http, string $selector): iterable
    {
        libxml_use_internal_errors(true);
        $spider = new Spider;
        $spider->location($http);
        $nodelist = $spider->middle($selector);

        foreach($nodelist as $node){
            yield  $node->textContent;
        }
    }
    /**
     * this method static give the first item of selector
     */
    public static function selectOne(string $http, string $selector): string
    {
        $all = self::selectAll($http,$selector);
        return current($all);
    }
    /**
     * this method static give a array with items of selector
     */
    public static function selectAll(string $http, string $selector): array
    {
        $all = [];
        $nodelist = self::querySelector($http,$selector);
        foreach($nodelist as $node){
            $all[] = $node;
        }
        return $all;
    }
}