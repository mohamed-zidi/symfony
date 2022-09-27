<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UsersFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $admin = new Users();
        $admin->setLastname('admin');
        $admin->setFirstname('admin');
        $admin->setEmail('admin@gmail.com');
        $admin->setPassword('$2y$13$i7Ol1lvJeQTpzonFTpc2AuoEapFrrhzo/mU.GcKRsikyZZwwIhuVK');
        $admin->setRoles( ['ROLE_ADMIN']);
        $manager->persist($admin);
        $manager->flush();
    }
}
