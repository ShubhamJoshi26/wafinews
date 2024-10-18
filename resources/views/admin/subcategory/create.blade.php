@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Sub Category') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Create Sub Category') }}</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('/news/auth/admin/subcategory.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">{{ __('admin.Name') }}</label>
                        <input name="name" type="text" class="form-control" id="name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Category') }}</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value=""></option>
                            @foreach ($allCategory as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.Status') }}</label>
                        <select name="is_active" id="" class="form-control">
                            <option value="1">{{ __('admin.Active') }}</option>
                            <option value="0">{{ __('admin.Inactive') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Meta Title') }}</label>
                        <input name="metatitle" type="text" class="form-control" id="metatitle">
                        @error('metatitle')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Meta Keywords') }}</label>
                        <input name="metakeywords" type="text" class="form-control" id="metakeywords">
                        @error('metakeywords')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Meta Description') }}</label>
                        <input name="metadescription" type="text" class="form-control" id="metadescription">
                        @error('metadescription')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('admin.Create') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
