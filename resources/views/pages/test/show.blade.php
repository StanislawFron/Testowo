<!DOCTYPE html>
<html>
<head>
    <title>My Laravel App</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>
    @livewire('show-test-question', ['test' => $test])
@vite('resources/js/app.js')
@livewireScripts
</body>
</html>
