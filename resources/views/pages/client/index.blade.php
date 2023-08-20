@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Klentlar</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item"><a href="#">Klentlar</a></li>
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
                            @can('role.add')
                                <div class="text-sm-end">
                                    <a href="{{route('clientAdd')}}" type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Qo'shish</a>
                                </div>
                            @endcan()
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-editable table-nowrap align-middle table-edits">
                            <thead>
                            <tr style="cursor: pointer;">
                                <th>ID</th>
                                <th>Agent</th>
                                <th>Kategorya</th>
                                <th>Soni</th>
                                <th>Jammi summa</th>
                                <th>Yaratilgan sana</th>
                                <th>Amallar</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($clients as $client)
                                <tr data-id="2" style="cursor: pointer;">
                                    <td>#{{$client->id}}</td>
                                    <td>{{$client->agent->firstname}}</td>
                                    <td>
                                        <span class="badge badge-pill badge-soft-danger font-size-11">{{$client->category->name}}</span>

                                     </td>
                                    <td>
                                        <button type="button" class="btn btn-{{random()}} btn-rounded waves-effect waves-light">  {{$client->count}}</button>

                                    </td>
                                    <td>
                                        {{price_format($client->count*$client->category->price)}}
                                    </td>
                                    <td >{{$client->created_at->format('y-m-d')}}</td>

                                    <td>
                                        @can('client.delete')
                                            <form method="post" action="{{route('clientDestroy',$client->id)}}">
                                                @csrf
                                                @can('client.edit')
                                                    <a href="{{ route('clientEdit',$client->id) }}" class="btn btn-outline-secondary btn-sm edit" title="Edit">
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
                        {!! $clients->links() !!}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
