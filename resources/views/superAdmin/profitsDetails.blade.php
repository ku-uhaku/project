@extends('layout.layout')

@section('title', 'Super Admin View ')

@section('content')
    <main class="d-flex justify-content-between flex-row">
        {{-- @include('dashboard.panel') --}}

        <section class="manage-users-section container py-3">
            <h1 class="mb-4 mt-4 h2 ">Super Admin View</h1>
            <x-alerts></x-alerts>


            <div class="row">
                <h4>Filter Profits</h4>
                <form action="{{ route('superadmin.filterProfits') }}" method="get">
                    <div class="row">
                        {{-- <div class="row mb-3">
                            {{ count(request()->all()) > 0
                                ? 'You filtered by: ' .
                                    implode(
                                        ' and ',
                                        array_keys(
                                            array_filter(request()->all(), function ($key) {
                                                return $key !== 'page';
                                            }),
                                        ),
                                    )
                                : '' }}
                        </div> --}}
                        <div class="col">
                            <div class="input-group">
                                {{-- if was in irl select the that value --}}
                                <select name="year" class="form-control">
                                    <option value="">All Years</option>
                                    @for ($i = date('Y'); $i >= 2020; $i--)
                                        <option value="{{ $i }}"
                                            {{ request()->input('year') == $i ? 'selected' : '' }}>{{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <select name="month" class="form-control">
                                    <option value="">All Months</option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}"
                                            {{ request()->input('month') == $i ? 'selected' : '' }}>
                                            {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>


                        <div class="row my-3">
                            <div class="col-3">
                                <div class="input-group">
                                    <input type="date" class="form-control" name="start">

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group">
                                    <input type="date" class="form-control" name="end">

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>


            <div class="row g-3 mt-3">
                <div class="col-md-12 mb-3">
                    <div>
                        <h3>
                            <i class="fas fa-users"></i>
                            Vous visualisez les profits details
                        </h3>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12 mb-3">
                    <div>
                        <h4>
                            <i class="fas fa-users"></i>
                            Vous visualisez les payment details ({{ $payments->count() }})
                        </h4>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        @isset($payments)
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>name</th>
                                        <th>amount</th>
                                        <th>total</th>
                                        <th>remaining amount</th>
                                        <th>payment date</th>
                                        <th>bywho</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td>{{ $payment->user->name }}</td>
                                            <td>{{ $payment->amount_paid }}</td>
                                            <td>{{ $payment->amount_paid }}</td>
                                            <td>{{ $payment->remaining_amount }}</td>
                                            <td>{{ $payment->create }}</td>
                                            {{-- i dont like this solution --}}
                                            <td>
                                                @foreach ($admins as $admin)
                                                    @if ($admin['id'] === $payment->bywho)
                                                        {{ $admin['name'] }}
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>

                        @endisset
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12 mb-3">
                    <div>
                        <h4>
                            <i class="fas fa-users"></i>
                            Vous visualisez les spendings details (w{{ $spendings->count() }})
                        </h4>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        @isset($spendings)
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>name</th>
                                        <th>title</th>
                                        <th>amount_spent</th>

                                        <th>payment date</th>
                                        <th>bywho</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($spendings as $spending)
                                        <tr>
                                            <td>{{ $spending->user->name }}</td>
                                            <td>{{ $spending->title }}</td>
                                            <td>{{ $spending->amount_spent }}</td>
                                            <td>{{ $payment->created_at }}</td>
                                            {{-- i dont like this solution --}}
                                            <td>
                                                @foreach ($admins as $admin)
                                                    @if ($admin['id'] === $spending->bywho)
                                                        {{ $admin['name'] }}
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>

                        @endisset
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12 mb-3">
                    <div>
                        <h4>
                            <i class="fas fa-users"></i>
                            Vous visualisez les bills details ({{ $bills->count() }})
                        </h4>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        @isset($bills)
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>

                                        <th>title</th>
                                        <th>amount</th>

                                        <th>payment date</th>
                                        <th>bywho</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($bills as $bill)
                                        <tr>

                                            <td>{{ $bill->title }}</td>
                                            <td>{{ $bill->amount }}</td>
                                            <td>{{ $bill->created_at }}</td>
                                            {{-- i dont like this solution --}}
                                            <td>{{ $bill->user->name }}</td>
                                        </tr>
                                    @endforeach
                            </table>

                        @endisset
                    </div>
                </div>
            </div>



            <div class="row mb-3">

                <a href="#" class="btn btn-primary col-3">More info</a>
            </div>




        </section>

    </main>



@endsection
