<?php

namespace Transprime\Url;

use Transprime\Url\Url;

function url(
    string $scheme = '',
    string $domain = '',
    string $port = '',
    ?string $fullDomain = null,
    string $path = '',
    array $query = [],
): Url {
    return new Url();
}