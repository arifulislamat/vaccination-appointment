if [ ! -f "vendor/autoload.php" ]; then
    echo "Installing composer."
    composer install --no-progress --no-interaction
    echo "Composer installed."
else
    composer du
fi

if [ ! -f ".env" ]; then
    echo "Creating env file for env $APP_ENV"
    cp .env.example .env
fi

sleep 5s

php artisan cache:clear
php artisan migrate
php artisan db:seed

exec "$@"
