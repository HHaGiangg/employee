@extends('admin::layouts.master')
@section('content')
    <h1 class="flex-sm-fill h3 my-2">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Employee Department Manager
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="">Home</a>
                            </li>
                            <li class="breadcrumb-item">Employee Department</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{ route('admin.get.list.employee') }}">List</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </h1>
    <div class="content">
        <!-- Partial Table -->
        <div class="col-12">
            <!-- Contextual Table -->
            <div class="block block-rounded">
                <div class="block-header">
                    <h3 class="block-title">Employees Table</h3>
                    <a href="{{ route('admin.get.create.employee') }}">Create</a>
                </div>
                <div class="block-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th class="text-center" style="width: 100px;">
                                    <i class="far fa-user"></i>
                                </th>
                                <th style="width: 20%;">Tên Nhân Viên</th>
                                <th style="width: 15%;">Ngày sinh</th>
                                <th style="width: 20%;">Email</th>
                                <th style="width: 15%;">Phòng</th>
                                <th style="width: 15%;">Vị trí</th>
                                <th style="width: 20%;">Năm kinh nghiệm</th>
                                <th class="text-center" style="width: 100px;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($employees)
                                @foreach($employees as $values)
                                    <tr>
                                        <td>{{ $values->id }}</td>
                                        <td class="text-center">
                                            <img class="img-avatar img-avatar48" src="{{asset('storage/uploads/' . $values->avatar)}}" alt="">
                                        </td>
                                        <td class="font-w600 font-size-sm">{{$values->name}}</td>
                                        <td class="font-w600 font-size-sm">{{$values->dob}}</td>
                                        <td class="font-size-sm"> {{$values->email}}</td>
{{--                                        <td class="font-w600 font-size-sm">{{$values->position->title}}</td>--}}
{{--                                        <td class="font-w600 font-size-sm">{{$values->department->name}}</td>--}}
                                        <td class="d-none d-md-table-cell font-size-sm">{{ $values->department()->pluck('name')->implode(' ') }}</td>
                                        <td class="d-none d-md-table-cell font-size-sm">{{ $values->position()->pluck('title')->implode(' ') }}</td>
                                        <td class="font-size-sm" style="text-align: center">{{$values->exp_year}}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('ajax.admin.get.detail.employee', $values->id) }}" class="js-preview-employee fa fa-fw fa-eye"></a>
                                                <a href="{{ route('admin.get.update.employee', $values->id) }}" class="fa fa-fw fa-pencil-alt"></a>
                                                <a href="{{ route('admin.get.delete.employee', $values->id) }}" class="js-delete-confirm fa fa-fw fa-times"></a>
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
    <div class="modal" id="modal-block-large" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Nhật ký nhân viên</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content font-size-sm">
                        <div class="col-xl-12">
                            <!-- Default Table -->
                            <div class="block block-rounded">
                                <div class="block-header">
                                    <h3 class="block-title">Thông tin nhân viên</h3>
                                </div>
                                <div class="block-content">
                                    <div class="col-xl-20">
{{--                                   @include('admin::components.detail_employee')--}}
                                    </div>
                                </div>
                            </div>
                            <!-- END Default Table -->
                        </div>
                    </div>
                    <div class="block-content block-content-full text-right border-top">
                        <button type="button" class="btn btn-alt-primary mr-1" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
