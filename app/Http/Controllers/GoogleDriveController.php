<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GoogleDriveController extends Controller
{
    public function displayTest()
    {
        // Link do dokumentu Google
        $url = 'https://docs.google.com/document/d/10I3OiNUYWvwXBGNnYlUWb7YQ46rmTQRK8YWcKH7_wyY/edit?usp=sharing';

        $pageContent = $this->fetchPageContent($url);

        $content = $this->getRawPageContent($pageContent);

        dd($this->renderTestHtml($content, 4, 'checkbox'));

        // dorobić zliczanie poprawnych odpowiedzi razem z id przykład :
        // [
        //  0 => [1,3]
        //  1 => [
        // ]

        // przesłać na widok i zrobić template pytań i odpowiedzi

        // zrobić sprawdzanie czy odpowiedź jest poprawna
    }

    private function renderTestHtml($content, $answers = 4, $mode = 'checkbox')
    {
        return collect($content)->map(function ($line, $index) use($answers, $mode){
            static $questionId = 0;

            //title
            if($index%($answers+1) == 0){
                $questionId = $index/($answers+1);
                return '<div class="title question-'.$index/($answers+1).'">' . $line . '</div><br>';
            }

            return  '<input type="' . $mode . '" name="' . $questionId. '-' . $index-($questionId*$answers+1)  . '"/>' . $line . '<br>';

        });
    }

    private function getRawPageContent($pageContent)
    {
        $content = preg_match('/<script[^>]*>\s*DOCS_modelChunk\s*=\s*(.*?);\s*<\/script>/is', $pageContent, $matches);

        $startPos = strpos($matches[1], '{');
        $endPos = strpos($matches[1], '}');
        $docsModelChunk = substr($matches[1], $startPos, $endPos - $startPos + 1);
        $content = json_decode($docsModelChunk, true)["s"];

        $content = preg_split('/\r\n|\r|\n/', $content);
        return $content;
    }

    private function fetchPageContent($url)
    {
        $client = new Client();
        $response = $client->request('GET', $url);

        return $response->getBody()->getContents();
    }
}
