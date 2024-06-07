<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class GoogleDriveController extends Controller
{
    public function getRawPageContent($googleDocumentNumber) : array
    {
        $url = 'https://docs.google.com/document/d/'.$googleDocumentNumber.'/edit?usp=sharing';
        $content = $this->fetchPageContent($url);

        $searchString = 'DOCS_modelChunk = [{';
        $matches = [];
        $offset = 0;
        while (($pos = strpos($content, $searchString, $offset)) !== false) {
            $endPos = strpos($content, '}}]', $pos);
            if ($endPos !== false) {
                $chunk = substr($content, $pos, $endPos - $pos + 2);
                $matches[] = $chunk;
                $offset = $endPos + 2;
            } else {
                break;
            }
        }

        $content = '';
        foreach ($matches as $match){
            $startPos = strpos($match, '{');
            $endPos = strpos($match, '}');
            $docsModelChunk = substr($match, $startPos, $endPos - $startPos + 1);
            $content .= json_decode($docsModelChunk, true)["s"] ?? '';
        }
        return mb_split("[\r\n\v]+", $content);
    }

    private function fetchPageContent($url): string
    {
        $client = new Client();

        try {
            $response = $client->request('GET', $url);
            $body = $response->getBody()->getContents();
        } catch (ClientException $e) {
            session_start();
            $_SESSION['error_message'] = 'Upewnij się, że podałeś poprawny link i widoczność dokumentu jest ustawiona na "każda osoba mająca link"';
            header('Location: /');
            exit;
        }

        return $body;
    }
}
