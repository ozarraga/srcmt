<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

/**
 * Description of Scdgcclass
 *
 * @author Oswaldo Z�rraga
 */
class Srcmt {
    //put your code here
    //put your code here
    static public function slugify($text) {

// replace non letter or digits by -
        $text = preg_replace('#[^\\pL\d]+#u', '-', $text);
// trim
        $text = trim($text, '-');
// transliterate
        if (function_exists('iconv')) {
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        }
// lowercase
        $text = strtolower($text);
// remove unwanted characters
        $text = preg_replace('#[^-\w]+#', '', $text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }
}
