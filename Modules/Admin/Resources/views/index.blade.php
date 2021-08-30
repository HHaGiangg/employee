@extends('admin::layouts.master')
@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Admin  Page
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Admin</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Home</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content position-relative">
        <!-- Bootstrap Toasts -->
        <div style="position: fixed; top: 2rem; right: 2rem; z-index: 9999999;">
            <!-- Toast Example 1 -->
            <div id="toast-example-1" class="toast fade hide" data-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="si si-bubble text-primary mr-2"></i>
                    <strong class="mr-auto">Title</strong>
                    <small class="text-muted">just now</small>
                    <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="toast-body">
                    This is a nice notification based on Bootstrap implementation.
                </div>
            </div>
            <!-- END Toast Example 1 -->

            <!-- Toast Example 2 -->
            <div id="toast-example-2" class="toast fade hide" data-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="si si-wrench text-danger mr-2"></i>
                    <strong class="mr-auto">System</strong>
                    <small class="text-muted">just now</small>
                    <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="toast-body">
                    You can alert the user with a system message!
                </div>
            </div>
            <!-- END Toast Example 2 -->
        </div>
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Bootstrap Toasts</h3>
            </div>
            <div class="block-content">
                <!-- Default -->
                <h4 class="border-bottom pb-2">Default</h4>
                <div class="row items-push">
                    <div class="col-lg-4">
                        <p class="font-size-sm text-muted">
                            A nice toast with a message
                        </p>
                    </div>
                    <div class="col-lg-8">
                        <button type="button" class="btn btn-alt-primary push" onclick="jQuery('#toast-example-1').toast('show');">
                            <i class="fa fa-bell mr-1"></i> Launch Toast 1
                        </button>
                        <p class="font-w600 mb-0">
                            You can also trigger it with JS:
                        </p>
                        <p>
                            <code>jQuery('#toast-example-1').toast('show');</code>
                        </p>
                        <button type="button" class="btn btn-alt-primary push" onclick="jQuery('#toast-example-2').toast('show');">
                            <i class="fa fa-bell mr-1"></i> Launch Toast 2
                        </button>
                        <p class="font-w600 mb-0">
                            You can also trigger it with JS:
                        </p>
                        <p>
                            <code>jQuery('#toast-example-2').toast('show');</code>
                        </p>
                    </div>
                </div>
                <!-- END Default -->
            </div>
        </div>
        <!-- END Bootstrap Toasts -->

    </div>
@endsection
