@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Brand') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Update Brand') }}</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('auth.admin.brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">{{ __('admin.Name') }}</label>
                        <input name="name" value="{{ $brand->name }}" type="text" class="form-control" id="name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.Image') }}</label>
                        <input name="image" type="file" class="form-control" id="image">
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.Show at Nav') }} </label>
                        <select name="show_at_nav" id="" class="form-control">
                            <option {{ $brand->show_at_nav === 0 ? 'selected' : '' }} value="0">{{ __('admin.No') }}</option>
                            <option {{ $brand->show_at_nav === 1 ? 'selected' : '' }} value="1">{{ __('admin.Yes') }}</option>
                        </select>
                        @error('defalut')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.Status') }}</label>
                        <select name="is_active" id="" class="form-control">
                            <option {{ $brand->is_active === 1 ? 'selected' : '' }} value="1">{{ __('admin.Active') }}</option>
                            <option {{ $brand->is_active === 0 ? 'selected' : '' }} value="0">{{ __('admin.Inactive') }}</option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('admin.Update') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
