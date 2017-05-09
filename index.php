<?php
/**
 * index.php
 *
 * The NewWorld is new world.
 *
 * @creation  2009-09-27 at Kozhikode in India.
 * @version   1.0
 * @package   core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

//	...
foreach(['Dispatcher','Http','Layout','Router','Template'] as $name){
	include(__DIR__."/{$name}.class.php");
}
