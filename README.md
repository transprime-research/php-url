<p align="center">
<img src="https://github.com/transprime-research/assets/blob/master/php-url/twitter_header_photo_2.png">
</p>

<p align="center">
<a href="https://travis-ci.com/transprime-research/php-url"> <img src="https://travis-ci.org/transprime-research/php-url.svg?branch=master" alt="Build Status"/></a>
<a href="https://packagist.org/packages/transprime-research/php-url"> <img src="https://poser.pugx.org/transprime-research/php-url/v/stable" alt="Latest Stable Version"/></a>
<a href="https://packagist.org/packages/transprime-research/php-url"> <img src="https://poser.pugx.org/transprime-research/php-url/downloads" alt="Total Downloads"/></a>
<a href="https://packagist.org/packages/transprime-research/php-url"> <img src="https://poser.pugx.org/transprime-research/php-url/v/unstable" alt="Latest Unstable Version"/></a>
<a href="https://packagist.org/packages/transprime-research/php-url"> <img src="https://poser.pugx.org/transprime-research/php-url/d/monthly" alt="Latest Monthly Downloads"/></a>
  <a href="https://packagist.org/packages/transprime-research/php-url"> <img src="https://poser.pugx.org/transprime-research/php-url/license" alt="License"/></a>
</p>

## About PHP-URL

This works this way
> Do it Like a PRO :ok:

## Installation

- `composer require transprime-research/php-url`

## Quick Usage
Use it like this...

```php
$url = new Url(
    fullDomain: 'http://localhost:8080',
    path: '/api/hello',
    query: ['name' => 'John', 'public' => 'yes'],
);

// Or

$url = Url::make(
    scheme: 'http://',
    domain: 'localhost',
    port: '8080',
    path: '/api/hello',
    query: ['name' => 'John', 'public' => 'yes'],
);


(string) $url; // http://localhost:8080/api/hello?name=John&public=yes
$url->toString(); // http://localhost:8080/api/hello?name=John&public=yes
```

## Other Usages

```php
$url = Url::make()
    ->setScheme('http://')
    ->setDomain('localhost')
    ->setPort('8080')
    ->setPath('/api/hello')
    ->addToQuery('name', 'John')
    ->addToQuery('public', 'yes');

(string) $url; // http://localhost:8080/api/hello?name=John&public=yes
```

## Coming Soon

-

> Api implementation to be decided

## Additional Information

See other packages in this series here:

- https://github.com/omitobi/conditional [A smart PHP if...elseif...else statement]
- https://github.com/transprime-research/piper [A functional PHP pipe in object-oriented way]
- https://github.com/transprime-research/arrayed [Array now an object]
- https://github.com/transprime-research/attempt [A smart PHP try...catch statement]
- https://github.com/omitobi/corbonate [A smart Carbon + Collection package]
- https://github.com/omitobi/laravel-habitue [Jsonable Http Request(er) package with Collections response]

## Similar packages


## Licence

MIT (See LICENCE file)
