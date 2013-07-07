<?php
/**
 * available variables inside the $data array:
 * '{email}'=> user email address,
 * '{username}'=> username,
 * '{activation_code}'=> activation code if available,
 * '{link}'=> short link without get parameters,
 * '{full_link}'=> full link with get parameters,
 * '{website}'=> value of the appName parameter inside your configuration file
 * '{temporary_username}' => boolean: true if the username is temporary and can be changed
 *
 * usage example:
 * $data['{link}']
 */
?>
User with email <?php echo $data['{username}']; ?> wants you to activate his account.</br> 
Please click on this link:<br/>
<a href="http://localhost/kpcms/userGroups/user/index">Approve user</a>
