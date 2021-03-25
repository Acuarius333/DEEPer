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
        $product->id = $data['id'] ?? null;
        $product->productName = $data['product_name'];
        $product->type = $data['type'];
        $product->location = $data['location'];
        $product->country = $data['country'];
        $product->description = $data['description'];
        $product->views = $data['views'];
        $product->keywords = $data['keywords'];
        $product->imagePath = $data['image_path'];
        $product->averageRating = $data['average_rating'] ?? null;

        return $product;
    }

    public function hydrateCheckIn(array $data): CheckIn
    {
        $checkIn = new CheckIn();
        $checkIn->id = $data['id'] ?? null;
        $checkIn->name = $data['name'];
        $checkIn->userId = $data['user_id'];
        $checkIn->rating = $data['rating'];
        $checkIn->review = $data['review'];
        $checkIn->productId = $data['product_id'];
        $checkIn->submitted = $data['submitted'];

        return $checkIn;
    }

    public function hydrateProductWithCheckIns(array $data): Product
    {
        $productData = [
            'id' => $data[0]['id'],
            'product_name' => $data[0]['product_name'],
            'description' => $data[0]['description'],
            'image_path' => $data[0]['image_path'],
            'type' => $data[0]['type'],
            'location' => $data[0]['location'],
            'country' => $data[0]['country'],
            'views' => $data[0]['views'],
            'keywords' => $data[0]['keywords'],
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
        $user->followersId = $data['followers_id'] ?? null;
        $user->followingId = $data['following_id'] ?? null;
        $user->imagePath = $data['image_path'] ?? null;

        return $user;
    }
}