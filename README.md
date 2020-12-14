# Nexus

> Nexus is an Admin Panel based on Laravel Framework

## Installation

### Requirements

* Composer
* Laravel Framework 5.7+/6.0+/7.0+
* Laravel Mix
* Node.js & NPM

### Installing Nexus

Run the following command in your console terminal:

```bash
$ composer require zrkb/nexus
```

Or if you want to download the files, add the following configuration to the composer.json file:

```json
    "repositories": [
        {
            "type": "path",
            "url": "../nexus"
        }
    ],
```

Now run:

```bash
$ composer require zrkb/nexus @dev
```

### Database Credentials

Next make sure to create a new database and add your database credentials to your `.env` file:

```ruby
DB_HOST=localhost
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret
```

### Run the installer

Finally, run the install command and migrate Artisan commands.

```bash
$ php artisan nexus:install
```

### Admin User

In order to create an user for the admin panel, run the next command:

```bash
$ php artisan nexus:user
```

### Admin User Provider

Your admin user must subclass from Nexus Admin Model, you can change this in `nexus.php` config file:

```php
'providers' => [
    'admins' => [
        'driver' => 'eloquent',
        'model' => \Nexus\Models\Admin::class,
    ],

    // ...
],
```

## Usage

### Defining resources

You may want to generate a new resource using the `nexus:crud` Artisan command:

```bash
$ php artisan nexus:crud Bookmark
```

This will create the following files:

```php
// Model
app/Models/Bookmark.php

// Controller
app/Http/Controllers/Backend/BookmarkController.php

// Migration
database/migrations/YYYY_MM_DD_HHIISS_create_bookmarks_table.php

// Views
resources/views/bookmarks/create.blade.php
resources/views/bookmarks/edit.blade.php
resources/views/bookmarks/form.blade.php
resources/views/bookmarks/index.blade.php
resources/views/bookmarks/show.blade.php
```

> **Note:** You may want to run `php artisan migrate` command to create the table in the database.

### Register Resources

Once the resource are created, we need to add them to the project:

#### 1. Add route

Edit your `routes/web.php` and the new resource:

```php
Nexus::resource('bookmarks', 'BookmarkController');
```

or the equivalent:

```php
Nexus::group(function () {
    Route::resource('bookmarks', 'BookmarkController');
});
```

#### 2. Add to sidebar

Edit your `resources/views/vendor/nexus/sidebar/user.blade.php` file and add the code below:

```php
<li>
    <a href="{{ route('bookmarks.index') }}"
        class="nav-link {{ is_route('bookmarks.index') ? 'active' : '' }}"
        role="button">
        <i class='bx bx-bookmarks'></i>
        <span>Bookmarks</span>
    </a>
</li>
```

That's all! You may refresh your dashboard page and you'll see a new item in the sidebar, click on it and explore your new resource.


## Todo

* [x] Assign permissions automatically to role Developer when creating a resource
* [x] Add middleware for [auth routes redirect](https://laracasts.com/discuss/channels/general-discussion/l5-register-a-route-middleware-at-package?page=1) when login
* [x] Migration file stub
* [ ] Menus Admin
* [ ] Media Library Admin
* [ ] Conditionals for stubs files (Case: not all models will use SoftDelete feature)
* [ ] Analyze Scaffold vs Runtime Gen
* [ ] Separate blog as a package


## Security

If you discover any security related issues, please use the issue tracker.

## Credits

- [Felix Ayala](http://felixaya.la)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
