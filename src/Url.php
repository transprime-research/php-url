<?php

namespace Transprime\Url;

use Transprime\Url\Exceptions\PackageException;

class Url
{
    private ?string $fullDomain = null;
    private string $scheme;
    private string $port = '';

    private string $domain;
    private string $path = '';
    private array $query = [];

    public function __construct()
    {
    }

    public static function make(): self
    {
        return new self();
    }

    public function setDomain(string $domain): static
    {
        $this->domain = $domain;

        return $this;
    }

    public function setFullDomain(string $fullDomain): static
    {
        $this->fullDomain = $fullDomain;

        return $this;
    }

    public function setPort(string $port): static
    {
        $this->port = $port;

        return $this;
    }

    public function setScheme(string $scheme): static
    {
        $this->scheme = $scheme;

        return $this;
    }

    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    public function setQuery(array $query): static
    {
        $this->query = $query;

        return $this;
    }

    public function addToQuery(string $key, string $value)
    {
        $this->query[$key] = $value;

        return $this;
    }

    public function __toString(): string
    {
        return implode($this->toArray());
    }

    public function toArray(): array
    {
        if ($this->fullDomain) {
            return [
                $this->fullDomain,
                $this->path,
                '?',
                http_build_query($this->query),
            ];
        }

        return [
            $this->scheme,
            $this->domain,
            $this->port ? ':' . $this->port : $this->port,
            $this->path,
            '?',
            http_build_query($this->query)
        ];
    }
}