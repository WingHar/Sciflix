# Sciflix
A Netflix for Science Based Videos created within a weekend.

The project was created in a weekend for my web development class. It utilizes the LAMP stack (Linux, Apache, MySQL, PHP) for the backend and the frontend was created using HTML5, CSS3, JavaScript, Bootstrap, and jQuery. 

The general idea of the project is for users to create an account and be able to login from the login screen. This login information is then saved within the MySQL database using POST and the form.
Once logged in, users will be faced with an account page and several buttons on the left panel, one of which allows them to upload videos and the other allows users to watch videos. 
The videos are all put into the MySQL database and generated into MP4 files (even if they're .mov, they'll be converted in the backend). 
The login form is secured with encryption and safety precautions which prevent against XSS (cross-site) injection attacks.
The upper right hand of the account page will show your login name as well as a logout button. The login name is taken from the username when registering for the account.

Languages and Tools Used:
Front End: HTML5, CSS3, JavaScript, jQuery, Bootstrap
Backend: PHP, SQL
Database: MySQL
Framework: LAMP
