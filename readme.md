<h2 align="center">
   <img src="https://raw.githubusercontent.com/RocketCodeHQ/logos/master/rc-logo.png"><br>Progress
</h2>

<p align="center">
    <a href="https://styleci.io/repos/92856894">
        <img src="https://styleci.io/repos/92856894/shield?branch=master" alt="StyleCI">
    </a>
</p>

## Introduction
Rocketcode Progress is a thing you need.

## License
This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

### Installation
Install Progress as you would with any other dependency managed by Composer:

```bash
$ composer require rocketcodehq/progress
```

### Configuration
After installing just register the ```Rocketcode\Progress\ProgressServiceProvider``` in your `config/app.php` configuration file.  
While you're here register the alias to make things easier down the road:

```php
'providers' => [
    ...
    Rocketcode\Progress\ProgressServiceProvider::class,
],
'aliases' => [
    ...
    'Progress' => Rocketcode\Progress\Facades\ProgressFacade::class
]
```

### Publishing
If you want to change any of the default options you can publish
 the migrations and the configuration.
```php
php artisan vendor:publish --provider ProgressServiceProvider
```

### Usage
To use this feature just pass in the job to the constructor.
```php
use App\Jobs\TestJob; 
$id = Progress::monitor( 
     app( 'Illuminate\Bus\Dispatcher' )->dispatch( new TestJob() )
); 

Or inside a class that uses the DispatchesTraits method.

$id = Progress::monitor( $this->dispatch( $job ) );
```

Once the job has been initialized you can check the status of the job.
Use the path set in the configuration.  Which is defaulted to:
`http://yourApp.dev/api/progress-monitor/{$id}`

### Drivers
This package currently supports all laravel queue drivers.  However, in the
case that you have your driver set to Sync you will recieve a 0 back
from the Progress::Monitor() call.  This is because there is no job ID generated
when using this driver.

### Options
This package currently supports the following options:
* table_name : Sets the table name used by the monitors
* use_soft_deletes : Determine if the monitor table should use soft deletes
* base_path : The path segment used by the controller.  This will be defined under the API middleware group.
* log_events : Determines if it will log all actions taken by the monitor with respect to the queue jobs directly.