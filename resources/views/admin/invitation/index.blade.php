@extends('layouts.admin.index')
@section('content')
    <main class="main">
        <section class="dashboard-package">
            <div class="d-flex align-items-center">
                <h6 class="portion-title">Invitation Code</h6>

                <button class="btn btn-primary rounded-32 my-3 ms-3" data-bs-target="#inviteModal" data-bs-toggle="modal">
                    Generate Invite Code
                </button>

            </div>


            <table class="table table-striped table-bordered data-table mt-5">
                <thead>
                <tr>
                    <th>Code title</th>
                    <th>Username</th>
                    <th>Package name</th>
                    <th>Duration in month</th>
                    <th>Reduction (%)</th>
{{--                    <th>Action</th>--}}
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </section>


        <div class="modal fade" id="inviteModal" data-bs-keyboard="false" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h6 class="text-capitalize">Generate a new code</h6>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('api/admin/invite-code/store')}}" id="inviteForm">
                            <div class="form-group my-3">
                                <label for="title" class="form-label title_label" id="title_label">Code title</label>
                                <input type="text" id="title" name="title" class="form-control title" placeholder="Code title">
                                <span class="text-danger title_error" id="title_error"></span>
                            </div>

                            <div class="form-group mb-3">
                                <label for="user_id" class="form-label user_id_label" id="user_id_label">Select user</label>
                                <select name="user_id" id="user_id" class="form-select"></select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="package_id" class="form-label package_id_label" id="package_id_label">Select package</label>
                                <select name="package_id" id="package_id" class="form-select"></select>
                            </div>


                            <div class="form-group mb-3">
                                <label for="duration" class="form-label title_label" id="title_label">Duration (in month)</label>
                                <input type="text" id="duration" name="duration" class="form-control duration" placeholder="3">
                                <span class="text-danger title_error" id="title_error"></span>
                            </div>


                            <div class="form-group mb-3">
                                <label for="reduction" class="form-label title_label" id="title_label">Reduction in percentage (%)</label>
                                <input type="text" id="reduction" name="reduction" class="form-control reduction" placeholder="50%">
                                <span class="text-danger title_error" id="title_error"></span>
                            </div>

                            <div class="form-group mb-3">
                                <label for="reduction" class="form-label title_label" id="title_label">Price</label>
                                <input type="text" id="price" name="price" class="form-control price" placeholder="$">
                                <span class="text-danger title_error" id="title_error"></span>
                            </div>

                            <button type="submit" class="btn btn-primary my-3">Save</button>
                            <button type="button" data-bs-dismiss="modal" class="btn btn-outline-secondary my-3">Cancel</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="editInviteModal">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h6 class="text-capitalize">Update generate code information</h6>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('api/admin/invite-code/store')}}" id="inviteForm">
                            <div class="form-group my-3">
                                <label for="title" class="form-label title_label" id="title_label">Code title</label>
                                <input type="text" id="title" name="title" class="form-control title" placeholder="Code title">
                                <span class="text-danger title_error" id="title_error"></span>
                            </div>

                            <div class="form-group mb-3">
                                <label for="user_id" class="form-label user_id_label" id="user_id_label">Select user</label>
                                <select name="user_id" id="user_id" class="form-select"></select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="package_id" class="form-label package_id_label" id="package_id_label">Select package</label>
                                <select name="package_id" id="package_id" class="form-select"></select>
                            </div>


                            <div class="form-group mb-3">
                                <label for="duration" class="form-label title_label" id="title_label">Duration (in month)</label>
                                <input type="text" id="duration" name="duration" class="form-control duration" placeholder="3">
                                <span class="text-danger title_error" id="title_error"></span>
                            </div>


                            <div class="form-group mb-3">
                                <label for="reduction" class="form-label title_label" id="title_label">Reduction in percentage (%)</label>
                                <input type="text" id="reduction" name="reduction" class="form-control reduction" placeholder="50%">
                                <span class="text-danger title_error" id="title_error"></span>
                            </div>



                            <button type="submit" class="btn btn-primary my-3">Save</button>
                            <button type="button" data-bs-dismiss="modal" class="btn btn-outline-secondary my-3">Cancel</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('custom-js')
    <script>

        function fetchData (url, fetchList){
            $.ajax({
                type: "GET",
                url: window.origin+ url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (response) {
                    if(response.status === 'success'){
                        fetchList(response)
                    }


                }, error: function (xhr, resp, text) {
                    console.log(resp)
                }
            });
        }

        function fetchPackage(res){
            res.data.forEach(item => {
                $('#package_id').append(`
                    <option value="${item.id}">${item.name}</option>
                `)
            })
        }

        function fetchUser(res){

            res.data.forEach(item => {
                $('#user_id').append(`
                    <option value="${item.id}">${item.username}</option>
                `)
            })
        }

        $(document).ready(function (){
            fetchData('/api/admin/package/all-list', fetchPackage)
            fetchData('/api/user/all-users', fetchUser)
        })


        $('#inviteForm').submit(function (e) {
            e.preventDefault();
            let form = $(this);
            // formSubmit("post", form);

            let form_data = JSON.stringify(form.serializeJSON());
            let formData = JSON.parse(form_data);

            let url = form.attr("action");


            $.ajax({
                type: "post",
                url: url,
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (response) {
                    toastr.success(response.message)
                    location.reload()
                }, error: function (xhr, resp, text) {

                    if (xhr && xhr.responseJSON) {
                        let response = xhr.responseJSON;
                        if (response.status && response.status === 'validate_error') {
                            $.each(response.message, function (index, message) {
                                $('.' + message.field).addClass('is-invalid');
                                $('.' + message.field + '_label').addClass('text-danger');
                                $('.' + message.field + '_error').html(message.error);
                            });
                        }
                    }
                }
            });
        })


        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }

            });

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{url('api/admin/invite-code/get-all')}}",
                columns: [
                    {data: 'title', name: 'title'},
                    {data: 'user.username', name: 'user.username'},
                    {data: 'package.name', name: 'package.name'},
                    {data: 'duration', name: 'duration'},
                    {data: 'reduction', name: 'reduction'},
                    // {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });



        function codeEditHandler(id){

        }

    </script>
@endpush
