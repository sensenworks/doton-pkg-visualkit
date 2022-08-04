<?php

namespace VisualKit;

use DOMDocument;
use DOMElement;


class Table{


    // protected array $entries = [];

    // protected array $generated = [];

    protected DOMDocument $root;

    protected DOMElement $table;

    protected DOMElement $headers;

    protected DOMElement $header;

    protected DOMElement $body;



    public function __construct( 
        
        public string $style = 'default' 
        
    ){
        
        $this->root = new DOMDocument('1.0', 'utf-8');

        $this->conatiner = $this->root->createElement('div');

        $this->table = $this->root->createElement('table');

        $this->headers = $this->root->createElement('thead');

        $this->header = $this->root->createElement('tr');
        
        $this->body = $this->root->createElement('tbody');


        $this->headers->appendChild( $this->header );

        $this->table->appendChild( $this->headers );

        $this->table->appendChild( $this->body );

        $this->conatiner->appendChild( $this->table );



        $this->table->setAttribute( 'class', "table-$style" );
        
    }


    public function column( string $label){

        $head = $this->root->createElement('th');

            $head->textContent= ( $label );

        $this->header->appendChild( $head );

        return $head;

    }
    

    public function row( ...$value ){

        $row = $this->root->createElement('tr');

        foreach( $value as $data ){

            $td = $this->root->createElement('td');

                // if( $data ){

                    $this->html( $td, $this->parseValue( $data ) );

                // }

                // else{

                //     $td->textContent= $data;

                // }
    
            $row->appendChild( $td );
    
        }
        
        $this->body->appendChild( $row );

        return $this;
        
    }
    

    public function html(DOMElement $container, string | int | bool $data){

        $fragment = $this->conatiner->ownerDocument->createDocumentFragment();

        $fragment->appendXML( $data ?: "" . print_r($data) . "" );

        $container->appendChild( $fragment );
        
        return $this;
        
    }
    

    public function parseValue( mixed $value ){

        switch( gettype( $value ) ){

            case 'string': 

                if( $value == "1" || $value == "0" ){

                    return '<div class="ui-badge ' . ( $value ? 'badge-success' : 'badge-error') . '">' . 
                        
                        ( $value ? 'YES' : 'NO' ) . '</div>';

                }
                

            break;
                    
            case 'boolean': 
                
                return '<div class="ui-badge ' . ( $value ? 'badge-success' : 'badge-error') . '">' . 
                    
                    ( $value ? 'YES' : 'NO' ) . '</div>';

            break;
        }
        
        return $value;
        
    }
    
    

    public function getEntries(){

        return $this->entries;
        
    }


    public function toString(){

        return  $this->table->ownerDocument->saveHTML( $this->table );
        
    }

    
}

