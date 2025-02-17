@extends('admin.layouts.layouts')
@section('admin_page_title')
    Manage Category - Admin Panel
@endsection
@section('admin_layout')
    <div class="row">
        <div class="col-lg-12">
            <div class="card w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">All Category</h5>
                </div>
                @if (session('message'))
                <div class="text-success text-bold">
                    {{session('message')}}
                </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="fw-bold">
                                    <th>S.N.</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($categories as $cat)
                                        <tr>
                                            <td>{{$cat->id}}</td>
                                            <td>{{$cat->category_name}}</td>
                                            <td>
                                                <form action={{route('delete.cat', $cat->id)}} method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="Delete" class="btn btn-danger w-25 mb-2">
                                                </form>
                                                <a href="{{route('edit.cat', $cat->id)}}" class="btn btn-primary w-25">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection