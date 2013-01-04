<?php

namespace My\FrontendBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use My\FrontendBundle\Entity\Song;
use Doctrine\Common\Persistence\ObjectManager;

class LoadData implements FixtureInterface
{

    function load(ObjectManager $manager)
    {
        $xml = simplexml_load_file('data/songs.xml');
        foreach ($xml->song as $s) {
            $data = (array) $s;
            $Song = new Song();
            $Song->fromArray($data);
            $manager->persist($Song);
        }
        $manager->flush();
    }

}