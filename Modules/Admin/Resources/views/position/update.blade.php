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
                                <a class="link-fx" href="{{ route('admin.get.list.position') }}">List</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </h1>
    <div class="content">
        <!-- Form create position -->
        <div class="row items-push">
            <div class="col-lg-4">
                <p class="font-size-sm text-muted">
                    Update position
                </p>
            </div>
            <div class="col-lg-8 col-xl-5">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="val-currency">User Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="name" value="{{ $position->name }}" placeholder="Name">
                        @if($errors->first('name'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="val-username">Department <span class="text-danger">*</span></label>
                        <select name="department_id" class="form-control ">
                            <option value="">_Click_</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ old('department_id',$position->department_id ?? 0) == $department->id ? "selected" : "" }}>{{ $department->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->first('department_id'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('department_id') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-currency">Title  <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="title" value="{{ $position->title }}" placeholder="Title">
                        @if($errors->first('title'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('title') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-suggestions">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control"  name="description"  rows="5"  placeholder="What would you like to see?">{{ old('description',$position->description ?? '') }}</textarea>
                        @if($errors->first('description'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('description') }}</small>
                        @endif
                    </div>
                    <div class="row items-push">
                        <div class="col-lg-7 offset-lg-4">
                            <button type="submit" class="btn btn-alt-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <!-- END Form create department -->
    </div>
@endsection

