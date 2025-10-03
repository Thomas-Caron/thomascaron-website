<?php

namespace App\Controller\Api;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
class ProjectApi extends AbstractController
{
    #[Route('/project', name: 'api_project',  methods: ['GET'])]
    public function index(ProjectRepository $projectRepository): JsonResponse
    {
        return $this->json([
            'success' => true,
            'data' => $projectRepository->findBy(['isPublished' => true]),
        ], 200);
    }
}