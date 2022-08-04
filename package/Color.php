<?php

namespace VisualKit;



class Color{

    static public function get( string | null $type = null ){

        switch( $type ){

            case 'log': return '#8200BA';

            case 'info': return '#525252';

            case 'notice': return '#005DBA';

            case 'warning': return '#918D01';

            case 'error': return '#BA002B';

            case 'success': return '#00BA60';

        }

        return '#333';
        
    }
    
}