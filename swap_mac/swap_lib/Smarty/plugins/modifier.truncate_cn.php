<?php
function smarty_modifier_truncate_cn($string, $length = 80, $etc = '...'){
    if ($length == 0) return '';
    preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $string, $t_string);
    if (count($t_string[0]) > $length)
        return join('', array_slice($t_string[0], 0, $length)) . $etc;
    return join('', array_slice($t_string[0], 0, $length));
}