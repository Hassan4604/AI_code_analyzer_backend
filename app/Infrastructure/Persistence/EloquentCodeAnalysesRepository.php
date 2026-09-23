<?php

namespace App\Infrastructure\Persistence;

use App\Domain\CodeAnalysesRepository;
use App\Models\CodeAnalyses;
use Illuminate\Database\Eloquent\Collection;

class EloquentCodeAnalysesRepository implements CodeAnalysesRepository
{
    public function create(array $data): CodeAnalyses
    {
        return CodeAnalyses::create($data);
    }

    public function findById(int $id): ?CodeAnalyses
    {
        return CodeAnalyses::find($id);
    }

    public function findByUserId(int $userId): Collection
    {
        return CodeAnalyses::where('user_id', $userId)->get();
    }

    public function delete(int $id): bool
    {
        $code = CodeAnalyses::find($id);

        if ($code) {
            return $code->delete();
        }

        return false;
    }
}