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
 * @copyright (C) 2008-2010 2skies.com
 * @link http://xarigami.com/project/xarigami_authemail
*/

/**
 * The main administration function
 *
 * @author jojodee
 * @access public
 * @return Specify your return type here
 */
function authemail_admin_main()
{
   xarResponseRedirect(xarModURL('authemail', 'admin', 'overview'));

    /* success so return true */
    return true;
}
?>