@extends('layouts.admin.index')
@section('content')
    <main class="main">
        <section class="dashboard-verification">
            <h6 class="portion-title mb-5">verification center</h6>


            <table class="table table-bordered data-table mt-5">
                <thead>
                <tr>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Created Time</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </section>
    </main>
@endsection

@push('custom-js')
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{url('api/admin/user/get-all')}}",

                columns: [
                    {data: 'username', name: 'username'},
                    {data: 'email', name: 'email'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });

        function userHandler(id){
            let form_data = new FormData();
            form_data.append('status', 'active')

            $.ajax({
                url: window.origin + '/api/user/'+id,
                type: "POST",
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: form_data,
                success: function (res) {
                    toastr.success(res.message)
                    location.reload()
                },
                error: function (jqXhr, ajaxOptions, thrownError) {
                    console.log(jqXhr);
                }
            });
        }

        function userBannedHandler(id){

            let form_data = new FormData();
            form_data.append('status', 'suspend')
            $.ajax({
                url: window.origin + '/api/user/'+id,
                type: "POST",
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: form_data,
                success: function (res) {
                    toastr.success(res.message)
                    location.reload()
                },
                error: function (jqXhr, ajaxOptions, thrownError) {
                    console.log(jqXhr);
                }
            });
        }
    </script>
@endpush

