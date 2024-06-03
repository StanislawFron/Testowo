<?php

namespace App\Http\Controllers;

use App\Models\Test;

class TestController extends Controller
{
    public function show($googleDocumentNumber, $numberOfAnswers, $type): \Illuminate\View\View
    {
        return view('pages.test.show', [
            'test' =>new Test(
                (new GoogleDriveController())->getRawPageContent($googleDocumentNumber),
                (int)$numberOfAnswers,
                $type
            )
        ]);
    }
}
