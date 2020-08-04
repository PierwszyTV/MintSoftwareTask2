<?php


namespace App\Controller;


use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
	/**
	 * @var EntityManagerInterface
	 */
	private $entityManager;

	public function __construct(EntityManagerInterface $entityManager)
	{
		$this->entityManager = $entityManager;
	}

	/**
	 * @Route("/disable/{id}", name="disable_user_action", methods={"POST"})
	 * @param User|null $user
	 * @return JsonResponse
	 */
	public function disableUserAction(User $user = null)
	{
		$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

		if (!$user || $this->getUser()->getDisabled()) return new JsonResponse('Access denied!', 403);

		$user->setDisabled(!$user->getDisabled());

		$this->entityManager->flush();

		if ($user->getId() === $this->getUser()->getId()) return new JsonResponse('Redirect!', 201);

		return new JsonResponse('User has changed!', 200);
	}
}