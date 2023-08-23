<?php

namespace Transprime\Url;

use Transprime\Url\Exceptions\UrlException;

class Url
{
    private array $query = [];
    public function __construct(
        private string $scheme = '',
        private string $domain = '',
        private string $port = '',
        private ?string $fullDomain = null,
        private string $path = '',
        array|string ...$query,
    ) {
        $this->query = $query[0] ?? $query['query'] ?? $query;
    }

    public static function make(
        string $scheme = '',
        string $domain = '',
        string $port = '',
        ?string $fullDomain = null,
        string $path = '',
        array $query = [],
    ): self {
        return new self(...func_get_args());
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
        return $this->toString();
    }

    public function toString(): string
    {
        return implode(array_filter($this->toArray()));
    }

    public function toArray(): array
    {
        if ($this->fullDomain) {
            return [
                $this->fullDomain,
                $this->path,
                $this->query ? '?' : '',
                http_build_query($this->query),
            ];
        }

        return [
            $this->scheme,
            $this->domain,
            $this->port ? ':' . $this->port : $this->port,
            $this->path,
            $this->query ? '?' : '',
            http_build_query($this->query)
        ];
    }
}