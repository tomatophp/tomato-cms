<?php

use TomatoPHP\TomatoCms\Models\Section;

if(!function_exists('section')){
    function section($key, $byPlace = false){
        $section = Section::query();
        if($byPlace){
            if(is_array($key)){
                return $section->whereIn('place', $key)->get();
            }
            else {
                return $section->where('place', $key)->get();
            }
        }
        else {
            if(is_array($key)){
                return $section->whereIn('place', $key)->get();
            }
            else {
                return $section->where('place', $key)->first();
            }
        }
    }
}
