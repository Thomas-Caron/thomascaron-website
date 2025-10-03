<?php

namespace App\Controller\Api;

use App\Repository\AboutRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
class AboutApi extends AbstractController
{
    #[Route('/about', name: 'api_about',  methods: ['GET'])]
    public function index(AboutRepository $aboutRepository): JsonResponse
    {
        return $this->json([
            'success' => true,
            'data' => $aboutRepository->findOneBy([]),
        ], 200);
    }
}