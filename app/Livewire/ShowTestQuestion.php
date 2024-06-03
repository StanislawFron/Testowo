<?php

namespace App\Livewire;

use App\Models\Test;
use Livewire\Component;
use App\Http\Controllers\GoogleDriveController;

class ShowTestQuestion extends Component
{
    public $questionIndex; // Indeks pytań powinien zaczynać się od 0
    public $numberOfAnswers;

    public $questions;
    public $answers;
    public $numberOfQuestions;

    protected $listeners = ['buttonColor', 'nextQuestion'];

    public function mount($test)
    {
        $this->questionIndex = 0;
        $this->questions = $test->getQuestions();
        $this->answers = $test->answers;
        $this->numberOfAnswers = $test->numberOfAnswers;
        $this->numberOfQuestions = count($test->questions);
    }

    public function getQuestionByIndex($index)
    {
        return $this->questions[$index] ?? null;
    }

    public function checkAnswer($index)
    {
        if (in_array($index, $this->answers[$this->questionIndex])) {
            $this->dispatch('buttonColor', $index, 'bg-success');
        } else {
            $this->dispatch('buttonColor', $index, 'bg-danger');
        }
    }

    public function nextQuestion(){
        if ($this->questionIndex < $this->numberOfQuestions - 1) {
            $this->questionIndex++;
        } else {
            $this->questionIndex = 0;
        }
    }

    public function render()
    {
        return view('livewire.show-test-question', [
            'question' => $this->getQuestionByIndex($this->questionIndex),
        ]);
    }
}

