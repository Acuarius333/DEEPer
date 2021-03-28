<?php

namespace App\Entity;

class CheckIn
{
    public ?int $id;
    public int $userId;
    public string $name;
    public int $productId;
    public int $rating;
    public string $review;
    public string $submitted;

}