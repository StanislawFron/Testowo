<?php

namespace App\Livewire;

use App\Models\Test;
use Livewire\Component;
use App\Http\Controllers\GoogleDriveController;
use function Termwind\render;

class ShowTestQuestion extends Component
{
    public $questionIndex;
    public $numberOfAnswers;

    public $questions;
    public $answers;
    public $numberOfQuestions;

    public $rightAnswers = 0;

    public $showEndScreen;

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
            $this->dispatch('buttonColor', $index, 'child-btn-success');
        } else {
            $this->dispatch('buttonColor', $index, 'child-btn-danger');
            foreach ($this->answers[$this->questionIndex] as $rightAnswerIndex){
                $this->dispatch('buttonColor', $rightAnswerIndex, 'child-btn-success');
            }
        }
    }

    public function nextQuestion($index){
        if ($this->questionIndex < $this->numberOfQuestions - 1) {
            $this->questionIndex++;
        } else {
            if (in_array($index, $this->answers[($this->questionIndex)])) {
                $this->rightAnswers++;
            }
            $this->showEndScreen = true;
        }

        if (in_array($index, $this->answers[($this->questionIndex-1)])) {
            $this->rightAnswers++;
        }
    }

    public function render()
    {
        return view('livewire.show-test-question', [
            'question' => $this->getQuestionByIndex($this->questionIndex),
            'rightAnswersNotLive' => $this->rightAnswers,
        ]);
    }
}

