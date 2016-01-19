@include('config.php');

@servers([ 'web-dev' => 'jq@loiter.us', 'apk-dev' => '127.0.0.1', 'apk-production' => '127.0.0.1', 'web-production1' => 'root@www.tupppai.com', 'web-production2' => 'ubuntu@www.tupppai.com'])

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
