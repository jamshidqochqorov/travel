@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Agenlar </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item"><a href="{{route('agentIndex')}}">Agentlar</a></li>
                        <li class="breadcrumb-item"><a href="#">Tahrirlash</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-xl-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Tahrirlash</h4>

                    <form method="post" action="{{route('agentUpdate',$agent->id)}}">
                        @csrf
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label ">Ism</label>
                            <input value="{{ old('name',$agent->firstname) }}" type="text" class="form-control {{$errors->has('firstname') ? "parsley-error":"" }}" name="firstname" >
                            @if($errors->has('firstname') || 1)
                                <ul class="parsley-errors-list filled"  aria-hidden="false">
                                    <li class="parsley-required">{{ $errors->first('firstname') }}</li>
                                </ul>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label ">Familya</label>
                            <input value="{{ old('name',$agent->lastname) }}" type="text" class="form-control {{$errors->has('lastname') ? "parsley-error":"" }}" name="lastname" >
                            @if($errors->has('lastname') || 1)
                                <ul class="parsley-errors-list filled"  aria-hidden="false">
                                    <li class="parsley-required">{{ $errors->first('lastname') }}</li>
                                </ul>
                            @endif


                        </div>
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label ">Tel Nomer</label>
                            <input value="{{ old('name',$agent->phone) }}" type="text" class="form-control {{$errors->has('phone') ? "parsley-error":"" }}" name="phone" >
                            @if($errors->has('phone') || 1)
                                <ul class="parsley-errors-list filled"  aria-hidden="false">
                                    <li class="parsley-required">{{ $errors->first('phone') }}</li>
                                </ul>
                            @endif
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label ">Promo kod</label>
                                <input value="{{ old('name',$agent->promo_cod) }}" type="text" class="form-control {{$errors->has('promo_cod') ? "parsley-error":"" }}" name="promo_cod" >
                                @if($errors->has('promo_cod') || 1)
                                    <ul class="parsley-errors-list filled"  aria-hidden="false">
                                        <li class="parsley-required">{{ $errors->first('promo_cod') }}</li>
                                    </ul>
                                @endif


                            </div>
                        </div>

                        <div>
                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <a href="{{route('agentIndex')}}" class="btn text-muted d-none d-sm-inline-block btn-link">
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


