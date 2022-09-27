<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Articles;

class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=0; $i <= 10;$i++){

            $article = new Articles();
            $article->setTitle("Article n°$i")
                    ->setContent("Contenu article n°$i")
                    // ->setUserId($user)
                    ->setCreatedAt(new \DateTimeImmutable());
            
            $manager->persist($article);
        }

        $manager->flush();
    }
}
