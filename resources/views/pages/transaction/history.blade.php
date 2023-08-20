@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">To'lov</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item"><a href="#">To'lov</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4">
            <div class="card overflow-hidden">
                <div class="bg-primary bg-soft">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">Agent {{$agent->lastname}} {{$agent->firstname}} !</h5>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="/assets/images/profile-img.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="avatar-md profile-user-wid mb-4">
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="pt-4">

                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="font-size-15">{{$agent->clients->count()}}</h5>
                                        <p class="text-muted mb-0">Klent soni</p>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="font-size-15">{{price_format($sum)}}</h5>
                                        <p class="text-muted mb-0">Tushgan summa</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title mb-4">To'lov qismi</h4>

                    <form action="{{route('transactionCreate')}}" method="post">
                        @csrf
                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Summa</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="horizontal-firstname-input" name="price" placeholder=" Summa ">
                                @if($errors->has('price') || 1)
                                    <ul class="parsley-errors-list filled"  aria-hidden="false">
                                        <li class="parsley-required">{{ $errors->first('price') }}</li>
                                    </ul>
                                @endif
                            </div>

                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Komment</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="horizontal-firstname-input" name="comment" placeholder=" Komment ">
                            </div>
                            <input name="agent_id" type="hidden" value="{{$agent->id}}">
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-6">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Jo'natish</button>
                                </div>
                            </div>
                            <div class="col-sm-6">

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Malumotlar</h4>
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                            <tr>

                                <th class="align-middle">Order ID</th>
                                <th class="align-middle">Kun</th>
                                <th class="align-middle">Turi</th>
                                <th class="align-middle">Soni</th>
                                <th class="align-middle">Umumiy summa</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($agent->clients as $client)

                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#{{$client->id}}</a> </td>
                                    <td>{{$client->created_at->format('y-m-d')}}</td>
                                    <td>{{$client->category->name}}</td>
                                    <td>
                                        {{$client->count}}
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-soft-success font-size-11"> {{price_format($client->count*$client->category->price)}}</span>
                                    </td>
                                </tr>
                            @endforeach()
                            <tr >
                                <td></td>
                                <td></td>
                                <td></td>
                                <td  >
                                    Tushgan summa
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-soft-danger font-size-11"> {{price_format($sum)}}</span>

                                </td>
                            </tr>
                            <tr >
                                <td></td>
                                <td></td>
                                <td></td>
                                <td  >
                                    Berilgan summa
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-soft-warning font-size-11"> {{price_format($transactions_sum)}}</span>

                                </td>
                            <tr >
                                <td></td>
                                <td></td>
                                <td></td>
                                <td  >
                                    Agentga berilishi kerak bo'lgan summa
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-soft-primary font-size-11"> {{price_format($sum-$transactions_sum)}}</span>

                                </td>
                            </tr>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="row justify-content-end mt-2">
                        <div class="col-sm-3">
                            <div>
                                <form method="post" action="{{route('agentDestroy',$agent->id)}}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button onclick="return myFunction()" type="submit" class="btn btn-danger w-md">Agenti O'chirish</button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <div class="search-box me-2 mb-2 d-inline-block">
                                        <div class="position-relative">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-editable table-nowrap align-middle table-edits">
                                    <thead>
                                    <tr style="cursor: pointer;">
                                        <th>ID</th>
                                        <th>Agent</th>
                                        <th>Summa</th>
                                        <th>Komment</th>
                                        <th>Yaratilgan sana</th>
                                        <th>Amallar</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($transactions as $transaction)
                                        <tr data-id="2" style="cursor: pointer;">
                                            <td>#{{$transaction->id}}</td>
                                            <td>{{$transaction->agent->firstname}}</td>
                                            <td>
                                                <span class="badge badge-pill badge-soft-danger font-size-11">{{$transaction->price}}</span>

                                            </td>
                                            <td>
                                                {{$transaction->comment}}
                                            </td>
                                            <td >{{$transaction->created_at->format('y-m-d')}}</td>

                                            <td>
                                                @can('transaction.delete')
                                                    <form method="post" action="{{route('transactionDestroy',$transaction->id)}}">
                                                        @csrf
                                                        @can('transaction.edit')
                                                            <a href="{{ route('transactionEdit',$transaction->id) }}" class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        @endcan
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button  onclick="return myFunction()" class="btn btn-outline-danger btn-sm edit" title="Delete">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>

                                                @endcan()
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                                                <ul class="pagination pagination-rounded justify-content-end mb-2">
                                                    {!! $transactions->links() !!}
                                                </ul>
                        </div>
                    </div>
                </div>
            </div>
@endsection
