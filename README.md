# laravel-advintech-visitors-counter
This is the laravel website visitors counter build on top of browser fingerprint

# Installation steps
### 1. run composer require advintech/visitors-counter "1.0.8"

### 2. configure your database in .env file then run "$ php artisan config:clear"

### 3. run "$ php artisan migrate" to migrate visitors_counter table to the db

### 4. run "$ php artisan vender:publish" to publish assets/views files to public vendors

### 5. copy the following to the footer of the page you want to track visits
     @include("vendor.visitors-counter.script-config")

### Routes
     http://localhost:{port}/api/visitorsLog
to get all visit logs, the logs object is as follows
#### {
####      "today": "0",
####      "yesterday": "0",
####      "thisWeek": "2",
####      "thisMonth": "0",
####      "all": "2"
#### }

## Hint: Make sure you have jquery plugin loaded to your website

