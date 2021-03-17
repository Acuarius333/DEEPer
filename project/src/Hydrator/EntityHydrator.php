<?php

namespace App\Hydrator;

use App\DataProvider\DatabaseProvider;
use App\Entity\CheckIn;
use App\Entity\Product;
use App\Entity\User;

class EntityHydrator
{
    public function hydrateProduct(array $data): Product
    {
        $product = new Product();
        $product->id = $data['id'];
        $product->name = $data['name'];
        $product->type = $data['type'];
        $product->location = $data['location'];
        $product->country = $data['country'];
        $product->description = $data['description'];
        $product->views = $data['views'];
        $product->keywords = $data['keywords'];
        $product->imagePath = $data['image_path'];


        return $product;
    }

    public function hydrateCheckIn(array $data): CheckIn
    {
        $checkIn = new CheckIn();
        $checkIn->id = $data['id'] ?? null;
        $checkIn->name = $data['name'];
        $checkIn->rating = $data['rating'];
        $checkIn->review = $data['review'];
        $checkIn->productId = $data['product_id'];

        return $checkIn;
    }

    public function hydrateProductWithCheckIns(array $data): Product
    {
        $productData = [
            'id' => $data[0]['product_id'],
            'title' => $data[0]['title'],
            'description' => $data[0]['description'],
            'image_path' => $data[0]['image_path'],
            'average_rating' => $data[0]['average_rating'],
        ];

        $product = $this->hydrateProduct($productData);

        foreach ($data as $checkinRow) {
            if ($checkinRow['name'] !== null) {
                $checkIn = $this->hydrateCheckIn($checkinRow);
                $product->addCheckin($checkIn);
            }
        }

        return $product;
    }

    public function hydrateUser (array $data): User
    {
        $user = new User();
        $user->id = $data['id'] ?? null;
        $user->name = $data['name'];
        $user->emailAddress = $data['email_address'];
        $user->password = $data['password'];

        return $user;
    }
}