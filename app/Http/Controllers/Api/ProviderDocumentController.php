<?php

namespace App\Http\Controllers\Api;

class ProviderDocumentController extends Controller
{
    protected $candidateService;

    public function __construct(CandidateService $candidateService)
    {
        $this->candidateService = $candidateService;
    }

    public function find(Request $request)
    {
        $candidate = $this->candidateService->find($request->id);
        return new CandidateResource($candidate);
    }
}
