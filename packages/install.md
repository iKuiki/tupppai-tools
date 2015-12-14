1. 安装部署redis
    从官网下载：http://redis.io/download

    wget http://download.redis.io/releases/redis-3.0.5.tar.gz
    tar xzf redis-3.0.5.tar.gz
    cd redis-3.0.5
    make

2. 安装部署beanstalkd

    官网：http://kr.github.io/beanstalkd/download.html
    sudo apt-get install beanstalkd
    cd beanstalkd-1.10
    make
    ln -s /var/www/ps/tools/packages/beanstalkd-1.10/beanstalkd /usr/bin/beanstalkd

3. 安装 setuptools for python
    从官网下载：https://pypi.python.org/pypi/setuptools#downloads

    wget https://pypi.python.org/packages/source/s/setuptools/setuptools-18.8.1.tar.gz
    tar xzf setuptools-18.8.1.tar.gz
    cd setuptools-18.8.1
    sudo python setup.py install

4. 安装 supervisor
    从github上下载：https://github.com/Supervisor/supervisor/releases

    tar xzf supervisor-3.2.0.tar.gz
    cd supervisor-3.2.0
    sudo python setup.py install
