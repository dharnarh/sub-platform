# Installation Setup

1. Clone the repository
2. Run `composer install` to install the dependencies.
3. Copy `.env.example` to `.env` and configure your database credentials.
4. Run `php artisan key:generate`
5. Run `php artisan migrate:fresh --seed`
6. Run `php artisan serve`

# Documentation
https://documenter.getpostman.com/view/20378214/UVyuTFwq

# Email Subscribers Artisan Command
This is a command to send "post-created" emails to subscribers => `php artisan email:subscribers`

## Queue
Post notification to subscribers are queued, Run `php artisan queue:listen` to see queued events live
