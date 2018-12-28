<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('active_link_controller'))
{
    function active_link_controller($controller)
    {
        $CI    =& get_instance();
        $class = $CI->router->fetch_class();

        return ($class == $controller) ? 'active' : NULL;
    }
}


if ( ! function_exists('active_link_function'))
{
    function active_link_function($controller)
    {
        $CI    =& get_instance();
        $class = $CI->router->fetch_method();

        return ($class == $controller) ? 'active' : NULL;
    }
}


//--------------------------------------------------------------
if ( ! function_exists('debug'))
{
    function debug($var,$exit=false)
    {     
        echo "</br>";
        echo "<pre>";
        print_r($var);
        echo "<pre>";
        if ($exit) exit();     
        return true;
    }
}


if ( ! function_exists('get_next_key_array'))
{
    
    function get_next_key_array($array,$key){
        $keys = array_keys($array);
        $position = array_search($key, $keys);
        if (isset($keys[$position + 1])) {
            $nextKey = $keys[$position + 1];
        }
        return $nextKey;
    }
}

if ( ! function_exists('mycount'))
{
    function mycount($var)
    {
        $counter = new myCounter;
        return count($counter);
    }
}

class myCounter implements Countable {
    private $count = 0;
    public function count() {
        return ++$this->count;
    }
}