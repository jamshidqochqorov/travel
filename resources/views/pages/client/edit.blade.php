@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Klentlar </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item"><a href="{{route('clientIndex')}}">Clentlar</a></li>
                        <li class="breadcrumb-item active"><a href="#">Tahrirlash</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-xl-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Tahrirlash</h4>

                    <form method="post" action="{{route('clientUpdate',$client->id)}}">
                        @csrf
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label ">Promo Kod</label>
                            <select name="agent_id" class="select2 form-control select2-multiple " >
                                @foreach($agents as $agent)
                                    <option value="{{ $agent->id }}" {{$agent->id==$client->agent_id?'selected':''}}>{{ $agent->promo_cod }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('agent_id') || 1)
                                <ul class="parsley-errors-list filled"  aria-hidden="false">
                                    <li class="parsley-required">{{ $errors->first('agent_id') }}</li>
                                </ul>
                            @endif
                        </div>

                        <div class="mb-3" >
                            <label class="form-label">Kategorya</label>
                            <select name="category_id" class="select2 form-control select2-multiple " >
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{$category->id == $client->category_id?"selected":''}}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category_id') || 1)
                                <ul class="parsley-errors-list filled"  aria-hidden="false">
                                    <li class="parsley-required">{{ $errors->first('category_id') }}</li>
                                </ul>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label ">Soni</label>
                            <input value="{{$client->count}}" type="text" class="form-control {{$errors->has('count') ? "parsley-error":"" }}" name="count" >
                            @if($errors->has('count') || 1)
                                <ul class="parsley-errors-list filled"  aria-hidden="false">
                                    <li class="parsley-required">{{ $errors->first('count') }}</li>
                                </ul>
                            @endif
                        </div>



                        <div>
                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <a href="{{route('clientIndex')}}" class="btn text-muted d-none d-sm-inline-block btn-link">
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


