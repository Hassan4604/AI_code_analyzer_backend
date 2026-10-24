<?php

namespace App\Applications\CodeAnalyses;

use App\Domain\CodeAnalysesRepository;
use App\Models\CodeAnalyses;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Http;
use UnexpectedValueException;

class AnalyzeCodeCase
{
    public function __construct(
        private CodeAnalysesRepository $codeRepo
    ) {
    }

    public function execute(array $data): CodeAnalyses
    {
        $response = Http::timeout(60)->post(
            rtrim(config('services.ai.url'), '/') . '/analyze',
            [
                'code' => $data['code'],
                'language' => $data['language'],
            ]
        );

        $response->throw();

        $result = $response->json();

        if (
            !isset($result['review']) ||
            !isset($result['improvements']) ||
            !isset($result['rating'])
        ) {
            throw new UnexpectedValueException(
                'Invalid response received from AI service.'
            );
        }

        $analysisData = array_merge($data, [
            'review' => $result['review'],
            'improvements' => $result['improvements'],
            'rating' => $result['rating'],
        ]);

        return $this->codeRepo->create($analysisData);
    }

    public function findById(int $id): ?CodeAnalyses
    {
        return $this->codeRepo->findById($id);
    }

    public function findByUserId(int $userId): Collection
    {
        return $this->codeRepo->findByUserId($userId);
    }

    public function delete(int $id): bool
    {
        return $this->codeRepo->delete($id);
    }
}
