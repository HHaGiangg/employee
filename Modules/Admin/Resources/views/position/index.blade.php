@extends('admin::layouts.master')
@section('content')
    <h1 class="flex-sm-fill h3 my-2">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Employee Position Manager
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="">Home</a>
                            </li>
                            <li class="breadcrumb-item">Employee Position</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{ route('admin.get.list.position') }}">List</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </h1>
    <div class="content">
        <!-- Partial Table -->
        <div class="block block-rounded">
            <div class="block-header">
                <h2 class="block-title">Position tables</h2>
                <a href="{{ route('admin.get.create.position') }}">Create</a>
            </div>
            <div class="block-content">

                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                    <tr>
                        <th class="d-none d-md-table-cell" style="width: 13%;">Id</th>
                        <th class="d-none d-md-table-cell" style="width: 30%;">Name</th>
                        <th class="d-none d-md-table-cell" style="width: 13%;">Title</th>
                        <th class="d-none d-md-table-cell" style="width: 25%;">Description</th>
                        <th class="text-center" style="width: 70px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($positions))
                        @foreach($positions as $position)
                            <tr>
                                <td class="font-w600 font-size-sm">
                                    {{ $position->id }}
                                </td>
                                <td class="d-none d-md-table-cell font-size-sm">{{ $position->name }}</td>
                                <td class="d-none d-md-table-cell font-size-sm">{{ $position->title }}</td>
                                <td class="d-none d-sm-table-cell">{{ $position->description}}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.get.update.position', $position->id) }}" class="fa fa-fw fa-pencil-alt"></a>
                                        <a href="{{ route('admin.get.delete.position', $position->id) }}" class="js-delete-confirm fa fa-fw fa-times"></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Partial Table -->
{{--        <nav aria-label="Projects Search Navigation">--}}
{{--            <ul class="pagination pagination-sm">--}}
{{--                <li class="page-item">--}}
{{--                    <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-label="Previous">--}}
{{--                        Prev--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="page-item active">--}}
{{--                    <a class="page-link" href="javascript:void(0)">1</a>--}}
{{--                </li>--}}
{{--                <li class="page-item">--}}
{{--                    <a class="page-link" href="javascript:void(0)">2</a>--}}
{{--                </li>--}}
{{--                <li class="page-item">--}}
{{--                    <a class="page-link" href="javascript:void(0)">3</a>--}}
{{--                </li>--}}
{{--                <li class="page-item">--}}
{{--                    <a class="page-link" href="javascript:void(0)">4</a>--}}
{{--                </li>--}}
{{--                <li class="page-item">--}}
{{--                    <a class="page-link" href="javascript:void(0)" aria-label="Next">--}}
{{--                        Next--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </nav>--}}
{{--        <ul class="pagination pagination-sm">--}}
{{--            {!! $positions->links() !!}--}}
{{--        </ul>--}}
    </div>

@endsection
