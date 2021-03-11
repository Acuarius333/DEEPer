<?php
namespace App\DataProvider;

use App\Entity\CheckIn;
use App\Entity\Product;
use App\Entity\User;
use App\Hydrator\EntityHydrator;
use PDO;

class DatabaseProvider
{
    private \PDO $dbh;

    public function __construct()
    {
        try {
            $this->dbh = new PDO(
                'mysql:dbname=project;host=mysql',
                $_ENV['DBUSERNAME'],
                $_ENV['DBPASSWD']
            );

            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            // We could/should log this!
            die('Unable to establish a database connection');
        }

    }


    public function getUser(int $userId): ?User
    {
        $stmt = $this->dbh->prepare(
            'SELECT id, name, email_address, password
            FROM user
            WHERE id = :id'
        );
        $stmt->execute(['id' => $userId]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($result)) {
            return null;
        }

        $hydrator = new EntityHydrator();
        return $hydrator->hydrateUser($result);
    }

    public function getUserByEmail(string $email): ?User
    {
        $stmt = $this->dbh->prepare(
            'SELECT id, name, email_address, password
            FROM user
            WHERE email_address = :email'
        );
        $stmt->execute(['email' => $email]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($result)) {
            return null;
        }

        $hydrator = new EntityHydrator();
        return $hydrator->hydrateUser($result);
    }

    public function createUser(User $user): User
    {
        $stmt = $this->dbh->prepare(
            'INSERT INTO user (`name`, `email_address`, `password`)
            VALUES (:name, :emailAddress, :password)'
        );

        $stmt->execute([
            'name' => $user->name,
            'emailAddress' => $user->emailAddress,
            'password' => $user->password,
        ]);

        $lastInsertId = $this->dbh->lastInsertId();
        $newUser = $this->getUser($lastInsertId);

        return $newUser;
    }
}
?>