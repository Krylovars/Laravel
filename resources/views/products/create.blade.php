@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">

                        {{-- @include('partials.alerts') --}}

                        <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Product Name:</label>
                                <input type="name" class="form-control" id="name" placeholder="Enter name"
                                    name="name">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="name">price:</label>
                                <input type="name" class="form-control" id="price" placeholder="Enter price"
                                    name="price">
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="parent_category">Category:</label>
                                <select class="form-control" name="category">
                                    <option value="">Без категории</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('category') }}</span>
                            </div>

                            <div class="form-group">
                                <input type="file" name="image" accept="image/png, image/jpeg" />
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
