@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Bosh sahifa</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">Bosh sahifa</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-muted fw-medium">Agentlar</p>
                            <h4 class="mb-0">{{$agents}}</h4>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-muted fw-medium">Turlar</p>
                            <h4 class="mb-0">$35, 723</h4>
                        </div>

                        <div class="flex-shrink-0 align-self-center ">
                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-archive-in font-size-24"></i>
                                                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-muted fw-medium">Aviachiptalar</p>
                            <h4 class="mb-0">$16.2</h4>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Bugungi klientlar {{now()->format('y-m-d')}}</h4>
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="form-check font-size-16 align-middle">
                                        <input class="form-check-input" type="checkbox" id="transactionCheck01">
                                        <label class="form-check-label" for="transactionCheck01"></label>
                                    </div>
                                </th>
                                <th class="align-middle">Order ID</th>
                                <th class="align-middle">Ismi</th>
                                <th class="align-middle">Kuni</th>
                                <th class="align-middle">Turi</th>
                                <th class="align-middle">Soni</th>
                                <th class="align-middle">Umumiy summa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="transactionCheck02">
                                            <label class="form-check-label" for="transactionCheck02"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#{{$transaction->id}}</a> </td>
                                    <td>{{$transaction->agent->firstname}}</td>
                                    <td>
                                       {{$transaction->created_at->format('Y-m-d')}}
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-soft-danger font-size-11">{{$transaction->category->name}}</span>
                                    </td>
                                    <td>
                                        {{$transaction->count}}
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-soft-success font-size-11">{{price_format($transaction->count*$transaction->category->price)}}</span>
                                    </td>
                                </tr>
                            @endforeach()

                            </tbody>
                        </table>
                    </div>
                    <ul class="pagination pagination-rounded justify-content-end mb-2">
                        {!! $transactions->links() !!}
                    </ul>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
    </div>
@endsection
