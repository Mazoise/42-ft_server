FLUSH PRIVILEGES;
SET PASSWORD FOR root@'localhost' = PASSWORD('psw');
FLUSH PRIVILEGES;
CREATE DATABASE wordpress DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
GRANT ALL ON wordpress.* TO 'myserver_user'@'localhost' IDENTIFIED BY 'myserver_psw';
FLUSH PRIVILEGES;