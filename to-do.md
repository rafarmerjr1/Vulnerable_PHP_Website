**To Do**

Attack Path
----------------
1. Stored XSS for low-priv user cookies --done
2. SQLi on orders page for webadmin password --done
3. - Password reset page vulnerable to PHP type juggling --done
4. Shell can be uploaded and executed to get reverse shell via admin SQL rights
	something like:
        ‘ union select 1,’‘ INTO OUTFILE ‘/var/www/dvwa/cmd.php’ #
	https://resources.infosecinstitute.com/topic/anatomy-of-an-attack-gaining-reverse-shell-from-sql-injection/
	vulnerable_webapp/cmd.php?e=whoami        

DONE --- Set up  authentication portal
				- cookies can be stolen via XSS
DONE -- Write Python Server that can accept POST and GET requests and output the content. http.server may not do POSTs natively
DONE -- practice XSS against comment portal:
DONE -- require authentication to search for product ID
DONE -- add more products
DONE -- Create an "admin only page" for ?
DONE -- Create page for uploads (photo gallery?)
- Explore XXE
	XXE can be done by setting up an XML parser on the admin page
	create a form that takes several areas of user input
	and stores it as XML.  May need to disable security features that are built-in.
	There could be a users_schema file listing usertable format in the webroot folder that can be grabbed
	https://depthsecurity.com/blog/exploitation-xml-external-entity-xxe-injection
DONE -- PHP type juggling via password reset.
DONE -- Implement improved appearance - Bootstrap or HTML/CSS template

PHP app:
XSS -done
SQLi -done
XXE
PHP type juggling --done

Node.js app:
CSRF/SSRF
DOM-based XSS
JSON injection
Java Deserialization

OSWE Vulns:

    Cross-Origin Resource Sharing (CORS) with CSRF and RCE
    JavaScript Prototype Pollution
    Advanced Server Side Request Forgery
    Persistent cross-site scripting
    Session hijacking
    .NET deserialization
    Remote code execution
    Blind SQL injections
    Data exfiltration
    Bypassing file upload restrictions and file extension filters
    PHP type juggling with loose comparisons
    PostgreSQL Extension and User Defined Functions
    Bypassing REGEX restrictions
    Magic hashes
    Bypassing character restrictions
    UDF reverse shells
    PostgreSQL large objects
    DOM-based cross site scripting (black box)
    Server side template injection
    Weak random token generation
    XML external entity injection
    RCE via database functions
    OS command injection via WebSockets (black box)
