<x-layout>
    @section('head')
        <title>Strona z testami</title>
    @endsection
    @section('body')
        <div class="container d-flex justify-content-center align-items-center search">
            <div class="row col-12 text-center">
                    <h1>Otwórz test z pliku Google Dokumenty</h1>
                    <form action="{{ route('test.show', ['google_document_number' => 'index', 'number_of_answers' => 4, 'type' => 'checkbox']) }}" method="POST" class="pt-5">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="googleDocumentNumber" class="form-control" placeholder="Wprowadź numer dokumentu Google">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-3">Otwórz test</button>
                        </div>
                    </form>
                <h2 class="pt-5 mt-5">Jak uzyskać dostęp do testu?</h2>
                <h3>1. Stwórz plik google word i wypełnij go pytaniami w ten sposób:</h3>
                <div class="pt-3"><img src="{{ asset('images/test.png') }}" alt="test"></div>
                <div class="text-start d-flex justify-content-center">
                    <div class="w-50 pt-3">
                        <b>Uwaga: </b>
                    <ul>
                        <li>każde pytanie powinno mieć 4 odpowiedzi</li>
                        <li>poprawna odpowiedź musi być oznaczona ciągiem znaków "[correct]"</li>
                        <li>tworzenie zacznij od pierwszej linii pliku i nie dodawaj żadnych pustych linii pomiędzy pytaniami i odpowiedziami</li>
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
        </div>
    @endsection
</x-layout>
