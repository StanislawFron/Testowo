<x-layout>
    @section('head')
        <title>Dokumentacja</title>
    @endsection
    @section('body')
        <div class="container d-flex justify-content-center align-items-center">
            <div class="row col-12 text-center">
                <h1 class="pt-5">Dokumentacja</h1>
                <div class="text-start d-flex justify-content-center">
                    <div class="pt-3">
                        <ol>
                            <li><a href="#test-access">Jak uzyskać dostęp do testu</a></li>
                            <li><a href="#how-it-works">Jak działa pobieranie danych z Dokumentu Word?</a></li>
                            <li><a href="#tech-used">Wykorzystane technologie</a></li>
                        </ol>
                    </div>
                </div>
                <div id="test-access">
                    <h2 class="pt-5 mt-5">Jak uzyskać dostęp do testu?</h2>
                    <h3>1. Stwórz plik google word i wypełnij go pytaniami w ten sposób:</h3>
                    <div class="pt-3"><img src="{{ asset('images/test.png') }}" alt="test"></div>
                    <div class="text-start d-flex justify-content-center">
                        <div class="w-50 pt-3">
                            <b>Uwaga: </b>
                            <ul>
                                <li>każde pytanie powinno mieć 4 odpowiedzi</li>
                                <li>poprawna odpowiedź musi być oznaczona ciągiem znaków "[correct]"</li>
                                <li>tworzenie zacznij od pierwszej linii pliku i nie dodawaj żadnych pustych linii
                                    pomiędzy pytaniami i odpowiedziami
                                </li>
                            </ul>
                        </div>
                    </div>

                    <h3 class="pt-5">2. Kliknij przycisk udostępnij w prawym górnym rogu ekranu</h3>
                    <div class="pt-3"><img src="{{ asset('images/share.png') }}" alt="test"></div>


                    <h3 class="pt-5">3. Skopiuj link twojego dokumentu</h3>
                    <div class="pt-3"><img src="{{ asset('images/copy_link.png') }}" alt="test"></div>

                    <h3 class="pt-5">4. Skopiuj i wklej do wyszukiwarki numer znajdujacy się w linku</h3>
                    <div class="pb-5"><img src="{{ asset('images/cut_link.png') }}" alt="test"></div>
                </div>
                <div id="how-it-works" class="text-start">
                    <h2 class="pt-5 mt-5 text-center">Jak działa pobieranie danych z Dokumentu Word?</h2>
                    <h3 class="pt-3">1. Link udostępniony do publicznego dokumentu:</h3>
                    <p>
                        Aby pobrać dane z dokumentu Google, najpierw musimy mieć dostęp do udostępnionego dokumentu.
                    </p>
                    <h3 class="pt-3">2. Zapytanie HTTP:</h3>
                    <p>
                        Aby pobrać dane z dokumentu Google, używam zapytania HTTP GET. Pozwala ono pobrać całą zawartość
                        strony internetowej.
                    </p>
                    <h3 class="pt-3">3. Operacje na danych:</h3>
                    <p>
                        Z pobranych danych wyodrębniam interesujące mnie informacje o pytaniach i odpowiedziach podanych
                        w pliku. Następnie konwertuje dane na tablicę, przygotowując je do użycia. Dane w tablicy są
                        zbierane z dokumentu linia po linii.
                    </p>
                    <h3 class="pt-3">4. Tworzenie obiektu "test":</h3>

                    <p>
                        Z przygotowanych danych tworzę obiekt klasy test, w którym zbieram o nim wymagane informacje
                        takie jak:
                        - liczba pytań
                        - poprawne odpowiedzi
                        - zawartość pytań i odpowiedzi
                    </p>
                    <h3 class="pt-3">5. Tworzenie widoku testu:</h3>

                    <p>
                        Obiek klasy test przesyłam do komponentu stworzonego za pomocą Livewire, dzięki czemu mogę
                        wyświetlić dynamicznie zmieniający się test.
                    </p>
                    <h3 class="pt-3">6. Gotowy test:</h3>
                    <p>
                        Od tego momentu test staje się w pełni działającym elementem, z którego użytkownik może
                        korzystać.
                    </p>
                </div>
                <div id="tech-used" class="text-start">
                    <h2 class="pt-5 mt-5 text-center">Wykorzystane technologie</h2>
                    <div class="text-start d-flex justify-content-center">
                        <div class="w-50 pt-3">
                            <ul>
                                <li>PHP 8.2</li>
                                <li>Laravel 11.3.1</li>
                                <li>Livewire 3.4.12</li>
                                <li>HTML / CSS / JS</li>
                                <li>Guzzle</li>
                                <li>Bootstrap 5.3.3</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-layout>
