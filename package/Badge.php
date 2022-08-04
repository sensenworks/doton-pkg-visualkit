<?php

namespace VisualKit;



class Badge{

    
    static public function log( string | null $text = null ){

        return self::make( $text , 'log');
        
    }

    static public function info( string | null $text = null ){

        return self::make( $text , 'info');
        
    }

    static public function notice( string | null $text = null ){

        return self::make( $text , 'notice');
        
    }

    static public function warning( string | null $text = null ){

        return self::make( $text , 'warning');
        
    }

    static public function error( string | null $text = null ){

        return self::make( $text , 'error');
        
    }

    static public function success( string | null $text = null ){

        return self::make( $text , 'success');
        
    }



    static public function make( string | null $text = null, string $coloring = 'log' ){

        return '<span class="ui-badge badge-' . $coloring . '">' . ( $text ?: '') . '</span>';
        
    }
    
}