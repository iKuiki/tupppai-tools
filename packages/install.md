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
    ln -s /data/tools/packages/beanstalkd-1.10/beanstalkd /usr/bin/beanstalkd

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

5. 部署android打包环境
    tar -zxvf android-sdk-linux.tgz
    mv andrid-sdk-linux /var/local/android-sdk
    然后设置路径
    export ANDROID_HOME=/var/local/android-sdk
    export PATH=$ANDROID_HOME/tools:$ANDROID_HOME/platform-tools:$PATH

    sudo apt-get install libncurses5:i386 libstdc++6:i386 zlib1g:i386
    sudo apt-get install ia32-libs
    sudo apt-get install openjdk-7-jdk

