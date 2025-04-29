<x-layouts.layout>

<div class="container mt-5">

    <x-success/>

    <div class="row justify-content-between">
        <div class="col-12 col-md-7 bg-secondary">
            <h1>Articoli nel carrello</h1>
            @if (count($cart) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Articolo</th>
                            <th>Quantità</th>
                            <th>Prezzo</th>
                            <th>Totale</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $id => $details)
                            <tr>
                                <td>{{ $details['name'] }}</td>
                                <td>
                                    <form action="{{ route('cart.update') }}" method="POST"> 
                                        @csrf
                                        <input type="hidden" name="article_id" value="{{ $id }}">
                                        <input class="w-25 form-switch" type="number" name="quantity" value="{{ $details['quantity'] }}" min="1">
                                        <button class="btn_custom btn w-25 ms-2 mb-2">Aggiorna</button>
                                    </form>
                                </td>
                                <td>{{ number_format($details['price'], 2) }} €</td>
                                <td>{{ number_format($details['price'] * $details['quantity'], 2) }} €</td>
                                <td>
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="article_id" value="{{ $id }}">
                                        <button class="btn_custom btn w-100">Rimuovi</button>
                                    </form>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            @else
                <h5>Il carrello è vuoto</h5>
            @endif
        </div>

        <div class="col-12 col-md-4 bg-light d-flex align-items-end">
            <table class="table">
                <thead>
                    <tr>
                        <th>Totale carrello</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)), 2) }} €</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

</x-layouts.layout>