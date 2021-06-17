# Set permissions
chmod 775 /run.sh
chown -R www-data:www-data /var/www/
chmod -R 755 /var/www/

# Generate ssl private key and certificate
openssl req -newkey rsa:4096 -days 365 -nodes -x509 -subj "/C=FR/ST=ILEDEFRANCE/L=Paris/O=42Paris/OU=ccouliba/CN=localhost" -keyout localhost.dev.key -out localhost.dev.crt
mv localhost.dev.crt etc/ssl/certs/
mv localhost.dev.key etc/ssl/private/
chmod 600 etc/ssl/certs/localhost.dev.crt etc/ssl/private/localhost.dev.key

# nginx config
cp -rp /tmp/default /etc/nginx/sites-available/

#Autoindex
if [ "$AUTOINDEX" = "off" ]; then
	sed -i "s/autoindex on/autoindex off/g" /etc/nginx/sites-available/default;
#else
#	sed -i "s/autoindex off/autoindex on/g" /etc/nginx/sites-available/default;
fi

# wordpress installation and setup
wget https://wordpress.org/latest.tar.gz
tar -xvf latest.tar.gz
mv wordpress/ var/www/html/
chown -R www-data:www-data /var/www/html/wordpress
cp -rp ./tmp/wp-config.php /var/www/html/wordpress

# Create DB table for wordpress 
service mysql start

echo "CREATE DATABASE IF NOT EXISTS wordpress;" \
	| mysql -u root --skip-password
echo "CREATE USER IF NOT EXISTS 'ccouliba'@'localhost' IDENTIFIED BY 'ccouliba';" \
	| mysql -u root --skip-password
echo "GRANT ALL PRIVILEGES ON wordpress.* TO 'ccouliba'@'localhost' WITH GRANT OPTION;" \
	| mysql -u root --skip-password

# phpMyAdmin installation and setup
wget https://files.phpmyadmin.net/phpMyAdmin/5.0.2/phpMyAdmin-5.0.2-all-languages.tar.gz
tar -xvf phpMyAdmin-5.0.2-all-languages.tar.gz
mv phpMyAdmin-5.0.2-all-languages phpmyadmin
mv phpmyadmin /var/www/html/
rm phpMyAdmin-5.0.2-all-languages.tar.gz
cp -rp /tmp/config.inc.php /var/www/html/phpmyadmin/

service nginx start
service php7.3-fpm start
#service mysql restart

bash
