# advintech-visitors-counter
This is the website visitors counter build on top of browser fingerprint

# Installation
Run the following commands
composer require advintech/visitors-counter
php artisan migrate
php artisan vendor:publish

# configuration
include the following lines into your footer
<script src="{{ asset('vendor/visitors-counter/client.min.js')}}"></script>
<script src="{{ asset('vendor/visitors-counter/visitors.logs.js')}}"></script>

Hint: Make sure you have jquery plugin loaded to your website

