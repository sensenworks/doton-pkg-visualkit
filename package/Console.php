<?php

namespace VisualKit;


/**
 * 
 * --------------------------------------
 * |                                    |
 * |    sensenwork/VisualKit Console    |
 * |                                    |
 * --------------------------------------
 * 
 */

use DotonCli\Terminal as CliTerminal;
use DotonCli\Console as CliConsole;
use DotonCli\Terminal;
use Doton\Core\Utilities\PackageAssetsTemplate;
use Doton\Package;

use const Doton\DOTON_NAME;
use const Doton\DOTON_SERIE;
use const Doton\DOTON_VERSION;


class Console{



    const NAME = "Doton VisualKit";

    const VERSION = "0.0.2";

    const SERIE = "divina'sententia";
    



    static public function template( string $name ){

        return dirname( __DIR__ ) . '/templates/doton.visualkit.' . $name . '.htm';
        
    }
    

    static public function notice( string $label, mixed $input, bool $exit = true ) {

        return self::set($label, $input, $exit, 'notice');

    }


    static public function Warning( string $label, mixed $input, bool $exit = true ) {

        return self::set($label, $input, $exit, 'warning');

    }


    static public function Error( string $label, mixed $input, bool $exit = true ) {

        return self::set($label, $input, $exit, 'error');

    }


    static public function Success( string $label, mixed $input, bool $exit = true ) {

        return self::set($label, $input, $exit, 'success');

    }

    static public function log( string $label, mixed $input, bool $exit = true ) {

        return self::set($label, $input, $exit, 'log');

    }

    static public function info( string $label, mixed $input, bool $exit = true ) {

        return self::set($label, $input, $exit, 'info');

    }




    static public function set( 
        
        string $label, 
        
        mixed $input, 
        
        bool $exit = true,

        string | null $type = null,

    ) {

        $isterminal = CliTerminal::Is();

        $powered = ("Powered by " . DOTON_NAME . " " . DOTON_VERSION . " / " . DOTON_SERIE ) . " &bull; " .

            ( self::NAME . " " .  self::VERSION . " / " . self::SERIE ) . " &bull; " . 

            ( 'PHP ' . PHP_VERSION . ", " .  PHP_OS ) . ""

        ;
        
        if( !$isterminal ){


            $color = Color::get( $type ?: '' );

            $assetCSS = [];

                $assetCSS[] = Package::assets(__CLASS__, 'prism.css', true);

            $assetJS = [];

                $assetJS[] = Package::assets(__CLASS__, 'prism.js');


            $template = new PackageAssetsTemplate(
                
                self::template('console'), 
                
                [

                    'LABEL' => $label,

                    'CONTENT' => $input,

                    'POWERED' => $powered,

                    'CONSOLE_COLOR' => $color,

                    'ASSETS_CSS' => array_map(function( $data ){

                        return "<style>" . $data . "</style>";
                        
                    }, $assetCSS),

                    'ASSETS_JS' => array_map(function( $data ){

                        return "<script>" . $data . "</script>";
                        
                    }, $assetJS),
                    
                ] 
            
            );

            echo $template->toString();
        
        }

        if( $isterminal ){

            $type = ucfirst( $type );

            $type = method_exists(CliConsole::class, $type) ? $type : 'Info';
            
            CliConsole::{ $type }( 
            
                $label, 
            
                $input, 
            
                $powered 

            );
            
        }
        
    
        if( $exit === true ){ exit(1); }
        

        return self::class;
        
    }

}

  





