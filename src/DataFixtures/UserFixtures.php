<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    public const ADMIN = [
        'quentin.adadain@gmail.com' => [
            'roles'    => ['ROLE_ADMIN'],
            'pseudo'   => 'Rolls',
            'password' => 'Admin47'
        ],
        'foucky@gmail.com' => [
            'roles'    => ['ROLE_ADMIN'],
            'pseudo'   => 'Foucky',
            'password' => 'Admin47'
        ],
        'hellsaya@gmail.com' => [
            'roles'    => ['ROLE_ADMIN'],
            'pseudo'   => 'Hellsaya',
            'password' => 'Admin47'
        ],
        'fran@gmail.com' => [
            'roles'    => ['ROLE_ADMIN'],
            'pseudo'   => 'Fran',
            'password' => 'Admin47'
        ],
        'glouz@gmail.com' => [
            'roles'    => ['ROLE_ADMIN'],
            'pseudo'   => 'Glouz',
            'password' => 'Admin47'
        ],
        'orta@gmail.com' => [
            'roles'    => ['ROLE_ADMIN'],
            'pseudo'   => 'Orta',
            'password' => 'Admin47'
        ],

    ];
    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        foreach (self::ADMIN as $email => $data) {
            $admin = new User();
            $admin->setEmail($email)
                ->setRoles($data['roles'])
                ->setPseudo($data['pseudo'])
                ->setPassword($this->passwordEncoder->encodePassword($admin, $data['password']));

            $manager->persist($admin);
        }
        $manager->flush();
    }
}