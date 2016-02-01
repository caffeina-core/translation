<?php

/**
 * Language
 *
 * Localization tools.
 *
 * @package core
 * @author stefano.azzolini@caffeinalab.com
 * @version 0.1 * @copyright Caffeina srl - 2015 - http://caffeina.it
 */

 class Language extends Dictionary {
    use Module;
    protected static $current_lang = 'en';

    public static function translate($text,$params=null){
      $result = static::get(static::$current_lang.'.'.strtolower($text),$text);
      return $params ? Text::render($result) : $result;
    }

    public static function using($lang){
      static::$current_lang = strtolower(trim($lang));
    }

    public static function load($lang, $dictfile){
      ob_start(); $lang = include($dictfile); ob_end_clean();
      static::merge([$lang => $dictfile]);
    }
}
