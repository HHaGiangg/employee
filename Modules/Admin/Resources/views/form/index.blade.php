@extends('admin::layouts.master')
@section('content')
    <h1 class="flex-sm-fill h3 my-2">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Đơn Nghỉ Phép
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="">Home</a>
                            </li>
                            <li class="breadcrumb-item">Đơn Nghỉ </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{ route('admin.get.list.form') }}">List</a>
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
                    <h3 class="block-title">Form Table</h3>
{{--                    <a href="#">Create</a>--}}
                </div>
                <div class="block-content block-content-full">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-vcenter">
                            <thead>
                            <tr>
{{--                                <th style="width: 5%;">STT</th>--}}
                                <th style="width: 15%;">Nhân Viên</th>
                                <th style="width: 15%;">Phòng Ban</th>
                                <th style="width: 15%;">Loại Đơn</th>
                                <th style="width: 10%;">Lý Do</th>
                                <th style="width: 15%;">Mô tả</th>
                                <th style="width: 15%;">Bắt đầu</th>
                                <th style="width: 18%;">Kết thúc</th>
                                <th class="text-center" style="width: 100px;">Status</th>
                                <th class="text-center" style="width: 100px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($forms)
                                @foreach($forms as $form)
                                    <tr>
                                        <td class="font-w600 font-size-sm">{{ $form->employee->name }}</td>
                                        <td class="font-w600 font-size-sm">{{ $form->department->name }}</td>
                                        <td class="font-size-sm"> {{ $form->name }}</td>
                                        <td class="font-size-sm"> {{ $form->reason }}</td>
                                        <td class="font-size-sm"> {{ $form->description }}</td>
                                        <td class="font-size-sm"> {{ $form->start_time }}</td>
                                        <td class="font-size-sm"> {{ $form->end_time }}</td>
                                        <td>
                                            <span class="badge badge-{{ $form->getStatus($form->status)['classname'] }}">
                                                {{ $form->getStatus($form->status)['name'] }}
                                            </span>
                                        </td>
{{--                                        <td class="font-size-sm"> {{ $form->status }}</td>--}}
                                        <td>
{{--                                            <div class="col-sm-4 col-xl-2">--}}
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-alt-success dropdown-toggle" id="dropdown-default-alt-success" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Tùy Chọn
                                                    </button>
                                                    <div class="dropdown-menu font-size-sm" aria-labelledby="dropdown-default-alt-success" style="">
                                                        <a class="dropdown-item" href="{{route('admin.get.action.form',['process', $form->id])}}">Tiếp nhận</a>
                                                        <a class="dropdown-item" href="{{route('admin.get.action.form',['success', $form->id])}}">Đồng ý</a>
                                                        <a class="dropdown-item" href="{{route('admin.get.action.form',['cancel', $form->id])}}">Hủy</a>
                                                    </div>
                                                </div>
{{--                                            </div>--}}
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
