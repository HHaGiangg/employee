@extends('admin::layouts.master')
@section('content')
    <h1 class="flex-sm-fill h3 my-2">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Chỉ tiêu phòng ban
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="">Home</a>
                            </li>
                            <li class="breadcrumb-item">Chỉ tiêu phòng </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{ route('admin.get.list.target_department') }}">List</a>
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
            <!-- Contextual Table -->
            <div class="block block-rounded">
                <div class="block-header">
                    <h3 class="block-title">Target Table</h3>
                    <a href="{{ route('admin.get.create.target_department') }}">Tạo mới</a>
                </div>
                <div class="block-content block-content-full">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th style="width: 5%;">STT</th>
                                <th style="width: 15%;">Phòng Ban</th>
                                <th style="width: 15%;">Tên chỉ tiêu</th>
                                <th style="width: 15%;">Mô tả</th>
                                <th style="width: 10%;">Điểm</th>
                                <th style="width: 15%;">Trạng thái</th>
                                <th class="text-center" style="width: 100px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($target_departments)
                                @foreach($target_departments as $target)
                                    <tr>
                                        <td class="font-w600 font-size-sm">{{ $target->id }}</td>
                                        <td class="font-w600 font-size-sm">{{ $target->department()->pluck('name')->implode(' ') }}</td>
                                        <td class="font-size-sm">{{ $target->name }}</td>
                                        <td class="font-size-sm">{{ $target->description }}</td>
                                        <td class="font-size-sm"> {{ $target->point }}</td>
                                        <td class="d-none d-md-table-cell font-size-lg" style="text-align: center">
                                            @if($target -> status==1)
                                                    <a href="{{ route('admin.get.active.target_department', $target->id) }}" class="badge badge-danger">Đang xử lý</a>
                                                @else
                                                    <a href="{{ route('admin.get.active.target_department', $target->id) }}" class="badge badge-success">Đạt</a>
                                                @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.get.update.target_department', $target->id) }}" class="fa fa-fw fa-pencil-alt"></a>
                                                <a href="{{ route('admin.get.delete.target_department', $target->id) }}" class="js-delete-confirm fa fa-fw fa-times"></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END Contextual Table -->
        </div>
        <!-- END Partial Table -->
    </div>
@endsection
