<?php
/**
 * Utilities for working with classes
 * @author Miguel Pinto
 * @copyright Miguel Pinto <pinto.miguel@lookatitude.com>
 * @version 1.0
 *
 */
class Look_StringUtils {
	const HAS_TO_BE_STRING = 'HAS_TO_BE_STRING';
	
	
	
	/**
	 * takes a string and replace all special characters
	 * with a simple char, so "�" will become "c"
	 * @param string $string
	 * @return string
	 */
	public static function normalize($string)
	{
		try {
			is_string($string);
		} catch (Exception $e) {
			return self::HAS_TO_BE_STRING;
		}
		$s_pattern = '~&([a-z]{1,2})(acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
		return preg_replace($s_pattern, '$1', htmlentities($string, ENT_QUOTES));
	}
	
	/**
	 * Replaces a word with another word in a given text
	 * @param String $word
	 * @param string $replacement
	 * @param string $text
	 * @return string
	 */
	public static function word_replace($word, $replacement, $text) 
	{ 
		try {
			is_string($word);
			is_string($replacement);
			is_string($text);
		} catch (Exception $e) {
			return self::HAS_TO_BE_STRING;
		}
    	return preg_replace('/[a-zA-Z]+/e', '\'\0\' == \'' . $word . '\' ? \'' . $replacement . '\': \'\0\';', $text); 
	} 
	
	/**
	 * Takes a string and makes it camel case.
	 * @param string $string
	 * @return string
	 */
	public static function camelize($string)
	{
		try {
			is_string($string);
		} catch (Exception $e) {
			return self::HAS_TO_BE_STRING;
		}
		$string = 'x'.strtolower(trim($string));

		$string = ucwords(preg_replace('/[\s_]+/', ' ', $string));

		return substr(str_replace(' ', '', $string), 1);
	}
	
	/**
	 * Takes a string and repeats it a number of times
	 * @param string $string
	 * @param integer $num
	 * @return string
	 */
	public static function repeater($string, $num = 1)
	{
		try {
			is_string($string);
		} catch (Exception $e) {
			return self::HAS_TO_BE_STRING;
		}
		return (($num > 0) ? str_repeat($string, $num) : '');
	}
	
	/**
	 * Takes a string and replace spaces with underscore
	 * @param string $string
	 * @return string|mixed
	 */
	public static function underscore($string)
	{
		try {
			is_string($string);
		} catch (Exception $e) {
			return self::HAS_TO_BE_STRING;
		}
		return preg_replace('/[\s]+/', '_', strtolower(trim($string)));
	}
	
	/**
	 * Takes multiple words separated by underscores and 
	 * adds spaces between them. Each word is capitalized.
	 * @param string $string
	 * @return string
	 */
	public static function humanize($string)
	{
		try {
			is_string($string);
		} catch (Exception $e) {
			return self::HAS_TO_BE_STRING;
		}
		return ucwords(preg_replace('/[_]+/', ' ', strtolower(trim($string))));
	}
	
	/**
	 * Cuts a string to a given length and adds ... at the end
	 * @param string $string
	 * @param integer $lenght
	 * @param string $character
	 * @return string
	 */
	public static function Truncate($string, $lenght = 32, $character = "&hellip;") 
	{
		try {
			is_string($string);
		} catch (Exception $e) {
			return self::HAS_TO_BE_STRING;
		}
		if (strlen ( $string ) < $lenght)
			return $string;
		$output = substr ( $string, 0, $lenght - 1 );
		$output .= ' ' . $character;
		return $output;
	}
}