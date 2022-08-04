<?php

namespace VisualKit;


class FileOverview{



    static int $from = 0;

    static int $to = 0;
    
    

    static function read( string $file ) : array{

        $reading = [];

        $reader = fopen( $file, 'r');

        while( $line = fgets( $reader ) ){

            $reading[] = $line;
            
        }

        fclose( $reader );
        
        return $reading;
        
    }
    


    static public function view( 
        
        string $file, 

        callable $callback,
        
        int $median = 0, 
        
        int $ecart = 3
        
    ) : array {

        $output = [];

        $lines = self::read( $file );

        $length = count( $lines );

        $from = $median - $ecart;

            $from = $from <= 0 ? 0 : $from;

        $to = $median + $ecart;

            $to = $to >= $length ? $length : $to;


        for ($x = $from; $x < $to; $x++) { 

            $line = $lines[ $x ];


            if( $x == $median ){

                $output[] = $callback( $x, $line, true ) ?: $line;

            }

            else{

                $output[] = $callback( $x, $line, false ) ?: $line;

            }

        }
        

        self::$from = $from;

        self::$to = $to;

        
        return $output;
        
    }





    static public function line( int $line, $text = ''){

    }
    
    
}