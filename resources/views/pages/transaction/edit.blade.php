@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">To'lovlar </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active"><a href="#">Tahrirlash</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-xl-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Tahrirlash</h4>

                    <form method="post" action="{{route('transactionUpdate',$transaction->id)}}">
                        @csrf
                        <div class="mb-3">
                            <label for="form row-firstname-input" class="form-label ">Agent</label>
                            <input disabled  type="text"  class="form-control" value="{{$transaction->agent->firstname}}" >
                            <input   type="hidden"  name="agent_id" class="form-control" value="{{$transaction->agent->id}}" >
                        </div>
                        <div class="mb-3">
                            <label for="form row-firstname-input" class="form-label ">Narx</label>
                            <input value="{{ old('price',$transaction->price) }}" type="number" name="price" class="form-control" >
                            @if($errors->has('price') || 1)
                                <ul class="parsley-errors-list filled"  aria-hidden="false">
                                    <li class="parsley-required">{{ $errors->first('price') }}</li>
                                </ul>
                            @endif
                        </div><div class="mb-3">
                            <label for="form row-firstname-input" class="form-label ">Komment</label>
                            <input value="{{ old('comment',$transaction->comment) }}" type="text" name="comment" class="form-control" >
                            @if($errors->has('comment') || 1)
                                <ul class="parsley-errors-list filled"  aria-hidden="false">
                                    <li class="parsley-required">{{ $errors->first('comment') }}</li>
                                </ul>
                            @endif
                        </div>


                        <div>
                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <a href="{{redirect()->back()}}" class="btn text-muted d-none d-sm-inline-block btn-link">
                                        <i class="mdi mdi-arrow-left me-1"></i>Orqaga</a>
                                </div> <!-- end col -->
                                <div class="col-sm-6">
                                    <div class="text-end">
                                        <button class="btn btn-success">
                                            <i class="mdi mdi-truck-fast me-1"></i>Saqlash</button>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
    </div>
@endsection


