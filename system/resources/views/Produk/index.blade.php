@extends('Template.base')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        Filter
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/Produk/filter')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="" class="control-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{$nama ?? "" }}">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Stok</label>
                            <input type="text" class="form-control" name="stock" value="{{$stock ?? "" }}">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Harga Min</label>
                                    <input type="text" class="form-control" name="hargaMin" value="{{$hargaMin ?? "" }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Harga Max</label>
                                    <input type="text" class="form-control" name="hargaMax" value="{{$hargaMax ?? "" }}">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-dark float-right"><i class="fa fa-search"></i> Filter </button>
                    </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Data Product
                        <a href="{{url('admin/Produk/create')}}" class="btn btn-dark float-right"><i class="fa fa-plus"></i> Tambah Data </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-datatable">
                            <thead>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Stok</th>
                            </thead>
                            <tbody>
                                @foreach($list_produk as $Product)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{url('admin/Produk', $Product->id)}}" class="btn btn-dark"><i class="fa fa-info"></i></a>
                                            <a href="{{url('admin/Produk', $Product->id)}}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            @include('Template.utils.delete', ['url' => url('admin/Produk', $Product->id)])
                                        </div>
                                    </td>
                                    <td>{{$Product->nama}}</td>
                                    <td>{{$Product->harga}}</td>
                                    <td>{{$Product->stock}}</td>
                                </tr>
                                @endforeach                          
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
