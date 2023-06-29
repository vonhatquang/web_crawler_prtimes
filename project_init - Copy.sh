cd "/var/www/html/web_crawler"
composer install
composer dump-autoload
cp .env.example .env
php artisan key:generate
cp /var/www/html/web_crawler/app/PythonBatch/chromedriver /usr/bin/chromedriver
sudo chown root:root /usr/bin/chromedriver
sudo chmod +x /usr/bin/chromedriver

sudo apt update && sudo apt upgrade
sudo apt install wget build-essential libncursesw5-dev libssl-dev libsqlite3-dev tk-dev libgdbm-dev libc6-dev libbz2-dev libffi-dev zlib1g-dev
sudo add-apt-repository ppa:deadsnakes/ppa
sudo apt install python3.11
sudo add-apt-repository ppa:deadsnakes/ppa
sudo apt update
apt list | grep python3.11
sudo apt install python3.11
sudo add-apt-repository ppa:deadsnakes/ppa
apt-get update
apt list | grep python3.11
sudo apt-get install python3.11
sudo update-alternatives --install /usr/bin/python3 python3 /usr/bin/python3.8 1
sudo update-alternatives --install /usr/bin/python3 python3 /usr/bin/python3.11 2
sudo update-alternatives --config python3
sudo apt update
wget https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb
sudo apt install wget
sudo dpkg -i google-chrome-stable_current_amd64.deb
sudo apt-get install -f
sudo apt install python-is-python3
python --version
apt-get install python3-pip
cd /usr/lib/python3/dist-packages
cp apt_pkg.cpython-38-x86_64-linux-gnu.so apt_pkg.so
sudo apt update && sudo apt upgrade
sudo apt update
sudo apt install python3-distutils
sudo apt install python3-apt
sudo apt install python3.10-distutils
sudo apt install python3.11-distutils

sudo apt-get install --reinstall python3-distutils
sudo apt-get install --reinstall python3.10-distutils
sudo apt-get install --reinstall python3.11-distutils

pip install selenium 
pip install webdriver_manager
pip install openpyxl