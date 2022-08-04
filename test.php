<?php

use DotonCli\Terminal;
use Doton\Core\Error\ExceptionConsole;
use Test\Test;


/**
 * 
 * --------------------------------------
 * |                                    |
 * |    Launch Doton AutoLoader         |
 * |                                    |
 * --------------------------------------
 * 
 */

require_once __DIR__ . "/doton/autoload.php";




/**
 * 
 * --------------------------------------
 * |                                    |
 * |    Sandbox                         |
 * |                                    |
 * --------------------------------------
 * 
 */


(new ExceptionConsole('Hello Exception', 0) )->console();
