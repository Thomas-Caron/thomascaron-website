<?php

namespace App\Controller\Api;

use App\Entity\Mail;
use App\Form\MailType;
use App\Service\MailerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/api')]
class MailApi extends AbstractController
{
    public function __construct(
        private readonly MailerService $mailer,
        private readonly ValidatorInterface $validator,
        private readonly FormFactoryInterface $formFactory,
    ){
    }

    #[Route('/send-mail', methods: ['POST'])]
    public function index(Request $request): JsonResponse
    {
        $mail = new Mail();

        $form = $this->formFactory->create(MailType::class, $mail);
        $form->submit(json_decode($request->getContent(), true));

        if (!$form->isValid()) {
            $errors = [];
            foreach ($form->getErrors(true, true) as $error) {
                $errors[] = $error->getMessage();
            }
            return new JsonResponse(['errors' => $errors], JsonResponse::HTTP_BAD_REQUEST);
        }

        return $this->mailer->sendMail($mail);
    }
}