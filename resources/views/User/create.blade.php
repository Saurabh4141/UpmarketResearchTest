@extends('layouts.master')
@section('title', 'Create New User | Upmarket Research')
@section('post_css')
<style></style>
@endsection('post_css')
@section('content')
<main class="content pt-3">
    <div class="container-fluid p-0 mt-0">
        <h1 class="h3 mb-2">Create New User</h1>
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form id="createUserForm" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="col-form-label col-sm-4 text-sm-right">Name :</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="name" id="name" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="col-form-label col-sm-4 text-sm-right">Designation :</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="designation" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="col-form-label col-sm-4 text-sm-right">Age :</label>
                                        <div class="col-sm-8">
                                            <input type="number" name="age" class="form-control" min="0" max="99" maxlength="2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="col-form-label col-sm-4 text-sm-right">Location :</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="location" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="col-form-label col-sm-4 text-sm-right">Joining Date :</label>
                                        <div class="col-sm-8">
                                            <input type="date" name="joining_date" class="form-control" min="{{ date('Y-m-d') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="col-form-label col-sm-4 text-sm-right">Roles :</label>
                                        <div class="col-sm-8">
                                            <select name="roles[]" id="roles" class="form-control" multiple="">
                                                <option value="" disabled>Select Role</option>
                                                @foreach(config('constant.Roles', []) as $Role)
                                                <option value="{{ $Role }}">{{ ucwords($Role) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-5"></div>
                                <div class="col-md-3">
                                    <button type="submit" id="btn_submit" class="btn  btn-success">Submit</button>
                                    <button type="reset" class="btn btn-info closeForm">Reset</button>
                                </div>
                            </div>
                        </form>
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