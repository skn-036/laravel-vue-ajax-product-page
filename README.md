## About This Repository

This repository implements Laravel and Vue.js to show, sort and search products of a ecommerce store with pagination.

## Installation

First download this repository. Navigate to root of the project and then
<pre>
    <code>composer install</code>
    <code>npm install</code>
</pre>

Fill up the database credentials(DB_DATABASE, DB_USERNAME, DB_PASSWORD) according to your database. At the root of your project run the following commands on terminal sequentially.

<pre>
    <code>php artisan key:generate</code>
    <code>php artisan migrate</code>
    <code>php artisan db:seed</code>
</pre>

This will store all the default data into the database. Then compile the assets by
<pre>
    <code>npm run dev</code>
</pre>

Finally initiate your server and enjoy !!!
<pre>
    <code>php artisan serve</code>
</pre>

