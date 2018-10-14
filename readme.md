## Getting started

1. Copy `.env.example` to `.env`.

1. Run the following command in the project directory: `php artisan key:generate`. This will create an application key in your environment file (this file should not be version controlled).

1. Install XDebug. If you're using XAMPP, follow this [guide](https://gist.github.com/odan/1abe76d373a9cbb15bed).



## Executing tests

On Windows, run the following command in the project directory:
```
.\vendor\bin\phpunit
```

Note that it's necessary to specify the path to the PHPUnit executable in case PHPUnit is also globally installed with some other configuration.

The command above will run all tests specified in `phpunit.xml`.

To execute tests with code coverage analyis, run the following command:
```
.\vendor\bin\phpunit
```

The folder `/coverage` will contain several HTML reports.

The [coverage settings](https://phpunit.readthedocs.io/en/7.4/configuration.html) are specified under `logging` in `phpunit.xml`.

To execute the tests without coverage run:
```
.\vendor\bin\phpunit  --no-coverage
```