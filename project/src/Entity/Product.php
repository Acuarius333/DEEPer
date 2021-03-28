<?php

namespace App\Entity;

class Product
{
    public ?int $id;
    public string $productName;
    public string $type;
    public string $location;
    public string $country;
    public int $views;
    public string $description;
    public string $grapeInfo;
    public string $keywords;
    public string $imagePath;
    public ?string $averageRating;
    /** @var CheckIn[] */
    private array $checkIns = [];

    public function __construct()
    {
        //echo 'I was instantiated';
    }

    public function addCheckin(CheckIn $checkIn): void
    {
        $this->checkIns[] = $checkIn;
    }

    public function getCheckins(): array
    {
        return $this->checkIns;
    }
}