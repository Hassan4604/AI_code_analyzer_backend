<?php

namespace App\Applications\CodeAnalysis;

use App\Domain\CodeAnalysesRepository;
use App\Models\CodeAnalyses;
use Illuminate\Database\Eloquent\Collection;

class AnalyzeCodeCase
{
    public function __construct(
        private CodeAnalysesRepository $codeRepo
    ) {
    }

    public function execute(array $data): CodeAnalyses
    {
        return $this->codeRepo->create($data);
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