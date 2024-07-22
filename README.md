# Evergreen Errors for TYPO3

TYPO3 has a built-in error handling system which sends 50x HTTP response codes when
a PHP error or syntax error occurred, or an unhandled PHP Exception is sent.

This is perfect for really 99.9999% of the use-cases, however when using TYPO3 behind
a CDN with a singular domain and various other systems, a CDN could be configured to
treat 50x status codes as a bug for the whole domain, effectively blocking
all access to the domain / zone.

For this reason, this extension is created which transfers 50x HTTP status codes to
a 400 error code before emitting the result to the browser.

## Installation

Install the extension via composer:

    composer req b13/evergreen-errors

Then configure your TYPO3 installation to use the exception handler, by setting the
`productionExceptionHandler` in your `typo3conf/LocalConfiguration.php` or `typo3conf/AdditionalConfiguration.php`
file.

Here is an example for your AdditionalConfiguration.php / additional.php file:

```
$GLOBALS['TYPO3_CONF_VARS']['SYS']['productionExceptionHandler'] = \B13\EvergreenErrors\EvergreenExceptionHandler::class;
```

If you also want to enable this for your debug exception handler, use

```
$GLOBALS['TYPO3_CONF_VARS']['SYS']['debugExceptionHandler'] = \B13\EvergreenErrors\EvergreenDebugExceptionHandler::class;
```

## License

The package is licensed under GPL v2+, same as the TYPO3 Core. For details see the LICENSE file in this repository.

### Credits

This package was created by [Benni Mack](https://github.com/bmack) in 2021 for [b13 GmbH](https://b13.com).

[Find more TYPO3 packages we have developed](https://b13.com/useful-typo3-extensions-from-b13-to-you) that help us deliver value in client projects. As part of the way we work, we focus on testing and best practices to ensure long-term performance, reliability, and results in all our code.
