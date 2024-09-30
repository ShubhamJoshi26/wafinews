@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Sub Category') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('All Sub Category') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('auth.admin.subcategory.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('admin.Create new') }}
                    </a>
                </div>
            </div>

            <div class="card-body">


                @php
                    $subcategories = \App\Models\SubCategory::with('category')->orderByDesc('id')->get();
                    // dd($subcategories->toArray());
                @endphp
                <div class="tab-pane fade show" id="home" role="tabpanel" aria-labelledby="home-tab2">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-brand">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>{{ __('admin.Name') }}</th>
                                        <th>{{ __('Category Name') }}</th>
                                        <th>{{ __('admin.Status') }}</th>
                                        <th>{{ __('admin.Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subcategories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{$category->category->name}}</td>
                                            <td>
                                                @if ($category->is_active == 1)
                                                    <span class="badge badge-success">{{ __('admin.Yes') }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ __('admin.No') }}</span>
                                                @endif

                                            </td>


                                            <td>
                                                <a href="{{ route('auth.admin.subcategory.edit', $category->id) }}"
                                                    class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('auth.admin.subcategory.destroy', $category->id) }}"
                                                    class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // $("#table-brand").dataTable({
        //     "columnDefs": [{
        //         "sortable": false,
        //         "targets": [2, 3]
        //     }]
        // });
    </script>
@endpush
