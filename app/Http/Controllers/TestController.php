<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Models\Test;

class TestController extends Controller
{
    public function index(){
        return view('pages.test.index');
    }
    public function show(TestRequest $request, $googleDocumentNumber, $numberOfAnswers, $type): \Illuminate\View\View
    {
        if($googleDocumentNumber == 'index'){
            $validated = $request->validated();
            $googleDocumentNumber = $validated['googleDocumentNumber'];
        }

        return view('pages.test.show', [
            'test' => new Test(
                (new GoogleDriveController())->getRawPageContent($googleDocumentNumber),
                (int)$numberOfAnswers,
                $type
            )
        ]);
    }
}
