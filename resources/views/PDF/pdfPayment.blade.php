<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>



    <h1>{{ $title }}</h1>
    <hr>
    <p>
        <span>
            <i class="fas fa-user"></i>
            Vous visualisez les paiements de l'utilisateur :
            <span class="text-primary">{{ $user->name }}</span>
        </span>
    </p>
    <p>le : {{ $date }}</ <div class="row mt-3">
    <table class="table table-striped table-responcive">
        <thead>
            <tr>
                <th scope="col">Montant</th>
                <th scope="col">Total</th>
                <th scope="col">Montant restant</th>
                <th scope="col">Date de paiement</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr>

                    <td>{{ $payment->amount_paid }}</td>
                    <td>{{ $payment->goal_amount }}</td>
                    <td>{{ $payment->remaining_amount }}</td>
                    <td>{{ $payment->payment_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    {{-- <div class="d-flex justifuy-content-end">
        signature : <span class="text-primary">{{ $user->name }}</span>
    </div> --}}

</body>

</html>
