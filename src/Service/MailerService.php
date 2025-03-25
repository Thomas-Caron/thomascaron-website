<?php

namespace App\Service;

use App\Entity\Mail;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Mailer\MailerInterface;

class MailerService
{
    public function __construct(
        #[Autowire('%admin_mail%')] private readonly string $adminMail,
        private readonly MailerInterface $mailer
    ) {
    }

    public function sendMail(Mail $mail): JsonResponse
    {
        try {
            $mail = (new TemplatedEmail())
                ->from($this->adminMail)
                ->to($this->adminMail)
                ->subject($mail->getSubject())
                ->htmlTemplate('emails/email_content.html.twig')
                ->context([
                    'username' => $mail->getUsername(),
                    'phone' => $mail->getPhone(),
                    'mail' => $mail->getMail(),
                    'subject' => $mail->getSubject(),
                    'message' => $mail->getMessage(),
                ]);

            $this->mailer->send($mail);

            return new JsonResponse([
                'message' => 'Le message a été envoyé avec succès !',
                'success' => true,
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Erreur lors de l\'envoi du message : ' . $e->getMessage()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}