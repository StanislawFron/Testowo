<div>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="text-center w-100">
            @if (!$showEndScreen)
            <div>Pytanie {{$questionIndex+1}}/{{$numberOfQuestions}}</div>
            <div>Poprawne odpowiedzi {{round($questionIndex != 0 ? ($rightAnswersNotLive/$questionIndex*100 > 100 ? 100 : $rightAnswersNotLive/$questionIndex*100) : 0)}}%</div>
            <div class="mb-4 h2 question">{{$question[0]}}</div>
            <div class="row justify-content-center">
                @foreach($question as $index => $answer)
                    @continue($loop->index == 0)
                    <div class="question-div col-12 col-md-6 col-lg-3 mb-3" wire:ignore.self id="button-{{ $index }}">
                        <button wire:click="checkAnswer({{ $index }})"
                                wire:key="{{ $index }}"
                                class="btn btn-primary btn-block question-button">
                            {{ $question[$index] }}
                        </button>
                    </div>
                @endforeach
            </div>
            @else
                <h1>Zakończono test z wynikiem {{round($questionIndex != 0 ? ($rightAnswers/$questionIndex*100 > 100 ? 100 : $rightAnswers/$questionIndex*100) : 0)}}%</h1>
                <form action="/">
                    @csrf
                    <button class="btn btn-primary pt-3">Wroć na stonę główną</button>
                </form>
            @endif
        </div>
    </div>
</div>

@script
<script>
    let buttonClicked = false; // Flaga określająca, czy przycisk został kliknięty

    $wire.on('buttonColor', (params) => {
        const buttonId = 'button-' + params[0];
        const colorClass = params[1];
        const button = document.getElementById(buttonId);

        button.classList.add(colorClass);

        if (button && !buttonClicked) {
            buttonClicked = true;
            setTimeout(() => {
                document.querySelectorAll('.question-div').forEach(function (button) {
                    button.classList.remove('child-btn-success');
                    button.classList.remove('child-btn-danger');
                });
                $wire.dispatch('nextQuestion', {
                    index: params[0]
                });
                buttonClicked = false;
            }, 2000);
        }
    });
</script>
@endscript
