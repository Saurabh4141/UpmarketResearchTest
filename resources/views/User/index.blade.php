@extends('layouts.master')
@section('title', 'User List | Upmarket Research')
@section('post_css')
<style></style>
@endsection('post_css')
@section('content')
<main class="content pt-3">
    <div class="container-fluid p-0 mt-0">
        <h1 class="h3 mb-2">User List</h1>
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-header pb-1">
                        <div class="row ">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-auto">
                                        <select name="PageLength" id="PageLength" class="form-select"  data-bs-toggle="tooltip" data-bs-placement="top" title="Select Page Length.">
                                            <option value="">Select All</option>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn  btn-danger text-light" id="btn_deletejson" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Json Permanently"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <div class="col-auto">
                                        <label for="">Search Role:</label>
                                    </div>
                                    <div class="col-auto">
                                        <select name="sel_role" id="sel_role" class="form-select">
                                            <option value="">Select All</option>
                                            @foreach(config('constant.Roles', []) as $Role)
                                            <option value="{{ $Role }}">{{ ucwords($Role) }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="SearchInDatatable" id="SearchInDatatable" autocomplete="off" placeholder="Search In Datatable" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-1">
                        <div id="tableData">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection('content')
@section('scripts')
<script src="{{ asset('backend/custom/js/user.js') }}"></script>
@endsection('scripts')