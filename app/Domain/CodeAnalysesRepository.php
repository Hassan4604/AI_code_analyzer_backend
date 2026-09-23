<?php

namespace App\Domain;

use App\Models\CodeAnalyses;
use Illuminate\Database\Eloquent\Collection;

interface CodeAnalysesRepository
{
    public function create(array $data): CodeAnalyses;

    public function findById(int $id): ?CodeAnalyses;

    public function findByUserId(int $userId): Collection;

    public function delete(int $id): bool;
}