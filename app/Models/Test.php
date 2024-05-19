<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public function __construct($content, int $numberOfAnswers, $type)
    {
        $this->content = $content;
        $this->numberOfAnswers = $numberOfAnswers;
        $this->type = $type;
        $this->contentHtml = $this->render();
        $this->answers = $this->correctAnswers();
    }

    private function render(): \Illuminate\Support\Collection
    {
        return collect($this->content)->map(function ($line, $index) {
            static $questionId = 0;

            $line = str_replace('[correct]', '', $line);
            $line = htmlspecialchars($line);

            //title
            if ($index % ($this->numberOfAnswers + 1) == 0) {
                $questionId = $index / ($this->numberOfAnswers + 1);
                return '<div class="title question-' . $index / ($this->numberOfAnswers + 1) . '">' . $line . '</div><br>';
            }

            return '<input type="' . $this->type . '" name="' . $questionId . '-' . $index - ($questionId * $this->numberOfAnswers + 1) . '"/>' . $line . '<br>';
        });
    }

    private function correctAnswers(): array
    {
        return collect($this->content)->reduce(function ($carry, $v, $k) {
            if (stripos($v, '[correct]') !== false) {
                $carry[floor($k / ($this->numberOfAnswers + 1))][] = $k - floor($k / ($this->numberOfAnswers + 1)) * ($this->numberOfAnswers + 1);
            }
            return $carry;
        });
    }
}
