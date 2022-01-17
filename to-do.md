**To Do**

Attack Path
----------------
1. Stored XSS for low-priv user cookies
2. SQLi on orders page for webadmin password
3. XXE form on Order form for something
4. Admin-only page for unrestricted file uploads
5 Shell can be uploaded and executed to get reverse shell

DONE --- Set up secure authentication portal
	- cookies can be stolen via XSS
DONE -- Write Python Server that can accept POST and GET requests and output the content. http.server may not do POSTs natively
- practice XSS against comment portal:
	- by passing authentication via Python requests
	- by stealing users cookies with XSS
	- Other XSS attack vectors
DONE -- require authentication to search for product ID
- add more products
- Write Python script to:
	- take users cookies via a POST request XSS
	- use those cookies to authenticate through to the 'product search' page
	- send post request to do a SQLi
- Create "order" page XML form entry
	- require authentication
- Create page to view your uploads ("view order history"
- Explore XXE
	XXE can be done by setting up an XML parser on the orders page
	create a form that takes several areas of user input
	and stores it as XML.  May need to disable security features that are built-in.
	There could be a password or users file in the webroot folder that can be grabbed
	https://depthsecurity.com/blog/exploitation-xml-external-entity-xxe-injection	
- PHP type juggling?  Where to place this? Maybe on login page.
- Implement improved appearance - Bootstrap or HTML/CSS template

PHP app:
XSS
SQLi
XXE
PHP type juggling

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

    

