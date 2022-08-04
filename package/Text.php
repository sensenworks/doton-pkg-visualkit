<?php

namespace VisualKit;



Class Text{


    static public function translucent( string | null $text = null ){

        return self::make( $text , 'translucent');
        
    }
    
    static public function make( 

        string | null $text = null, 
        
        string $style = ''
        
    ){

        return '<div class="ui-text ' . (

            $style ? ( "text-" . $style ) : ""
            
        ) . ' " >' . ( $text ?: '') . '</div>';
        
    }



    static public function code( string | null $text = null ){

        return self::makeCode( $text , '');
        
    }
    

    static public function translucentCode( string | null $text = null ){

        return self::makeCode( $text , 'translucent');
        
    }
    
    static public function makeCode( 

        string | null $text = null, 
        
        string $style = ''
        
    ){

        return '<pre class="ui-text ' . (

            $style ? ( "text-" . $style ) : ""
            
        ) . ' " >' . ( $text ?: '') . '</pre>';
        
    }

    
}