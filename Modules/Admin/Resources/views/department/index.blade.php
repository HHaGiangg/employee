@extends('admin::layouts.master')
@section('content')
    <h1 class="flex-sm-fill h3 my-2">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Department Manager
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="">Home</a>
                            </li>
                            <li class="breadcrumb-item">Department</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{ route('admin.get.list.department') }}">List</a>
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
                <h2 class="block-title">Statistical tables</h2>
                <a href="{{ route('admin.get.create.department') }}">Create</a>
            </div>
            <div class="block-content">

                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                    <tr>
                        <th class="d-none d-md-table-cell" style="width: 10%;">Id</th>
                        <th class="d-none d-md-table-cell" style="width: 25%;">Name</th>
                        <th class="d-none d-md-table-cell" style="width: 30%;">Description</th>
{{--                        <th class="d-none d-md-table-cell" style="width: 20%;">Leader</th>--}}
                        <th class="d-none d-md-table-cell" style="width: 20%;">Status</th>
                        <th class="text-center" style="width: 70px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($departments))
                        @foreach($departments as $department)
                    <tr>
                        <td class="font-w600 font-size-sm">
                            {{ $department->id }}
                        </td>
                        <td class="d-none d-md-table-cell font-size-sm">{{ $department->name }}</td>
                        <td class="d-none d-md-table-cell font-size-sm">{{ $department->description }}</td>
{{--                        <td class="d-none d-md-table-cell font-size-sm">{{ $department->position()->pluck('name')->implode(' ') }}</td>--}}
                        <td class="d-none d-md-table-cell font-size-lg">
                            <span class="badge badge-success">
                            @if($department -> action==1)
                                    <a href="{{ route('admin.get.active.department', $department->id) }}" class="label label-info">Active</a>
                                @else
                                    <a href="{{ route('admin.get.active.department', $department->id) }}" class="label label-default">Cancel</a>
                                @endif
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('admin.get.update.department', $department->id) }}" class="fa fa-fw fa-pencil-alt"></a>
                                <a href="{{ route('admin.get.delete.department', $department->id) }}" class="js-delete-confirm fa fa-fw fa-times"></a>
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
    </div>
@endsection
