**To Do**

Attack Path
----------------
1. Stored XSS for low-priv user cookies --done
2. SQLi on orders page for webadmin password --done
3. Password reset page vulnerable to PHP type juggling --done
4. Shell can be uploaded via photos --done
4. Shell executed to get reverse shell via webadmin --done 
	        

DONE --- Set up  authentication portal
DONE -- Write Python Server that can accept POST and GET requests and output the content. http.server may not do POSTs natively
DONE -- practice XSS against comment portal:
DONE -- require authentication to search for product ID
DONE -- add more products
DONE -- Create an "admin only page" for ?
DONE -- Create page for uploads (photo gallery?)
DONE -- PHP type juggling via password reset.
DONE -- Implement improved appearance - Bootstrap or HTML/CSS template

PHP app:
XSS -done
SQLi -done
XXE -?
PHP type juggling --done
File upload bypass --done
RCE/shell -done

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
