@extends('admin::layouts.master')
@section('content')
    <h1 class="flex-sm-fill h3 my-2">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Chỉ tiêu nhân viên
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="">Home</a>
                            </li>
                            <li class="breadcrumb-item">Chỉ tiêu nhân viên </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{ route('admin.get.list.target_employee') }}">List</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </h1>
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header">
                <h2 class="block-title"> Bảng chỉ tiêu nhân viên</h2>
                <a href="{{ route('admin.get.create.target_employee') }}">Tạo</a>
            </div>
            <div class="block-content block-content-full">
                <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12"><table class="table table-bordered table-striped table-vcenter js-dataTable-simple dataTable no-footer" id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info">
                                <div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="DataTables_Table_1_length"><label><select name="DataTables_Table_1_length" aria-controls="DataTables_Table_1" class="form-control form-control-sm"><option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="20">20</option></select></label></div></div><div class="col-sm-12 col-md-6"><div id="DataTables_Table_1_filter" class="dataTables_filter"><label><input type="search" class="form-control form-control-sm" placeholder="Search.." aria-controls="DataTables_Table_1"></label></div></div></div>
                                <thead>
                                <tr role="row">
                                    <th style="width: 5%;">STT</th>
                                    <th style="width: 10%;">Chỉ tiêu phòng</th>
                                    <th style="width: 5%;">Tên nhân <viên></viên></th>
                                    <th style="width: 8%;">Tên chỉ tiêu</th>
                                    <th style="width: 5%;">Điểm</th>
                                    <th style="width: 5%;">Trạng Thái</th>
                                    <th style="width: 5%;" >Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($targets))
                                    @foreach($targets as $item)
                                <tr role="row" class="odd">
{{--                                    <td class="text-center font-size-sm sorting_1">{{ $employees->employee()->pluck('name')->implode(' ') }}</td>--}}
                                    <td class="font-w600 font-size-sm">{{ $item->id }}</td>
                                    <td class="font-w600 font-size-sm">{{ $item->target_department->name }}</td>
                                    <td class="font-w600 font-size-sm">{{ $item->employee->name }}</td>
                                    <td class="font-w600 font-size-sm">{{ $item->name }}</td>
                                    <td class="d-none d-sm-table-cell font-size-sm">{{ $item->point }}</td>
                                    <td class="d-none d-sm-table-cell font-size-lg">
                                        @if($item -> status==1)
                                                <a href="{{ route('admin.get.active.target_employee', $item->id) }}" class="badge badge-danger">Đang xử ký</a>
                                            @else
                                                <a href="{{ route('admin.get.active.target_employee', $item->id) }}" class="badge badge-success">Đạt</a>
                                            @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="#" class="fa fa-fw fa-pencil-alt"></a>
                                            <a href="#" class="js-delete-confirm fa fa-fw fa-times"></a>
                                        </div>
                                    </td>
                                </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table></div></div>
{{--                    <div class="row"><div class="col-sm-6"><div class="dataTables_info" id="DataTables_Table_2_info" role="status" aria-live="polite">Page <strong>1</strong> of <strong>4</strong></div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_2_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_2_previous"><a href="#" aria-controls="DataTables_Table_2" data-dt-idx="0" tabindex="0" class="page-link"><i class="fa fa-angle-left"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item next" id="DataTables_Table_2_next"><a href="#" aria-controls="DataTables_Table_2" data-dt-idx="5" tabindex="0" class="page-link"><i class="fa fa-angle-right"></i></a></li></ul></div></div></div></div>--}}
            </div>
        </div>
    </div>
@endsection
