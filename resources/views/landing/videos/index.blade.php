@extends('layouts.landing.index')
@section('content')
    <div class="container content-config">
        <div class="p-3 my-3 bg-primary d-flex justify-content-between text-white">
            <span id="videoResultHeading"> Result: from 10 years old to 49 years old- who hosts and/or visits - in New York and around </span>
            <span class="iconify cursor-pointer" data-bs-toggle="modal" data-bs-target="#videoModal"
                  data-icon="ri:equalizer-line" data-width="20" data-height="20"></span>
        </div>

        <div class="modal fade" id="videoModal">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h6 class="text-capitalize">Sort Video By</h6>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/api/file/video/search')}}" id="filterForm">
                            <div class="row">

                                <div class="col-lg-12 col-12 mb-3">
                                    <div class="form-group">
                                        <select name="filter" id="" class="form-select">
                                            <option value="date">Filter By Date</option>
                                            <option value="note">Filter By Note</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-12 mb-3">
                                    <div class="form-group">
                                        <select name="video" id="" class="form-select">
                                            <option value="all">All Videos</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-12 mb-3">
                                    <div class="d-flex align-items-center justify-content-center mb-3">
                                        <input name="minage" type="text" class="form-control" placeholder="10">
                                        <label class="text-capitalize mx-3">to</label>
                                        <input name="maxage" type="text" class="form-control" placeholder="49">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12 offset-lg-3">
                                    <button class="btn btn-primary form-control">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        <div class="">
            <div class="row bg-white" id="allVideoList"></div>
        </div>
    </div>


@endsection
@push('custom-js')
    <script>
        let constant = {
            allVideoListURL:  '/api/file/video',
        }

        function fetch (url){
            $.ajax({
                url: window.origin + url,
                type: 'GET',
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (res) {
                    // console.log(res)
                    getVideoContent(res)

                }, error: function (jqXhr, ajaxOptions, thrownError) {
                    console.log(jqXhr)
                }
            });
        }

        function getVideoContent(res) {
            res.data.forEach(item => {
                $('#allVideoList').append(`
                    <div class="col-lg-4 col-sm-12 col-12 mb-3">
                        <a href="{{url('videos/${item.id}')}}">
                        <video width="320" height="240">
                          <source src="${item.video}" type="video/mp4">
                        Your browser does not support the video tag.
                        </video>
                        </a>
                        <div class='d-flex'>
                            <img style='width: 80px; height: 80px;' src='${item.user.image ? item.user.image : window.origin + '/asset/image/default.png'}'/>

                            <div class="ms-2">
                                    <div class="d-flex align-items-center">
                                        <span class="iconify text-warning me-2" data-icon="bxs:star" data-width="20" data-height="20"></span>
                                       <span id='rating-count' class='text-white'></span>
                                    </div>

                                   <h6 class=''>${item.user.username}</h6>
                                    <span class=''>${item.user.address}</span>
                            </div>
                        </div>
                    <div>
                `)

                $.ajax({
                    url: window.origin + '/api/rating/count/'+item.id,
                    type: 'GET',
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (res) {
                        $('#rating-count').text(res.data)


                    }, error: function (jqXhr, ajaxOptions, thrownError) {
                        console.log(jqXhr)
                    }
                });
            })
        }

        $(document).ready(function (){
            fetch(constant.allVideoListURL)
        })




        $('#filterForm').submit(function (e) {
            e.preventDefault();
            let form = $(this);

            let form_data = JSON.stringify(form.serializeJSON());
            let formData = JSON.parse(form_data);

            let url = form.attr("action");
            $.ajax({
                type: 'post',
                url: url,
                data: formData,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    $('#videoModal').modal('hide')
                    $(".modal-backdrop").remove();

                    $('#videoResultHeading').text('Result: from'+ formData.minage +' years old to'+ formData.maxage +' years old ')

                    $('#allVideoList').html('')

                    getVideoContent(response)
                },
                error: function (xhr, resp, text) {
                    console.log(xhr);

                }
            });
        })





    </script>
@endpush
