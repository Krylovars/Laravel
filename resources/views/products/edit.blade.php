@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">

                        {{-- @include('partials.alerts') --}}

                        <form action="{{ route('admin.products.update', ['product' => $product->id]) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-group">
                                <label for="name">product Name:</label>
                                <input type="name" class="form-control" id="name" name="name"
                                    value="{{ $product->name }}">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="name">product price:</label>
                                <input type="name" class="form-control" id="name" name="price"
                                    value="{{ $product->price }}">
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="pwd">Parent Category:</label>
                                <select class="form-control" name="category">
                                    @foreach ($product_categories as $product_category)
                                        @if ($product_category->id)
                                            <option value="{{ $product_category->id }}">{{ $product_category->name }}
                                            </option>
                                        @else
                                            <option value="0">нету</option>
                                        @endif
                                    @endforeach

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('category') }}</span>
                            </div>


                            <p><input type="checkbox" name="image_checkbox" value="1">Изменить картинку</p>

                            <div class="form-group">
                                <input type="file" name="image" accept="image/png, image/jpeg"/>
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
