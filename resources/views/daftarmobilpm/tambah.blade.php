@extends('layoutpm.layout')
@section('title', 'Tambah Mobil')
@section('content')

<style>
    .card {
        margin-top: 100px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <span class="h3">Tambah Mobil</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('daftarmobilpm.simpan')}}" enctype="multipart/form-data">
                        <div class="row">
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Id Pemilik</label>
                                    <input type="text" class="form-control mb-3" name="id_pemilik_mobil">
                                    <label>Tipe Mobil</label>
                                    <select name="tipe_mobil" class="form-control mb-3">
                                        <option value="sedan">Sedan</option>
                                        <option value="suv">SUV</option>
                                        <option value="truck">Truk</option>
                                        <option value="minibus">Minibus</option>
                                    </select>
                                    <label>Merk Mobil</label>
                                    <select name="merk_mobil" class="form-control mb-3">
                                        <option value="toyota">Toyota</option>
                                        <option value="daihatsu">Daihatsu</option>
                                        <option value="suzuki">Suzuki</option>
                                        <option value="mitsubishi">Mitsubishi</option>
                                        <option value="nissan">Nissan</option>
                                        <option value="isuzu">Isuzu</option>
                                        <option value="bmw">BMW</option>
                                        <option value="mersedes-benz">Mersedes Benz</option>
                                        <option value="wuling">Wuling</option>
                                        <option value="honda">Honda</option>
                                    </select>
                                    <label>Foto Mobil</label>
                                    <input type="file" class="form-control mb-3" name="foto_mobil">
                                    <label>Harga</label>
                                    <input type="text" class="form-control mb-3" name="harga_mobil" placeholder="Masukkan harga">
                                    @csrf
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>