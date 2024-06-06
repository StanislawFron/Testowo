<x-layout>
    @section('head')
        <title>My Laravel App</title>
        @livewireStyles
    @endsection
    @section('body')
        @livewire('show-test-question', ['test' => $test])
        @livewireScripts
    @endsection
</x-layout>

