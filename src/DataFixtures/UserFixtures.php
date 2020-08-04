<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
	static private $users = [
		"Patryk" => "Test1234!",
		"Franek" => "Test1234!",
		"Zosia" => "Test1234!",
		"Basia" => "Test1234!",
		"Paulina" => "Test1234!",
		"Asia" => "Test1234!",
		"Tomek" => "Test1234!",
		"Dawid" => "Test1234!",
		"Karol" => "Test1234!",
		"Andrzej" => "Test1234!",
		"Grzegorz" => "Test1234!",
		"Krysia" => "Test1234!",
		"Aneta" => "Test1234!",
		"Sebastian" => "Test1234!",
	];

	private $passwordEncoder;
	/**
	 * @var EntityManagerInterface
	 */
	private $entityManager;

	public function __construct(UserPasswordEncoderInterface $passwordEncoder,
								EntityManagerInterface $entityManager)
	{
		$this->passwordEncoder = $passwordEncoder;
		$this->entityManager = $entityManager;
	}

	public function load(ObjectManager $manager)
	{
		//Load examplary users to database
		foreach (self::$users as $name => $password)
		{
			$user = new User();

			$user
				->setUsername($name)
				->setRoles(['ROLE_ADMIN'])
				->setPassword($this->passwordEncoder->encodePassword(
					$user,
					$password
				));

			$this->entityManager->persist($user);
		}

		$this->entityManager->flush();
	}
}
