# Vulnerable PHP Application

**Dependencies**

- docker
- docker-compose
- git

**Installation**

Clone the repository.  Navigate into the repository folder that is created after cloning, and ensure you are in the same folder as the 'docker-compose.yml' file.

Typically, running `docker-compose up --build` should be enough to start everything up.

In a browser, the "Custom Clothes" webpage should be visible at port 8000 (localhost:8000). PhpMyAdmin is on port 8080. To ensure that the MySQL database has successfully started and connected, navigate to the "Leave A Review" page and confirm that there are already a few comments left behind by other users.  If there are at least two comments, the DB has connected properly.

**Visual Check**

The index.php page should look something like this:
  

**Vulnerablities:**

- SQLi
- XSS
- XXE
- RCE
- PHP Type Juggling
- File Upload Restriction Bypass

MySQL credentials are stored in the docker-compose.yml file and the ./html/db.php file.

This website is vulnerable.  There are other vulnerabilities in the page not listed here or in the Notes/solutions.md file.  Generally though, the listed vulns are the intended path.  Directory busting,LFI, or other scanning tools probably shouldn't be used as they will make this too easy.  
