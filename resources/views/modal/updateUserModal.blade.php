<style>
    span.select2-container.select2-container--bootstrap4.select2-container--open {
        z-index: 111111111111111111 !important;
    }
</style>
<div class="modal fade modal-static" id="updateUserModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update User Info</h5>
                <img src="{{ url('/backend/custom/images/cancel.png') }}" role="button" class="closeForm float-end" data-bs-dismiss="modal" aria-label="Close" alt="close">
            </div>
            <form id="updateUserForm" autocomplete="off" class="modal-body">
                <div>
                    {{ csrf_field() }}
                    <input type="hidden" name="filename" id="filename" value="{{ $data->filename }}">
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-form-label col-sm-4 text-sm-right">Name :</label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control" value="{{ $data->name }}" required="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-form-label col-sm-4 text-sm-right">Designation :</label>
                                <div class="col-sm-8">
                                    <input type="text" name="designation" class="form-control" value="{{ $data->designation }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-form-label col-sm-4 text-sm-right">Age :</label>
                                <div class="col-sm-8">
                                    <input type="number" name="age" class="form-control" min="0" max="99" maxlength="2" value="{{ $data->age }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-form-label col-sm-4 text-sm-right">Location :</label>
                                <div class="col-sm-8">
                                    <input type="text" name="location" class="form-control" value="{{ $data->location }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-form-label col-sm-4 text-sm-right">Joining Date :</label>
                                <div class="col-sm-8">
                                    <input type="date" name="joining_date" class="form-control" value="{{ !empty($data->joining_date)?date('Y-m-d',strtotime($data->joining_date)):'' }}">
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
                                        <option value="{{ $Role }}" {{ in_array($Role,$data->roles)?'selected':'' }}>{{ ucwords($Role) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn_submit" class="btn  btn-success">Submit</button>
                    <button type="button" class="btn  btn-info closeForm" data-bs-dismiss="modal" aria-label="Close">close</button>
                </div>
            </form>
        </div>
    </div>
</div>