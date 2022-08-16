@servers(['web' => ['-i id_rsa jur@139.162.189.131']])
 
@task('deploy', ['on' => 'web'])
    cd /home/jur/SecondChanceShop
    php artisan down
    git reset --hard
    git pull origin main
    php composer.phar install
    php composer.phar dump-autoload
    php artisan migrate --force
    php artisan cache:clear
    php artisan view:clear
    php artisan config:clear
    php artisan route:clear
    php artisan up
@endtask

@task('deployBeta', ['on' => 'web'])
    cd /home/jur/betaShop
    php artisan down
    git reset --hard
    git pull origin main
    php composer.phar install
    php composer.phar dump-autoload
    php artisan migrate --force
    php artisan cache:clear
    php artisan view:clear
    php artisan config:clear
    php artisan route:clear
    php artisan up
@endtask