**To Do**

- Set up secure authentication portal
	- leave a hole for a single user account that CAN bypass via SQLi
	- if username=<username found on comments page> then use vulnerable SQL query
		else use secure SQL query
- require authentication to post comments
DONE -- Write Python Server that can accept POST and GET requests and output the content. http.server may not do POSTs natively
- practice XSS against comment portal:
	- by passing authentication via Python requests
	- by stealing users cookies with XSS
	- Other XSS attack vectors
- require authentication to search for product ID
	add more products
- Write Python script to:
	- take users cookies via a POST request XSS
	- use those cookies to authenticate through to the 'product search' page
	- send post request to do a SQLi
- Create "order" (file) upload location
	- require authentication
- Create page to view your uploads ("view order history"
- Explore XXE

Other ideas
- RCE
- LFI/RFI
- CSRF/SSRF?
- Implement new appearance template, iron out divs/tags and CSS
- figure out how to dockerize
- DOM-based XSS
- JSON Injection
