@setup
    $date       = date("YmdHis");
    $keyPwd     = 'psgod1234';
    $keyAlias   = 'psgod';
    $keystore   = '~/.gradle/keystore';
    $webPath    = '~/www/ps';
    $androidPath= '~/www/tupppai-android';
@endsetup

@servers([ 'web-dev' => 'jq@www.loiter.us', 'apk-dev' => '127.0.0.1', 'apk-production' => '127.0.0.1', 'web-production1' => 'root@www.tupppai.com', 'web-production2' => 'ubuntu@www.tupppai.com'])

@task('web-deploy', ['on' => 'web-dev', 'confirm' => false])
    cd {{$webPath}}
    git checkout develop
    git pull origin develop
    php artisan migrate
    php artisan db:seed
    cp -r public/src/dist/* public/
@endtask

@task('web-publish', ['on' => 'web-production1', 'confirm' => true])
    cd /var/www/ps 
    cp -r /var/www/ps /var/www/ps_{{$date}}
    git checkout master
    git pull origin master
    php artisan migrate
    cp -r public/src/dist/* public/
@endtask

@task('android-release', ['on' => 'apk-production', 'confirm' => true])
    cd {{$androidPath}}
    git pull origin master
    ./gradlew assembleRelease -Pandroid.injected.signing.store.file={{$keystore}} -Pandroid.injected.signing.store.password={{$keyPwd}} -Pandroid.injected.signing.key.alias={{$keyAlias}} -Pandroid.injected.signing.key.password={{$keyPwd}}
@endtask

@task('android-package', ['on' => 'apk-dev', 'confirm' => false])
    curl http://admin.loiter.us/push/fetchApk > /tmp/apk.exist
    cat /tmp/apk.exist | while read line
    do
        echo "$line"
        if [ "$line" = 1 ]; then
            echo 'remove all history apks'
            rm -rf {{$androidPath}}/appStartActivity/build/outputs/apk/*
            echo begin build apk
            cd {{$androidPath}} 
            git checkout release
            git pull origin release
            ./gradlew assembleUmengRelease -Pandroid.injected.signing.store.file=/Users/junqiang/.gradle/keystore -Pandroid.injected.signing.store.password=psgod1234 -Pandroid.injected.signing.key.alias=psgod -Pandroid.injected.signing.key.password=psgod1234
            scp {{$androidPath}}/appStartActivity/build/outputs/apk/tupppai.apk jq@loiter.us:{{$webPath}}/public/mobile/apk/tupai.apk
            curl http://admin.loiter.us/push/mailApk
        else
            echo done
        fi
    done
@endtask
