<?php
/**
 * Email authentication module. Allows you to login with your email address
 * instead of username.
 *
 * @package modules
 * @copyright (C) 2002-2006 The Digital Development Foundation
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 *
 * @subpackage Xarigami Authemail Module
 * @copyright (C) 2008-2011 2skies.com
 * @link http://xarigami.com/project/xarigami_authemail
*/
$modversion['name'] = 'authemail';
$modversion['id'] = '10513';
$modversion['version'] = '1.0.0';
$modversion['displayname'] = 'Authemail';
$modversion['description'] = 'Xarigami email authentication module';
$modversion['credits'] = '';
$modversion['help'] = '';
$modversion['changelog'] = '';
$modversion['license'] = 'GPL';
$modversion['official'] = 1;
$modversion['author'] = 'Roger Keays, Jo Dalle Nogare';
$modversion['contact'] = 'icedlava@2skies.com';
$modversion['homepage']     = 'http://xarigami.com/project/xarigami_authemail';
$modversion['admin'] = 1;
$modversion['user'] = 0;
$modversion['class'] = 'Authentication';
$modversion['category'] = 'Security';
if (false) { //Load and translate once
    xarML('Authemail');
    xarML('Xarigami email authentication module');
}
?>