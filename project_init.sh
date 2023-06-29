#Install PHP
sudo apt install php libapache2-mod-php php-mbstring php-cli php-bcmath php-json php-xml php-zip php-pdo php-common php-tokenizer php-mysql
php -v
#Install Curl
sudo apt install curl
#Install Composer
sudo apt update
sudo apt install php-cli unzip
cd ~
curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
HASH=`curl -sS https://composer.github.io/installer.sig`
php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
sudo php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer
composer
#Install Apache
sudo apt update
sudo apt install apache2
sudo ufw app list
sudo ufw allow 'Apache'
sudo ufw status
sudo systemctl status apache2
#Install Selenium For Python
sudo apt install python-is-python3
sudo apt update
sudo apt install python3-pip
pip3 --version
sudo pip3 install selenium
sudo pip3 install webdriver_manager
sudo pip3 install openpyxl
#Install Google Chrome for Ubuntu
sudo apt update
wget https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb
sudo apt install wget
sudo dpkg -i google-chrome-stable_current_amd64.deb
sudo apt-get install -f
#Instal Chrome Driver for Ubuntu
cp /var/www/html/web_crawler/app/PythonBatch/chromedriver /usr/bin/chromedriver
sudo chown root:root /usr/bin/chromedriver
sudo chmod +x /usr/bin/chromedriver
#Install Laravel for project
cd "/var/www/html/web_crawler"
composer update
composer install
composer dump-autoload
cp .env.example .env
php artisan key:generate