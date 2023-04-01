<?php

namespace ShortenUrl\Repository;

use ShortenUrl\Entity\Url;

interface UrlRepository
{
    public function store(Url $url): void;

    /** @return Url[] */
    public function all(): array;
    public function findByShortUrl(string $shortUrl): Url;
}