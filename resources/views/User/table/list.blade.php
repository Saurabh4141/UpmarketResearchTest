<div class="table-responsive">
    <table id="Table" class="table table-striped table-bordered nowrap" style="font-family: sans-serif;">
        <thead>
            <tr role="row">
                <th class="Clabel">#</th>
                <td><input type="checkbox"  id="SelectAll"></td>
                <th class="Clabel">Name</th>
                <th class="Clabel">Designation</th>
                <th class="Clabel">Age</th>
                <th class="Clabel">Location</th>
                <th class="Clabel">Joining Date</th>
                <th class="Clabel col_role">Roles</th>
                <th class="Clabel">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($showData) && !empty($showData[0]))
            @foreach($showData as $key=>$data)
            <tr role="row" style="letter-spacing:1px;">
                <td class="text-center Clabel"> {{ ++$key }} </td>
                <td><input type="checkbox" name="inp_filename" class="chk_class" value="{{ $data->filename }}"></td>
                <td>{{ ucwords($data->name) ?? '' }}</td>
                <td>{{ ucwords($data->designation) ?? '' }}</td>
                <td>{{ $data->age ?? '' }}</td>
                <td>{{ ucwords($data->location) ?? '' }}</td>
                <td>{{ !empty($data->joining_date)?date('Y-m-d',strtotime($data->joining_date)):'' }}</td>
                <td>{{  (is_array($data->roles))?ucwords(implode(',',$data->roles)):"" }}</td>
                <td class="Clabel">
                    <a class="btn  btn-warning text-light" onclick="updateUser('{{ $data->filename }}')" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User"><i class="fa fa-pencil"></i></a>
                    <a class="btn  btn-danger text-light" onclick="deleteUser('{{ $data->filename }}')" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete User"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>