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
                            Vous visualisez les profits
                        </h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6 shadow-sm mb-5 bg-body rounded ml-3">
                    <div>
                        <div>
                            <canvas id="chart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-6 shadow-sm  mb-5 bg-body rounded">
                    <div>
                        <div>
                            <canvas id="ProfitChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4 shadow-sm  ml-2 p-3 mb-5 bg-body rounded">
                    <h3>paiement total</h3>
                    <h3 class="counter" data-end="{{ $totalPayment }}"></h3>
                </div>
                <div class="col-sm-4 shadow-sm p-3 ml-2 mb-5 bg-body rounded">
                    <h3>Dépenses totales</h3>
                    <h3 class="counter" data-end="{{ $totalSpending }}"></h3>
                </div>
                <div class="col-sm-4 shadow-sm p-3 mb-5 bg-body rounded">
                    <h3>Facture totale</h3>
                    <h4 class="counter" data-end="{{ $totalBills }}"></h4>
                </div>
            </div>
            <div class="row">
                <div class="shadow px-3 py-5 mb-5 bg-body rounded ">
                    <h3>Bénéfices totaux que vous faites : </h3>

                    <h2 class="counter {{ $total > 0 ? 'text-info' : 'text-danger' }}" data-end="{{ $total }}">
                    </h2>
                </div>
            </div>



            <div class="row mb-3">
                <a href="{{ route('superadmin.profitsDetails', [
                    'year' => request()->query('year'),
                    'month' => request()->query('month'),
                    'start' => request()->query('start'),
                    'end' => request()->query('end'),
                ]) }}"
                    class="btn btn-primary col-3">More info</a>




            </div>




        </section>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let monthlySumpayment = {{ json_encode($monthlySumpayment) }};
        let monthlySumSpending = {{ json_encode($monthlySumSpending) }};
        let monthlySumBills = {{ json_encode($monthlySumBills) }};

        function addArrays(arr1, arr2) {
            const result = [];

            for (let i = 0; i < arr1.length; i++) {
                const sum = arr1[i] + arr2[i];
                result.push(sum);
            }

            return result;
        }

        function subArrays(arr1, arr2) {
            const result = [];

            for (let i = 0; i < arr1.length; i++) {
                const sum = arr1[i] - arr2[i];
                result.push(sum);
            }

            return result;
        }

        const depance = addArrays(monthlySumSpending, monthlySumBills);
        const profit = subArrays(monthlySumpayment, depance);

        const ctx = document.getElementById("chart");
        const ctx2 = document.getElementById("ProfitChart");

        new Chart(ctx, {
            type: "line",
            data: {
                labels: [
                    "Janvier",
                    "Février",
                    "Mars",
                    "Avril",
                    "Mai",
                    "Juin",
                    "Juillet",
                    "Aout",
                    "Septembre",
                    "Octobre",
                    "Novembre",
                    "Décembre",
                ],
                datasets: [{
                        label: "Payment",
                        data: monthlySumpayment,
                        borderWidth: 2,
                    },
                    {
                        label: "Expense",
                        data: depance,
                        borderWidth: 2,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: [
                    "Janvier",
                    "Février",
                    "Mars",
                    "Avril",
                    "Mai",
                    "Juin",
                    "Juillet",
                    "Aout",
                    "Septembre",
                    "Octobre",
                    "Novembre",
                    "Décembre",
                ],
                datasets: [{
                    label: "Profits",
                    data: profit,
                    borderWidth: 2,
                }],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    </script>



@endsection
