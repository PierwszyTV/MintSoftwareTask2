<?php


namespace App\Controller;


use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
	/**
	 * @var UserRepository
	 */
	private $userRepository;

	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	/**
	 * @Route("/", name="index_action")
	 */
	public function indexAction()
	{
		if (!$this->getUser() || $this->getUser()->getDisabled()) return $this->redirectToRoute('app_logout');

		$users = $this->userRepository->findAll();

		return $this->render('main.html.twig', [
			'users' => $users
		]);
	}
}