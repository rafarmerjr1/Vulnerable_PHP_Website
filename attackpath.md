**Attack Path**

- Stored XSS via comments to obtain user cookie
- Authenticate with user cookie
- Navigate to products page
- SQLi products page via union select for webadmin password
- authenticate as webadmin
- uploads page is now available
- use XML to obtain DB path and credentials
- access phpmyadmin DB
- use union select INTO OUTFILE to insert php script as cmd.php
- use cmd.php for RCE
- RCE for Reverse Shell?
