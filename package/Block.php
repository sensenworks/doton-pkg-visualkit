<?php

namespace VisualKit;


class Block{


    static public function empty( string | null $text = null ){

        return '<div class="ui-block">' . $text . '</div>';
        
    }


    static public function box( 
        
        string | null $title = null,

        string | null $text = null 

    ){

        return self::make( $title, $text, "" );
        
    }

    static public function lite(
        
        string | null $title = null,

        string | null $text = null 

    ){

        return self::make( $title, $text, "lite" );
        
    }

    static public function high(
        
        string | null $title = null,

        string | null $text = null 

    ){

        return self::make( $title, $text, "high" );
        
    }


    static public function make( 

        string | null $title = null, 

        string | null $text = null, 
        
        string $style = ''
        
    ){

        return '<div class="ui-block ' . (

            $style ? ( "block-" . $style ) : ""
            
        ) . ' " >' . ( $title ? ( '<div class="block-title">' . ( $title ?: '') . '</div>' ) : '' ) . '<div class="block-content">' . ( $text ?: '') . '</div></div>';
        
    }
    

    
}