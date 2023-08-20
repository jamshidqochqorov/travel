@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Agentlar</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item"><a href="#">Agentlar</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

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
                        <div class="col-sm-8">
                            @can('agent.add')
                                <div class="text-sm-end">
                                    <a href="{{route('agentAdd')}}" type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="bx bx-user-plus"></i> Qo'shish</a>
                                </div>
                            @endcan()
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-editable table-nowrap align-middle table-edits">
                            <thead>
                           <form method="get" action="{{route('agentIndex')}}">
                               <tr style="cursor: pointer;">
                                   <th></th>
                                   <th>
                                       <div class="search-box  d-inline-block">
                                           <div class="position-relative">
                                               <input type="text" class="form-control" placeholder="Familya..." name="lastname" value="{{old('lastname',$request->lastname)}}">
                                           </div>
                                       </div>
                                   </th>
                                   <th>
                                       <div class="search-box  d-inline-block">
                                           <div class="position-relative">
                                               <input type="text" class="form-control" placeholder="Nomer..." name="phone" value="{{old('phone',$request->phone)}}">
                                           </div>
                                       </div>
                                   </th>
                                   <th>
                                       <div class="search-box  d-inline-block">
                                           <div class="position-relative">
                                               <input type="text" class="form-control" placeholder=" Promo cod..." name="promo_cod" value="{{old('promo_cod',$request->promo_cod)}}">
                                           </div>
                                       </div>
                                   </th>
                                   <th>
                                       <div class="text-sm-end">
                                           <button  class="btn btn-outline-warning btn-rounded waves-effect waves-light mb-2 me-2"><i class="bx bx-search"></i> Qidirish</button>
                                           <a href="{{route('agentIndex')}}" type="button" class="btn btn-outline-danger btn-rounded waves-effect waves-light mb-2 me-2"><i class="bx bx-trash"></i> Tozalash</a>

                                       </div>
                                   </th>
                               </tr>
                           </form>
                            <tr style="cursor: pointer;">
                                <th>ID</th>
                                <th>Ism Familya</th>
                                <th>Tel Nomer</th>
                                <th>Promo Kod</th>
                                <th>Amallar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($agents as $agent)
                                <tr style="cursor: pointer;">
                                    <td>#{{$agent->id}}</td>
                                    <td><a href="{{route('transactionHistory',$agent->id)}}">{{$agent->firstname}}  {{$agent->lastname}}</a></td>
                                    <td >{{$agent->phone}}</td>
                                    <td><span class="badge badge-pill badge-soft-success font-size-11">{{$agent->promo_cod}}</span></td>
                                    <td>
                                        @can('agent.delete')
                                            <form method="post" action="{{route('agentDestroy',$agent->id)}}">
                                                @csrf
                                                @can('agent.edit')
                                                    <a href="{{ route('agentEdit',$agent->id) }}" class="btn btn-outline-secondary btn-sm edit" title="Edit">
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
                                            {!! $agents->links() !!}
                                        </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
