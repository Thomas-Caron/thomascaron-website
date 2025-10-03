<?php

namespace App\Controller\Api;

use App\Repository\ReferenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
class ReferenceApi extends AbstractController
{
    #[Route('/reference', name: 'api_reference',  methods: ['GET'])]
    public function index(ReferenceRepository $referenceRepository): JsonResponse
    {
        return $this->json([
            'success' => true,
            'data' => $referenceRepository->findBy(['isPublished' => true]),
        ], 200);
    }
}