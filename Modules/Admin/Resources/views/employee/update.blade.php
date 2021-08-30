@extends('admin::layouts.master')
@section('content')
    <h1 class="flex-sm-fill h3 my-2">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Update Position
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="">Home</a>
                            </li>
                            <li class="breadcrumb-item">Position</li>
                            <li class="breadcrumb-item">Update</li>
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
        <!-- Form create department -->
        <div class="row items-push">
            <div class="col-lg-4">
                <p class="font-size-sm text-muted">
                   Update employee
                </p>
            </div>
            <div class="col-lg-8 col-xl-5">
                @error('msg')
                <p>{{ $msg }}</p>
                @enderror
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                <form action="{{route('admin.update.employee')}}" method="POST">
                    @csrf
                    <input hidden name="id_empl" value="{{$employee->id}}">
                    <div class="form-group">
                        <label for="val-currency">Tên Nhân Viên <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="name" value="{{ $employee->name }}" placeholder="Name Employee">
                        @if($errors->first('name'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-suggestions">Giới Tính <span class="text-danger">*</span></label>
                        <select name="sex" class="form-control ">
                            <option value="">_Click_</option>
                            <option value="1" {{ ($employee -> sex ?? '') == 1 ? "selected='selected'": "" }}>Male</option>
                            <option value="2" {{ ($employee -> sex ?? '') == 2 ? "selected='selected'": "" }}>Female</option>
                        </select>
                        @if($errors->first('action'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('action') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-currency">Ngày Sinh<span class="text-danger">*</span></label>
                        <input  type="date" class="form-control"  name="dob" value="{{ $employee->dob }}" placeholder="YYYY/MM/DD">
                        @if($errors->first('dob'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('dob') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="val-currency">CMND<span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="identity_card" value="{{ $employee->identity_card }}" placeholder="Identity card">
                        @if($errors->first('identity_card'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('identity_card') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-currency">Địa Chỉ<span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="address" value="{{ $employee->address }}" placeholder="Address">
                        @if($errors->first('address'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('address') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-currency">Email<span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="email" value="{{ $employee->email }}" placeholder="Email">
                        @if($errors->first('email'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-currency">Điện Thoại<span class="text-danger">*</span></label>
                        <input type="number" class="form-control"  name="phone" value="{{ $employee->phone }}" placeholder="Phone">
                        @if($errors->first('phone'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('phone') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-username">Phòng Ban <span class="text-danger">*</span></label>
                        @foreach($departments as $key => $items)
                            <div class="form-group ">
                                {{--                                    @foreach($items as $item)--}}
                                <div class="checkbox"><label>
                                        <input type="checkbox" name="" {{in_array($items['id'], $positionOld) ? "checked" : ''}}
                                        value="{{ $items['id'] }}">{{ $items['name'] }}</label>
                                    {{--                                            <input type="checkbox" name="">{{ $items['name'] }}</label>--}}
                                </div>
                                {{--                                    @endforeach--}}
                            </div>
                        @endforeach
                        @if($errors->first('department_id'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('department_id') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-username">Vị trí <span class="text-danger">*</span></label>
                        @foreach($position as $key => $items)
                            <div class="form-group ">
                                {{--                                    @foreach($items as $item)--}}
                                <div class="checkbox"><label>
                                        <input type="checkbox" name="" {{in_array($items['id'], $positionOld) ? "checked" : ''}}
                                        value="{{ $items['id'] }}">{{ $items['name'] }}</label>
                                    {{--                                            <input type="checkbox" name="">{{ $items['name'] }}</label>--}}
                                </div>
                                {{--                                    @endforeach--}}
                            </div>
                        @endforeach
                        @if($errors->first('position_id'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('position_id') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-currency">Date Join<span class="text-danger">*</span></label>
                        <input type="date" class="form-control"  name="date_join" value="{{ $employee->date_join }}" placeholder="YYYY/MM/DD">
                        @if($errors->first('date_join'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('date_join') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-currency">Date Entry<span class="text-danger">*</span></label>
                        <input type="date" class="form-control"  name="date_entry" value="{{ $employee->date_entry }}" placeholder="YYYY/MM/DD">
                        @if($errors->first('date_join'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('date_join') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-currency">Date End<span class="text-danger">*</span></label>
                        <input type="date" class="form-control"  name="date_end" value="{{ $employee->date_end }}" placeholder="YYYY/MM/DD">
                        @if($errors->first('date_end'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('date_end') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-currency">Date Out<span class="text-danger">*</span></label>
                        <input type="date" class="form-control"  name="date_out" value="{{ $employee->date_out }}" placeholder="YYYY/MM/DD">
                        @if($errors->first('date_out'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('date_out') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-currency">Exp Year<span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="exp_year" value="{{ $employee->exp_year }}" placeholder="Exp Year">
                        @if($errors->first('exp_year'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('exp_year') }}</small>
                        @endif
                    </div>
                    <div class="row items-push">
                        <div class="col-lg-7 offset-lg-4">
                            <button type="submit" class="btn btn-alt-primary">Submit</button>
                        </div>
                    </div>
                </form>
                <hr width="700px"/>
                <div class="row justify-content-center">
                    <label for="val-currency">Update Avatar<span class="text-danger"></span></label>
                    <form action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input hidden name="id_empl" value="{{$employee->id}}">
                            <input hidden name="avatar_empl" value="{{$employee->avatar}}" >
                            <img id="frame" src="{{asset('storage/uploads/' . $employee->avatar)}}"  alt="" style="width:100px; height:100px" >
                            <input type="file" id="example-file-input" name="upload" {{old('avatar')}}  onchange="preview()">
                            <script>
                                function preview() {
                                    frame.src=URL.createObjectURL(event.target.files[0]);
                                }
                            </script>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- END Form create department -->
    </div>
@endsection

