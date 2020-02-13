<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

        public function __construct(UserPasswordEncoderInterface $encoder)
        {
            $this->encoder = $encoder;
        }
    
        public function load(ObjectManager $manager)
        {
            $admin1 = new User();
            $admin1->setPhoto('Hakim.jpeg');
            $password = $this->encoder->encodePassword($admin1, 'hakimdigital2018');
            $admin1->setpassword($password);
            $admin1->setEmail('contact@hakimdigitalsa.com');
            $admin1->setRoles(['SUPER_ADMIN']);
            $admin1->setNomcomplet('Hakim Digital.SA');
            $admin1->setTelephone('338695001');
            $admin1->setTelephone1('777806060');
            $admin1->setConfirmepassword('hakimdigital2018');
            $admin1->setStatut('actif');
    
            $manager->persist($admin1);
            $manager->flush();
        }
}
