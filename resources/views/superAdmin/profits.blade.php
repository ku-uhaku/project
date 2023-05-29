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
                        <div class="col">
                            <div class="input-group">
                                <select name="day" id="day" class="form-control">
                                    <option value=""> Day</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}"
                                            {{ request()->input('day') == $i ? 'selected' : '' }}>
                                            {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <select name="admin" id="admin" class="form-control">
                                    <option value=""> admin</option>
                                    @foreach ($admins as $admin)
                                        <option value="{{ $admin->id }}"
                                            {{ request()->input('admin') == $admin->id ? 'selected' : '' }}>
                                            {{ $admin->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="row my-3">
                            <div class="col-3">
                                <div class="input-group">
                                    <input type="date" class="form-control">

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group">
                                    <input type="date" class="form-control">

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
                <div class="col-md-12">
                    <div>
                        <h5>
                            <i class="fas fa-users"></i>
                            Vous visualisez les profits ({{ isset($results) ? $profits->count() : '0' }})
                        </h5>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4 shadow-sm p-3 mb-5 bg-body rounded">
                    <h3>total payment</h3>
                    <h3 class="counter" data-end="{{ $totalPayment }}"></h3>
                </div>
                <div class="col-sm-4 shadow-sm p-3 ml-2 mb-5 bg-body rounded">
                    <h3>total Spending</h3>
                    <h3 class="counter" data-end="{{ $totalSpending }}"></h3>
                </div>
                <div class="col-sm-4 shadow-sm p-3 mb-5 bg-body rounded">
                    <h3>total bill</h3>
                    <h4 class="counter" data-end="{{ $totalBills }}"></h4>
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-5 shadow p-3 mb-5 bg-body rounded">
                    <h3>total</h3>

                    <h2 class="counter {{ $total > 0 ? 'text-info' : 'text-danger' }}" data-end="{{ $total }}">
                    </h2>
                </div>
            </div>

            <div class="row">
                <div class="col-6 shadow-sm p-3 mb-5 bg-body rounded">
                    <canvas id="lineChart"></canvas>
                </div>
            </div>




        </section>
    </main>
@endsection
