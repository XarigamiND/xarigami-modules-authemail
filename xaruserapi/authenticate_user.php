<?php
/**
 * Authenticate a user against the Xaraya database, using their email address
 * and password.
 *
 * @package modules
 * @copyright (C) 2002-2006 The Digital Development Foundation
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 *
 * @subpackage Xarigami Authemail Module
 * @copyright (C) 2008-2010 2skies.com
 * @link http://xarigami.com/project/xarigami_authemail
 */

 /*
 * @public
 * @param args['uname'] email address of user
 * @param args['pass'] password of user
 * @returns int
 * @return uid on successful authentication,  null for bad status, XARUSER_AUTH_FAILED otherwise
 */
function authemail_userapi_authenticate_user($args)
{
    extract($args);
    if (!isset($uname) || !isset($pass) || $pass == "") {
        throw new BadParameterException(array('uname (email address)','admin','authenticate_user','authsystem'), xarML('Invalid #(1) for #(2) function #(3)() in module #(4)'));
        return XARUSER_AUTH_FAILED;
    }

    $email = $uname;
    // Get user information from roles
    $userRole = xarModAPIFunc('roles', 'user', 'get', array('email' => $email));
    if (!is_array($userRole))  return  XARUSER_AUTH_FAILED;
    
    $uid =  $userRole['uid'];
    $realpass = $userRole['pass'];
    $state = $userRole['state'];
    $uname = $userRole['uname'];
    //we return XARUSER_AUTH_FAILED if user is not available or we checked the password and  pass is wrong
    // we return $uid = NULL if state is not active so the correct error messages is sent from original login
    switch($state) {

        case ROLES_STATE_DELETED:
            // User is deleted by all means.  Return a message that says the same.
            $tpl = xarTplModule('authsystem','user','errors',array('errortype' => 'account_deleted'));
            return 'account_deleted';

        case ROLES_STATE_INACTIVE:
            // User is inactive.  Return message stating.
            $tpl = xarTplModule('authsystem','user','errors',array('errortype' => 'account_inactive'));
            return 'account_inactive';

        case ROLES_STATE_NOTVALIDATED:
            //User still must validate
            xarResponseRedirect(xarModURL('roles', 'user', 'getvalidation'));
            return null;

        case ROLES_STATE_PENDING:
            // User is pending activation
             $tpl = xarTplModule('authsystem','user','errors',array('errortype' => 'account_pending'));
            return 'account_pending';
         case ROLES_STATE_ACTIVE:
         default:
            // Confirm that passwords match
            if (!xarUserComparePasswords($pass, $realpass, $uname, 
                substr($realpass, 0, 2))) {

                return XARUSER_AUTH_FAILED;
            }
         break;
    }

    //ok we are fine, active state, return the $uid
    return (int)$uid;
}
?>