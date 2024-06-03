<div>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center row" style="height: 100vh; margin:0; padding:0;">
            <div class="col-12 text-center">{{$question[0] }} </div>
            <div class="d-flex flex-row">
                @foreach($question as $index => $answer)
                    @continue($loop->index == 0)
                    <div class="col-3" wire:ignore id="button-{{ $index }}">
                        <button wire:click="checkAnswer({{ $index }})"
                                wire:key="{{ $index }}"
                                class="question-button">
                            {{ $answer }}
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@script
<script>
    $wire.on('buttonColor', (params) => {
        const buttonId = 'button-' + params[0];
        const colorClass = params[1];
        const button = document.getElementById(buttonId);

        if (button) {
            button.classList.add(colorClass);

            setTimeout(() => {
                button.classList.remove(colorClass);
                $wire.dispatch('nextQuestion')
            }, 2000);
        }
    });
</script>
@endscript
