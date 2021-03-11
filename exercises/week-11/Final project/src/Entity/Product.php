<?php

namespace App\Entity;

class Product
{
    public int $id;
    public string $title;
    public string $description;
    public string $imagePath;
    public ?float $average_rating;
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
?>