# Azet API

## Introduction

This is a API.

## Requirements

Please see the composer.json file.

## Installation using Composer

Run the following composer command:
  ```bash
  $ composer require --dev nynka/azet-api
  ```

Alternately, manually add the following to your composer.json, in the require section:

  ```bash
  "require": {
    "nynka/azet-api": "dev-master"
  }
  ```

And then run composer update to ensure the module is installed.

Finally, add the module name to your project's config/application.config.php under the modules key:
  
  ```bash
  return [
    /* ... */
    'modules' => [
      /* ... */
      'Azet',
    ],
    /* ... */
  ];
  ```

## Running Unit Tests

To run the supplied skeleton unit tests, you need to do one of the following:

- During initial project creation, select to install the MVC testing support.
- After initial project creation, install [zend-test](https://zendframework.github.io/zend-test/):

  ```bash
  $ composer require --dev zendframework/zend-test
  ```

Once testing support is present, you can run the tests using:

```bash
$ ./vendor/bin/phpunit
```

If you need to make local modifications for the PHPUnit test setup, copy
`phpunit.xml.dist` to `phpunit.xml` and edit the new file; the latter has
precedence over the former when running tests, and is ignored by version
control. (If you want to make the modifications permanent, edit the
`phpunit.xml.dist` file.)

## QA Tools

The skeleton does not come with any QA tooling by default, but does ship with
configuration for each of:

- [phpcs](https://github.com/squizlabs/php_codesniffer)
- [phpunit](https://phpunit.de)

If you want to add these QA tools, execute the following:

```bash
$ composer require --dev phpunit/phpunit squizlabs/php_codesniffer zendframework/zend-test
```

We provide aliases for each of these tools in the Composer configuration:

```bash
# Run CS checks:
$ composer cs-check
# Fix CS errors:
$ composer cs-fix
# Run PHPUnit tests:
$ composer test
```
