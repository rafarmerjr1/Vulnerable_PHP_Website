**Attack Path**

- Stored XSS via comments to obtain user cookie
- Authenticate with user cookie
- upload a shell via .php.jgp
- Navigate to products page
- SQLi products page via union select for webadmin password
OR
- PHP type juggling to reset webadmin password
THEN
- authenticate as webadmin
- admin page is now available
- change shell from jpg to php
- use uploaded shell for RCE
- Get reverse shell?
