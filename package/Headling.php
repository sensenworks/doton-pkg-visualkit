<?php

namespace VisualKit;


class Headling{


    static public function H1( string | null $text = null){

        return self::make( $text, 1 );
        
    }


    static public function H2( string | null $text = null){

        return self::make( $text, 2 );
        
    }


    static public function H3( string | null $text = null){

        return self::make( $text, 3 );
        
    }


    static public function H4( string | null $text = null){

        return self::make( $text, 4 );
        
    }


    static public function H5( string | null $text = null){

        return self::make( $text, 5 );
        
    }


    static public function make( string | null $text = null, int $size = 1){

        return '<div class="ui-headling h' . $size . '">' . ( $text ?: '') . '</div>';
        
    }
    


    
}