<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent()]
class BasicTable
{
    public string $title;
    public array $filter;
    public array $headers;
    public array $rows;
    public array $pagination;
}
