<?php
$currentControllerName = Request::segment(1);
$currentFullRouteName = Route::getFacadeRoot()
    ->current()
    ->uri();
?>


@extends('layouts.landing.index')
@section('content')
    <div id="profile" class="profile">
        <div class="container">
            <ul class="nav nav-tabs justify-content-center border-0 bg-primary" id="profileNav" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ ((request()->get('tab')) == "information") ? "active" : ''}}"
                            id="info-tab" data-bs-toggle="tab" data-bs-target="#information" type="button" role="tab"
                            aria-controls="home" aria-selected="true">Information
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ ((request()->get('tab')) == "photos") ? "active" : ''}}" id="photos-tab"
                            data-bs-toggle="tab" data-bs-target="#photos" type="button" role="tab"
                            aria-controls="profile" aria-selected="false">Photos/videos
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ ((request()->get('tab')) == "setting") ? "active" : ''}}"
                            id="setting-tab" data-bs-toggle="tab" data-bs-target="#setting"
                            type="button" role="tab" aria-controls="contact" aria-selected="false">Setting
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ ((request()->get('tab')) == "favorite") ? "active" : ''}}"
                            id="favorite-tab" data-bs-toggle="tab" data-bs-target="#favorite"
                            type="button" role="tab" aria-controls="home" aria-selected="true">Favorite
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ ((request()->get('tab')) == "blacklist") ? "active" : ''}}"
                            id="blacklist-tab" data-bs-toggle="tab" data-bs-target="#blocklist"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Blacklist
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="premium-tab" data-bs-toggle="tab" data-bs-target="#premiumList"
                            type="button" role="tab" aria-controls="contact" aria-selected="false">Premium Access
                    </button>
                </li>
            </ul>
            <div class="tab-content bg-white" id="profileNavContent">
                <div class="tab-pane fade show {{ ((request()->get('tab')) == "information") ? "active" : ''}}"
                     id="information" role="tabpanel">
                    <form action="{{url('/api/auth/profile')}}" id="informationForm" class="text-white p-4">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label username_label" id="username_label"
                                           for="username">Username</label>
                                    <input class="form-control username" type="text" id="username" name="username"
                                           placeholder="Username">
                                </div>
                            </div>


                            <div class="col-lg-6 mb-3">
                                <div id="userPhone" class="d-none">
                                    <div class="form-group">
                                        <label class="form-label" id="phone_label" for="phone">Mobile</label>
                                        <input class="form-control" readonly type="text" id="phone" name="phone"
                                               placeholder="">
                                    </div>
                                </div>

                                <div id="userEmail" class="d-none">
                                    <div class="form-group">
                                        <label class="form-label" id="email_label" for="email">Email</label>
                                        <input class="form-control" readonly type="email" id="email" name="email"
                                               placeholder="">
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" id="birth_label" for="infoBirthYear">Birth Year</label>
                                    <select id="infoBirthYear" name="dob" class="form-select"></select>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" id="city_label" for="address">City</label>
                                    <input class="form-control" type="text" id="address" name="address"
                                           placeholder="City">
                                </div>
                            </div>


                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" id="hiv_label" for="hiv">HIV Status</label>
                                    <select class="form-select" id="hiv" name="test">
                                        <option value="positive">Positive</option>
                                        <option value="negative">Negative</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" id="preference_label" for="preference">Preference</label>
                                    <select class="form-select" id="preference" name="preference">
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="presentation">Your Presentation (optional)</label>
                                <textarea class="form-control" id="presentation" name="presentation"
                                          placeholder="Your Presentation (optional)"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-lg-3 mb-3">
                            <div class="d-flex align-items-center">
                                <button type="button" onclick="cancleHandler()"
                                        class="btn btn-outline-secondary form-control text-capitalize me-2">cancel
                                </button>
                                <button type="submit" class="btn btn-primary form-control text-capitalize">save</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade show p-4 {{ ((request()->get('tab')) == "photos") ? "active" : ''}}"
                     id="photos" role="tabpanel">


                    <div class="row align-items-center p-2">
                        <div class="col-lg-2">
                            <img id="showImg" style="height: 200px; width: 100%"
                                 src="{{asset('/asset/image/default.jpg')}}"
                                 alt="">
                        </div>

                        <div class="col-lg-2">
                            <div class="custom-file-upload mb-3">
                                <input type="file" id="image-uploader" hidden onchange="profileUploader(event)"/>
                                <input type="hidden" id="imgURL"/>
                                <label for="image-uploader"
                                       class="px-4 py-2 text-white text-uppercase fw-bold d-flex align-items-center justify-content-center">
                                    <span class="iconify me-3" data-icon="fluent:add-12-filled" data-width="20"
                                          data-height="20"></span>
                                    add
                                </label>
                            </div>

                            <button id="editButton"
                                    class="btn btn-primary form-control p-2 text-uppercase fw-bold mb-3 d-none">edit
                            </button>
                            <button id="removeButton"
                                    class="btn btn-primary form-control p-2 text-uppercase fw-bold d-none">delete
                            </button>
                        </div>
                    </div>

                    <div class="gallery my-3">
                        <span class="text-capitalize">photos/videos gallery</span>

                        <div class="row cloneContainer"></div>

                    </div>

                    <div class="gallery my-3">
                        <span class="text-capitalize">private photos/videos (for chat use)</span>
                        <div class="row ">
                            <div class="col-lg-2 my-3">
                                <div class="gallery-item">
                                    <span class="iconify icon" data-icon="fluent:add-circle-24-filled" data-width="25"
                                          data-height="25"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show p-4 {{ ((request()->get('tab')) == "setting") ? "active" : ''}}"
                     id="setting" role="tabpanel">
                    <form action="" class="text-white p-4">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" id="alert_email_label" for="alert_email">
                                        Alert by email in case of a message:
                                    </label>
                                    <select
                                        id="alert_by_email"
                                        name="alert_by_email"
                                        class="form-select"
                                        onchange="profileSettingHandler(this)"
                                    >
                                        <option value="week">Once a week</option>
                                        <option value="month">Once a month</option>
                                        <option value="everyday">Everyday</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" id="premium_status_label" for="premium_status">
                                        Premium status
                                        <span class="iconify" data-icon="mdi:chess-queen" data-width="20"
                                              data-height="20"></span>
                                        :
                                    </label>
                                    <select
                                        id="premium_status"
                                        name="premium_status"
                                        class="form-select"
                                        onchange="profileSettingHandler(this)"
                                    >
                                        <option value="hide">Hide my status</option>
                                        <option value="show">Show everyone</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" id="premium_status_label" for="reminder_message">
                                        Reminder message after 1 month absence :</label>
                                    <select
                                        id="reminder_message"
                                        name="reminder_message"
                                        class="form-select"
                                        onchange="profileSettingHandler(this)"
                                    >
                                        <option value="agree">I agree to be connected again by email</option>
                                        <option value="disagree">I disagree to be connected again by email</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" id="colorblind_mode_label" for="colorblind_mode">
                                        Colorblind mode :
                                    </label>
                                    <select
                                        id="colorblind_mode"
                                        name="colorblind_mode"
                                        class="form-select"
                                        onchange="profileSettingHandler(this)"
                                    >
                                        <option value="enabled">Enable</option>
                                        <option value="disabled">Disable</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" id="premium_status_label" for="exhibits_notification">
                                        Exhibits notifications in the menu :
                                    </label>
                                    <select
                                        id="exhibits_notification"
                                        name="exhibits_notification"
                                        class="form-select"
                                        onchange="profileSettingHandler(this)"
                                    >
                                        <option value="enabled">Enable</option>
                                        <option value="disabled">Disable</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" id="premium_status_label"
                                           for="languages">Language :</label>
                                    <select
                                        id="languages"
                                        name="language"
                                        class="form-select"
                                        onchange="profileSettingHandler(this)"
                                    ></select>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label
                                        class="form-label"
                                        id="premium_status_label"
                                        for="premium_status"

                                    >
                                        Sound notifications</label>
                                    <select
                                        id="sound_notification"
                                        name="sound_notification"
                                        class="form-select"
                                        onchange="profileSettingHandler(this)"
                                    >
                                        <option value="enabled">Enable</option>
                                        <option value="disabled">Disable</option>
                                    </select>
                                </div>
                            </div>

                            <hr class="my-5">


                        </div>

                    </form>
                    <div class="col-lg-6 offset-lg-3 mb-3">
                        <div class="d-flex align-items-center">
                            <button
                                data-bs-toggle="modal"
                                data-bs-target="#suspendModal"
                                class="btn btn-outline-secondary form-control text-capitalize me-2"
                            >
                                Suspend My Account
                            </button>

                            <button

                                data-bs-toggle="modal"
                                data-bs-target="#deleteModal"
                                class="btn btn-primary form-control text-capitalize"
                            >
                                Delete My Account
                            </button>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show p-4 {{ ((request()->get('tab')) == "favorite") ? "active" : ''}}"
                     id="favorite" role="tabpanel">
                    <div class="row" id="favouriteListShow">

                    </div>

                </div>
                <div class="tab-pane fade show p-4 {{ ((request()->get('tab')) == "blacklist") ? "active" : ''}}"
                     id="blocklist" role="tabpanel">
                    <div class="row" id="blockListShow">

                    </div>
                </div>

                <div class="tab-pane fade show p-4" id="premiumList" role="tabpanel">
                    <div class="container">
                        <ul>
                            <li>
                                <h6>Payment By Credit</h6>
                                <span class="text-black-50">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, nostrum!</span>
                            </li>

                            <li class="dropdown-divider"></li>


                            <li class="d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input p-0 rounded-circle" type="radio"
                                           name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label align-items-center" for="flexRadioDefault1">
                                        <span class="text-tweeter fw-bold">3$/month</span>
                                        <span>for</span>
                                        <span class="fw-bold">2 Years</span>
                                        <br>
                                        <span class="fw-lighter text-black-50">Lorem ipsum dolor sit amet.</span>
                                    </label>
                                </div>
                                <span class="bg-warning p-2">75% reduction</span>
                            </li>
                            <li class="dropdown-divider"></li>


                            <li class="d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input p-0 rounded-circle" type="radio"
                                           name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label align-items-center" for="flexRadioDefault1">
                                        <span class="text-tweeter fw-bold">3$/month</span>
                                        <span>for</span>
                                        <span class="fw-bold">2 Years</span>
                                        <br>
                                        <span class="fw-lighter text-black-50">Lorem ipsum dolor sit amet.</span>
                                    </label>
                                </div>
                                <span class="bg-warning p-2">75% reduction</span>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="suspendModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h6 class="">Are you sure you want to suspend?</h6>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, nemo.</span>

                        <div class="my-4">
                            <button
                                data-bs-dismiss="modal"
                                class="btn btn-outline-secondary me-2"
                            >
                                Cancel
                            </button>
                            <button
                                onclick="applySuspendHandler()"
                                class="btn btn-primary me-2"
                            >
                                Submit
                            </button>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h6 class="">Permanently delete your account</h6>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, nemo.</span>

                        <div class="my-4">
                            <button
                                data-bs-dismiss="modal"
                                class="btn btn-outline-secondary me-2"
                            >
                                Cancel
                            </button>
                            <button
                                onclick="applyDeleteAccountHandler()"
                                class="btn btn-primary me-2"
                            >
                                Submit
                            </button>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-js')
    <script>
        let token = localStorage.getItem('accessToken')

        Object.entries(isoLangs).forEach(item => {
            $('#languages').append(`
                <option value='${item[1].nativeName}'>${item[1].nativeName}</option>
            `)
        })

        function applySuspendHandler(){
            $.ajax({
                url: window.origin + '/api/auth/profile/settings/suspend',
                type: 'patch',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': token
                },
                success: function (res) {
                    toastr.success(res.message)
                    localStorage.removeItem('accessToken')
                    localStorage.removeItem('user')
                    setTimeout(function (){
                        window.location.href = window.origin
                    } ,1000)
                },
                error: function (jqXhr, ajaxOptions, thrownError) {
                    console.log(jqXhr)
                }
            });
        }

        function applyDeleteAccountHandler(){
            $.ajax({
                url: window.origin + '/api/auth/profile/settings/delete',
                type: 'delete',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': token
                },
                success: function (res) {
                    toastr.success(res.message)
                    localStorage.removeItem('accessToken')
                    localStorage.removeItem('user')

                    setTimeout(function (){
                        window.location.href = window.origin
                    } ,1000)
                },
                error: function (jqXhr, ajaxOptions, thrownError) {
                    console.log(jqXhr)
                }
            });
        }

        function profileSettingHandler(input) {
            $.ajax({
                url: window.origin + '/api/auth/profile/settings',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': token
                },
                data: {
                    [input.name]: input.value
                },
                success: function (res) {
                    toastr.success(res.message)
                    location.reload()
                },
                error: function (jqXhr, ajaxOptions, thrownError) {
                    console.log(jqXhr)
                }
            });
        }

        $(document).ready(function () {
            $.ajax({
                url: window.origin + '/api/auth/profile/settings',
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': token
                },
                success: function (res) {

                    if (res.status === 'success') {
                        $('#alert_by_email').val(res.data.alert_by_email)
                        $('#premium_status').val(res.data.premium_status)
                        $('#colorblind_mode').val(res.data.colorblind_mode)
                        $('#exhibits_notification').val(res.data.exhibits_notification)
                        $('#reminder_message').val(res.data.reminder_message)
                        $('#languages').val(res.data.language)
                        $('#sound_notification').val(res.data.sound_notification)
                    }
                },
                error: function (jqXhr, ajaxOptions, thrownError) {
                    console.log(jqXhr)
                }
            });
        })

        function cancleHandler() {
            location.href = window.origin
        }

        function profileUploader(event) {
            event.preventDefault();
            let file = event.target.files[0];
            let token = localStorage.getItem('accessToken')

            let formData = new FormData()
            formData.append('file', file);
            formData.append('folder', 'profile');


            $.ajax({
                url: window.origin + '/api/image-uploader',
                type: 'POST',
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: formData,
                success: function (res) {
                    console.log(res)
                    $('#showImg').attr('src',)
                    formData.append('image', res.data);
                    $.ajax({
                        url: window.origin + '/api/auth/profile',
                        type: 'POST',
                        dataType: "json",
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            'Authorization': token
                        },
                        data: formData,
                        success: function (res) {
                            console.log(res)
                        },
                        error: function (jqXhr, ajaxOptions, thrownError) {
                            console.log(jqXhr)
                        }
                    });
                },
                error: function (jqXhr, ajaxOptions, thrownError) {
                    console.log(jqXhr)
                }
            });


        }

        let text = "";
        $(document).ready(function () {
            for (let step = 1; step <= 5; step++) {
                cloneUploadContainer('cloneContainer', step)
                if (step === 5) {
                    $('.cloneContainer').append(`
                            <div class="col-lg-2 col-sm-4 col-12 my-2 ">
                                <button class="btn form-control btn-primary" onclick="loadMore()">More</button>
                            </div>
                    `)
                }
            }


            function cloneUploadContainer(contentID, step) {

                $('.' + contentID).append(`
           <div class="col-lg-2 col-sm-4 col-12 my-2 ">
              <div class="gallery-item">
                    <div class="text-center">
                        <span class="text-white fw-bold d-none" id="waitMsg${step}">wait few moment</span>
                    </div>

                  <video style="width: 100%; height: 100%" class="d-none"  id="videoPriview${step}" src=""></video>
                   <img class="d-none imagePreview" id="imagePriview${step}" src="" alt="">

                   <span class="iconify icon dropdown" data-bs-toggle="dropdown"
                            data-icon="fluent:add-circle-24-filled" data-width="25"
                            data-height="25"></span>

                  <ul class="dropdown-menu dropdown-menu-end">
                    <li class="dropdown-item border-bottom">
                        <input id="image-uploader${step}" type="file" hidden
                               onchange="uploader(event, 'image','', 'imageURL${step}', 'imagePriview${step}', 'uploadForm${step}', 'waitMsg${step}')">
                        <label for="image-uploader${step}" class="cursor-pointer">Upload a
                            Photo</label>
                    </li>

                    <li class="dropdown-item border-bottom">
                        <input id="video-uploader${step}" type="file" hidden
                               onchange="uploader(event, 'video','', 'videoURL${step}', 'videoPriview${step}', 'uploadForm${step}', 'waitMsg${step}')">
                        <label for="video-uploader${step}" class="cursor-pointer">Upload a
                            Video</label>
                    </li>


                    <li class="dropdown-item border-bottom">
                        <input id="takeVideo" type="file" hidden>
                        <label for="takeVideo" class="cursor-pointer">Take a Video</label>
                    </li>


                    <li class="dropdown-item">
                        <span class="cursor-pointer">Cancel</span>
                    </li>
                </ul>
               </div>



          <form id="uploadForm${step}" onsubmit="fileUploadForm(event)" class="uploadForm d-none my-2">
            <input type="hidden" id="videoURL${step}" class="videoURL" name="video">
            <input type="hidden" id="imageURL${step}" class="imageURL" name="image">
            <input type="hidden" id="privacyValue"  name="privacy">

            <div class="form-check mb-3">
              <input class="form-check-input p-0" type="checkbox" value="" id="privacy">
              <label class="form-check-label" for="privacy">
                Make Private
              </label>
            </div>
            <button type="submit" class="btn btn-primary form-control p-1 rounded">save</button>
        </form>

        </div>

    `)
            }

            let i = 0

            function loadMore() {
                ++i;
                cloneUploadContainer('cloneContainer', i)
            }

            let getUser = localStorage.getItem('user')
            let user = JSON.parse(getUser)
            // console.log(user)

            $('#username').val(user.username)

            if (user && user.email) {
                $('#userEmail').removeClass('d-none')
                $('#email').val(user.email)
            }
            if (user && user.phone) {
                $('#userPhone').removeClass('d-none')
                $('#phone').val(user.phone)
            }

            $('#infoBirthYear').val(user.dob)
            $('#address').val(user.address)
            $('#presentation').val(user.presentation)
            $('#showImg').attr('src', user.image)
        })

        $('#informationForm').submit(function (e) {
            let token = localStorage.getItem('accessToken')
            e.preventDefault();
            let form = $(this);
            formSubmit("post", form, token);
        })

        $('#uploadForm').submit(function (e) {
            let token = localStorage.getItem('accessToken')
            e.preventDefault();
            let form = $(this);
            formSubmit("post", form, token);
        })

        $(document).on('click', '#privacy', function () {
            let x = $(this).prop('checked')

            if (x === true) {
                $('#privacyValue').val('private')
            }
        })


        function fileUploadForm(event) {
            event.preventDefault()
            let constant = {
                token: localStorage.getItem('accessToken'),
                videoURL: document.querySelector('.videoURL').value,
                imageURL: document.querySelector('.imageURL').value,
                privacy: document.querySelector('#privacyValue').value,
                fileUploadURL: '/api/file/store',
            }
            let formData = new FormData();
            formData.append('video', constant.videoURL)
            formData.append('image', constant.imageURL)
            if (constant.privacy === '') {
                formData.append('privacy', 'public')
            } else {
                formData.append('privacy', constant.privacy)
            }

            $.ajax({
                type: 'POST',
                url: window.origin + constant.fileUploadURL,
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': constant.token
                },
                success: function (response) {
                    toastr.success(response.message)
                    location.reload()
                }, error: function (xhr, resp, text) {
                    console.log(xhr)
                }
            });
        }

        // $(document).ready(function (){
        //     $.ajax({
        //         type: 'GET',
        //         url: window.origin + constant.fileFetchURL,
        //         dataType: "json",
        //         processData: false,
        //         contentType: false,
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        //         },
        //         success: function (response) {
        //            console.log(response)
        //         }, error: function (xhr, resp, text) {
        //             console.log(xhr)
        //         }
        //     });
        // })

        $(document).ready(function () {
            let token = localStorage.getItem('accessToken')
            $.ajax({
                type: 'GET',
                url: window.origin + '/api/favourite',
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': token
                },
                success: function (response) {
                    favouriteList(response)
                }, error: function (xhr, resp, text) {
                    console.log(xhr)
                }
            });
        })

        $(document).ready(function () {
            let token = localStorage.getItem('accessToken')
            $.ajax({
                type: 'GET',
                url: window.origin + '/api/block',
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': token
                },
                success: function (response) {
                    blockList(response)
                }, error: function (xhr, resp, text) {
                    console.log(xhr)
                }
            });
        })

        function favouriteList(res) {
            res.data.forEach(item => {

                $('#favouriteListShow').append(`
                    <div class="col-lg-6 col-12 col-sm-12 mb-3">
                            <div class="d-flex border-bottom p-2">
                                <img class="avatar-sm" src="${item.favourite_user.image ? item.favourite_user.image : window.origin + "/asset/image/default.jpg"}" alt="">
                                <div class="ms-3">
                                   <h6>${item.favourite_user.username}</h6>
                                   <span>${item.favourite_user.address}</span>
                                   <p>${item.favourite_user.age} y.o</p>

                                </div>
                            </div>
                        </div>
                `)
            })
        }

        function blockList(res) {
            res.data.forEach(item => {
                $('#blockListShow').append(`
                    <div class="col-lg-6 col-12 col-sm-12 mb-3">
                            <div class="d-flex border-bottom p-2">
                                <img class="avatar-sm" src="${item.block_user.image ? item.block_user.image : window.origin + "/asset/image/default.jpg"}" alt="">
                                <div class="ms-3">
                                   <h6>${item.block_user.username}</h6>
                                   <span>${item.block_user.address}</span>
                                   <p>${item.block_user.age} y.o</p>

                                </div>
                            </div>
                        </div>
                `)
            })
        }


    </script>

@endpush
