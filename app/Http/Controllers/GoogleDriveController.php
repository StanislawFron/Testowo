<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

class GoogleDriveController extends Controller
{
    public function getRawPageContent($googleDocumentNumber) : array
    {
        $url = 'https://docs.google.com/document/d/'.$googleDocumentNumber.'/edit?usp=sharing';
        $content = $this->fetchPageContent($url);
        preg_match('/<script[^>]*>\s*DOCS_modelChunk\s*=\s*(.*?);\s*<\/script>/is', $content, $matches);

        $startPos = strpos($matches[1], '{');
        $endPos = strpos($matches[1], '}');
        $docsModelChunk = substr($matches[1], $startPos, $endPos - $startPos + 1);
        $content = json_decode($docsModelChunk, true)["s"];

        return preg_split('/\r\n|\r|\n/', $content);
    }

    private function fetchPageContent($url): string
    {
        return (new Client())->request('GET', $url)->getBody()->getContents();
    }
}
