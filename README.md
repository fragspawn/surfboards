# surfboards

Matt's Surboards is a shopping cart example using an MVC technique with PHP that
uses index.php as the controller. No other physical pages exist that need to be
exposed to the user space. Secure all sub-folders from client requests except
images and css

To install:
1. unzip/clone surboards into your webroot folder on a http server running PHP 5 or
above
2. restore sql/surfboards.sql to a mysql server version 5 or above 
3. ensure database name is 'surfboards'
4. edit the lib/library.php line 9 with the username and password needed to access
the mysql server
5. The server will need write permission to the images folder ensure this is granted
6. visit the root folder of this project with your web browser to test functionality 


ADMIN:
admin Username: admin
admin Password: password

EXAMPLE USER:
user Username: asdfasdf
User Password: asdfasdf
