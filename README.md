## Synopsis

My  simple web application and sms gateway in Codeigniter 3.

Demo : <a href="https://codeigniter3sms-redzjovi.c9users.io">https://codeigniter3sms-redzjovi.c9users.io</a>

## Installation

1. In application/config/, rename config.example.php to config.php, and set base_url
1. In application/config/, rename database.example.php to database.php, and set username, password, database
3. In application/database/, import codeigniter3sms.sql into your database
4. In application/config/email.php, set smtp_user, smtp_password of your gmail. Don't forget to set Allow <a href="https://myaccount.google.com/lesssecureapps">less secure apps</a>: OFF
5. To run reminder go to url reminder, ie. http://localhost/codeigniter3sms/reminder
