部署文档：

- 安装nginx

          sudo apt-get install nginx

- 安装php-fpm

sudo apt-get install php5-fpm
sudo apt-get install php5-gd  # Popular image manipulation library; used extensively by Wordpress and it's plugins.
sudo apt-get install php5-cli   # Makes the php5 command available to the terminal for php5 scripting
sudo apt-get install php5-curl    # Allows curl (file downloading tool) to be called from PHP5
sudo apt-get install php5-mcrypt   # Provides encryption algorithms to PHP scripts
sudo apt-get install php5-mysql   # Allows PHP5 scripts to talk to a MySQL Database
sudo apt-get install php5-readline  # Allows PHP5 scripts to use the readline function

sudo apt-get install php5-fpm php5-gd php5-cli php5-curl php5-mcrypt php5-mysql php5-readline

- 打开关闭php-fpm进程

sudo service php5-fpm stop
sudo service php5-fpm start
sudo service php5-fpm restart
sudo service php5-fpm status

- 修改php监听


          vim /etc/php5/fpm/pool.d/www.conf
          把
listen = /var/run/php5-fpm.sock  改为
listen = 127.0.0.1:9000

- 获取nginx配置

          git@github.com:whenjonny/tupppai-tools.git
          ln -s /data/tools/confs/nginx.conf /etc/nginx/
          ln -s /data/tools/confs/sites-enabled/* /etc/nginx/sites-enabled/

- 重启服务

          service nginx restart
          service php5-fpm restart
