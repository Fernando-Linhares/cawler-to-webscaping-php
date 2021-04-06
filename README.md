# Cawler-to-webscaping-php

   The Component responsible for get the data on another web applications
it's important to say that the purpose of this component is make easy to
web scraping and not violation of security on web.
                      
    Dependences:
      php 8
      DOMDocument
      DOMXPath
      
The selector html must to be describe like:
  
            tag:attribute=value
 
The http url must to be describe like:
 
            https://address
            
Use the class like this:

for get the first item:

            Crawler::selectOne(
                      http: "https://address",
                      selector:"tag:attribute=value"
                      );
      
                      
 or for get more itens on array:
      
             Crawler::selectAll(
                      http: "https://address",
                      selector:"tag:attribute=value"
                      );
                      
or for get more itens on iterable:
    
                Crawler::querySelector(
                      http: "https://address",
                      selector:"tag:attribute=value"
                      );

      
