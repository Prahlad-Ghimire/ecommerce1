@extends('admin.layouts.layouts')
@section('admin_page_title')
Create Category - Admin Panel
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Create Category</h5>
            </div>
            <div class="card-body">
                @if ($errors->any())

                <div class="text-danger fw-bold text-capitalize">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                
                @endif
                @if (session('message'))
                <div class="text-success text-bold">
                    {{session('message')}}
                </div>
                @endif
                <form action="{{route('store.cat')}}" method="POST">
                    @csrf
                    <label for="category_name" class="fw-bold mb-1">Category Name</label>
                    <input type="text" class="form-control mt-1" placeholder="Computer" name="category_name">

                    <button type="submit" class="btn btn-primary mt-2">Add Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection