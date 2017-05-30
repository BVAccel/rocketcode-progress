<h2 align="center">
   <img src="https://raw.githubusercontent.com/RocketCodeHQ/logos/master/rc-logo.png"> Rocketcode Progress
</h2>

<p align="center">
    <a href="https://styleci.io/repos/92856894"><img src="https://styleci.io/repos/92856894/shield?branch=master" alt="StyleCI"></a>
</p>

## Introduction
Rocketcode Progress is a thing you need.

## License
This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

### Installation
Install Progress as you would with any other dependency managed by Composer:

```bash
$ composer require rocketcode/progress
```

### Configuration
After installing just register the ```Rocketcode\Progress\ProgressServiceProvider``` in your `config/app.php` configuration file:

```php
'providers' => [
    ...
    Rocketcode\Progress\ProgressServiceProvider::class,
],
```