<?php

namespace App\Http\Controllers;

use App\Applications\CodeAnalyses\AnalyzeCodeCase;
use App\Http\Requests\CodeAnalysesRequest;
use Illuminate\Http\Request;

class CodeAnalysesController extends Controller
{
    public function __construct(
        private AnalyzeCodeCase $codeAnalysisCase
    ) {
    }

    public function create(CodeAnalysesRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = $request->user()->id;

        return $this->codeAnalysisCase->execute($data);
    }

    public function show(Request $request, int $id)
    {
        $analysis = $this->codeAnalysisCase->findById($id);

        if (!$analysis) {
            return response()->json([
                'message' => 'Code analysis not found.'
            ], 404);
        }

        if ($analysis->user_id !== $request->user()->id) {
            return response()->json([
                'message' => 'Unauthorized.'
            ], 403);
        }

        return response()->json($analysis);
    }

    public function index(Request $request)
    {
        $analyses = $this->codeAnalysisCase->findByUserId(
            $request->user()->id
        );

        return response()->json($analyses);
    }

    public function destroy(Request $request, int $id)
    {
        $analysis = $this->codeAnalysisCase->findById($id);

        if (!$analysis) {
            return response()->json([
                'message' => 'Code analysis not found.'
            ], 404);
        }

        if ($analysis->user_id !== $request->user()->id) {
            return response()->json([
                'message' => 'Unauthorized.'
            ], 403);
        }

        $this->codeAnalysisCase->delete($id);

        return response()->json([
            'message' => 'Code analysis deleted successfully.'
        ]);
    }
}
