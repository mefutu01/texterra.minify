<?php
namespace PHPTDD\lib;
use PHPTDD\BaseTestCase;
use Texterra\Minify\MinifyService;

class MinifyServiceTest extends BaseTestCase {

    /**
     * This code will run before each test executes
     * @return void
     */
    protected function setUp(): void {

    }

    /**
     * This code will run after each test executes
     * @return void
     */
    protected function tearDown(): void {

    }

    public function minifyServiceHandlerDataProvider(){


        return [
            "Title Spaces"=>["<title> Document Asd            </title>","<title>Document Asd</title>"],
            "Remove comments"=>["<!--  asdasd <script></script> </script>--> asd","asd"],
            "Html, JS, Css " =>["<!DOCTYPE html>
            <html lang=\"en\">
            <head>
                <meta charset=\"UTF-8\">
                <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                <title>Document</title>
            
                <style>
                    body { 
                        background-color:  '#00f';
            
                    }
                </style>
            
            
            </head>
            <body>
                
                <style>
                    body { 
                                                                        background-color:  '#00f';
            
                    }
                </style>
                <script>
    
    
    
    
    
    
    
                    document.addEventListener('DOMContentLoaded', ()=>{
                        alert('asd   asd');
                    })
            
                </script>
            
            </body>
            </html>","<!DOCTYPE html><html lang=\"en\"><head><meta charset=\"UTF-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title>Document</title><style>body{background-color:'#00f'}</style></head><body><style>body{background-color:'#00f'}</style><script>document.addEventListener('DOMContentLoaded',()=>{alert('asd   asd')})</script></body></html>" ],

        ];
    }

    /**
     * @dataProvider minifyServiceHandlerDataProvider
     * @covers Texterra\Minify\MinifyService::handler
     **/
    public function testMinifyServiceHandler($html, $minified) {
         
        //act 
        MinifyService::handle($html);
         

        $this->assertSame($minified,$html);
    }
}
