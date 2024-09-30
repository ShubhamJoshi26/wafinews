@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Sub') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('All Sub') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('/news/auth/admin/brand.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('admin.Create new') }}
                    </a>
                </div>
            </div>

            <div class="card-body">


                @php
                    $brands = \App\Models\Brand::orderByDesc('id')->get();
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
                                        <th>{{ __('Image') }}</th>
                                        <th>{{ __('admin.Name') }}</th>
                                        <th>{{ __('admin.In Nav') }}</th>
                                        <th>{{ __('admin.Status') }}</th>
                                        <th>{{ __('admin.Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $brand)
                                        <tr>
                                            <td>{{ $brand->id }}</td>
                                            <td><img src="{{ asset($brand->image) }}" alt="" width="100px"></td>
                                            <td>{{ $brand->name }}</td>
                                            <td>
                                                @if ($brand->show_at_nav == 1)
                                                    <span class="badge badge-primary">{{ __('admin.Yes') }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ __('admin.No') }}</span>
                                                @endif

                                            </td>
                                            <td>
                                                @if ($brand->is_active == 1)
                                                    <span class="badge badge-success">{{ __('admin.Yes') }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ __('admin.No') }}</span>
                                                @endif

                                            </td>


                                            <td>
                                                <a href="{{ route('/news/auth/admin/brand.edit', $brand->id) }}"
                                                    class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('/news/auth/admin/brand.destroy', $brand->id) }}"
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
