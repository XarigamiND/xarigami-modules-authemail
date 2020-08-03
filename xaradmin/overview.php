<?php
/**
 * Displays standard Overview page
 *
 * @package modules
 * @copyright (C) 2002-2006 The Digital Development Foundation
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 *
 * @subpackage Xarigami Authemail Module
 * @copyright (C) 2008-2010 2skies.com
 * @link http://xarigami.com/project/xarigami_authemail
*/
/**
 * Overview function that displays the standard Overview page
 *
 * @author jojodee
 * @return array xarTplModule with $data containing template data
 */
function authemail_admin_overview()
{

    /* provide some information for users and ensure the module is in the module listing 
     *  as a cue for admins so they can see what is installed
     */
     $data=array();
    return xarTplModule('authemail', 'admin', 'main', $data,'main');
}

?>