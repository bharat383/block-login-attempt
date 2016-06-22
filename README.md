# Block Failed Login Attempt (Brutforce Method)
After Number Of Failed Login Attempt By User, the class will block the user's IP Address for some Hours.
Developer can set Maximum Failed Login Attempt, Blocked IP Address and Unblock Time setting from the config.php file. 

Currently this class is storing the Blocked IP Address details in the JSON file which can be stored in the Database.

After maximum failed login attempt, user's IP Address will be blocked for the time which has neen set in the config.php file. After the blocked timeout time, if user will try to access the page, his IP Address will be ublocked automatically.


# Developed By : 
Bharat Parmar

# Version : 
1.0

# File Structure :
1) config.php  : Configuration File contains setting about the Class. 
2) class/Login.class.php : Login class file contains Login behind the Failed Login Attempt and Block/Unblock IP Address.
3) blockedip.json : JSON file contains Blocked IP Address and it Unblock Time.
4) example.php : Example script with description.
5) blocked.html : This file is just displaying Blocked IP Address Message.


# Requirements : 
1) PHP Version : 3.0 and above


