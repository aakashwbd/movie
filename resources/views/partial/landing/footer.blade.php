<div id="footer" class="footer text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <a href="{{url('/')}}">
                    <img id="footerLogo" class="img-fluid avatar-sm-1-circle"
                         src="{{asset('images\default.png')}}"
                         alt="">
                </a>

                <span id="footerDescription" class="site-description d-block my-3"></span>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">
                <h6 class="footer_title text-capitalize fw-bold fs-5">site map</h6>

                <div class="row row-cols-2">
                    <div class="col">
                        <ul class="list">
                            <li class="list-item">
                                <a href="{{url('/')}}" class="list-link text-capitalize">Members</a>
                            </li>
                            <li class="list-item">
                                <a href="{{url('/information?tab=legal')}}" class="list-link text-capitalize">Legal
                                    Notice</a>
                            </li>

                            <li class="list-item">
                                <a href="{{url('/videos')}}" class="list-link text-capitalize">Videos</a>
                            </li>
                            <li class="list-item">
                                <a href="{{url('/about')}}" class="list-link text-capitalize">X-flix ?</a>
                            </li>
                            <li class="list-item">
                                <a href="{{url('/live')}}" class="list-link text-capitalize">Live</a>
                            </li>

                        </ul>
                    </div>
                    <div class="col">
                        <ul class="list">
                            <li class="list-item">
                                <a href="{{url('/inscription')}}" class="list-link text-capitalize">Inscription</a>
                            </li>
                            <li class="list-item">
                                <a href="#" data-bs-target="#loginModal" data-bs-toggle="modal"
                                   class="list-link text-capitalize">Connection</a>
                            </li>
                            <li class="list-item">
                                <a href="{{url('/information?tab=faq')}}" class="list-link text-capitalize">Faq /
                                    Contact</a>
                            </li>
                            <li class="list-item">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#contactModal"
                                   class="list-link text-capitalize">Contact</a>
                            </li>
                            <li class="list-item">
                                <a href="{{url('/information?tab=refund')}}" class="list-link text-capitalize">Refund Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">
                <h6 class="footer_title text-capitalize fw-bold fs-5">Partner site</h6>
                <ul class="row list" id="partnerList">
                </ul>
            </div>


            <div class="col-lg-3 col-sm-6 col-12">
                <h6 class="footer_title text-capitalize fw-bold fs-5">Share the Website on</h6>

                <div class="d-flex align-items-center">
                    <a id="facebook-share" href="" target="_blank" class="list-link">
                        <i class="bi bi-facebook social-icon"></i>
                    </a>

                    <a id="twitter-share" href="" target="_blank" class="list-link">
                        <i class="bi bi-twitter social-icon"></i>
                    </a>


                </div>


            </div>
        </div>
    </div>
</div>

{{--Confirmation Modal--}}
<div class="modal fade" id="confirmModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h6 class="text-capitalize">title</h6>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="text-center">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nostrum.</span>
                        </div>


                        <select id="dobyear" class="my-3 form-select py-3 px-4 rounded-0 "></select>
                        <span id="confirmErrMsg"
                              class="text-danger  d-none">Please Confirm Your Birth Year....</span>

                        <button id="birthConfirmDialogBtn"
                                class="btn btn-primary form-control py-3 px-4 rounded-0 my-3 text-capitalize">
                            confirm
                        </button>

                        <div class="text-center">
                            <span class="text-center">or</span>
                        </div>


                        <button data-bs-target="#loginModal" data-bs-toggle="modal"
                                class="btn btn-dark form-control py-3 px-4 rounded-0 my-3 text-capitalize">
                            login
                        </button>

                        <a
                            href="{{url('/auth/twitter')}}"
                            class="btn btn-tweeter form-control py-3 px-4 rounded-0 my-3 d-flex align-items-center justify-content-center"
                        >
                            <span class="iconify me-3" data-icon="akar-icons:twitter-fill" data-width="20" data-height="20"></span>
                            <span>Connect with Twitter</span>
                        </a>


                        <h6 class="text-capitalize fw-bold">terms & condition</h6>
                        <span id="confirmDialogTermsCondition" class="fw-lighter"></span>

                        <div class="border-top border-bottom py-2 my-3 text-center">
                            <p class="text-black-50">How to protect your child</p>
                            <ul class="d-flex justify-content-around align-items-center">
                                <li>
                                    <a href="">
                                        <img class="avatar"
                                             src="https://w7.pngwing.com/pngs/786/126/png-transparent-logo-contracting-photography-logo-symbol.png"
                                             alt="">
                                    </a>
                                </li>

                                <li>
                                    <a href="">
                                        <img class="avatar"
                                             src="https://w7.pngwing.com/pngs/786/126/png-transparent-logo-contracting-photography-logo-symbol.png"
                                             alt="">
                                    </a>
                                </li>

                                <li>
                                    <a href="">
                                        <img class="avatar"
                                             src="https://w7.pngwing.com/pngs/786/126/png-transparent-logo-contracting-photography-logo-symbol.png"
                                             alt="">
                                    </a>
                                </li>
                            </ul>


                        </div>
                        <span class="fw-lighter">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid aperiam consectetur cum deserunt distinctio eaque id ipsum libero maiores minima, molestias natus </span>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="contactModal" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h6 class="text-capitalize">Contact</h6>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <span>You have a question, a problem, a suggestion ... contact us</span>
                </div>
                <form action="">
                    <div class="row">
                        <div class="col-lg-6 col-12 mb-3">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="email">
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12 mb-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Object">
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-lg-12 col-12 mb-3">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Message"></textarea>
                                <span class="text-danger"></span>
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

<div class="modal fade" id="locationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h6 class="text-capitalize">GEO Location</h6>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <span>To display the profiles around you, <br> indicate the city below:</span>
                </div>
                <div class="form-group">
                    <input type="text" name="address" class="form-control  locationInput" placeholder="city">
                    <span class="locationError text-danger d-none">Please select your city</span>
                </div>
                <div class="text-center my-3">
                    <button id="location-btn" class="btn btn-primary w-75  form-control">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="forgotModal" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h6 class="text-capitalize">Recover Password</h6>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <span id="forget_modal_title">Please Enter Your Email or Phone For Recovery Password</span>
                </div>
                <form action="{{url('api/forgot-password')}}" id="recoverForm">
                    <div class="form-group">

                        <input type="text" name="emailorphone" id="emailorphone"
                               class="form-control emptyEmailPhone loginEmptyEmailPhone_input emptyEmailPhone email phone"
                               placeholder="Email or Phone" onchange="clearError(this)">
                        <span class="text-danger phone_error email_error" id="emailorphone_error"></span>

                        <span class="text-danger d-none"
                              id="loginEmptyEmailPhone">The email or phone filed is required</span>

                        <span class="text-danger d-none"
                              id="validateEmailPhone">Please, Enter the valid email or phone.</span>
                        <span class="text-danger d-none"
                              id="emailorphone_register_error">Please, Registered first</span>
                    </div>
                    <div class="text-center my-3">
                        <button type="submit" class="btn btn-primary form-control">Submit</button>
                    </div>
                </form>


                <form action="{{url('api/recover-password')}}" class="d-none" id="recoverPasswordForm">
                    <input type="hidden" name="email" id="recoverEmailHiddenInput">
                    <input type="hidden" name="phone" id="recoverPhoneHiddenInput">
                    <div class="form-group">
                        <input required type="password" name="password" id="password"
                               class="form-control email phone" placeholder="New Password">
                    </div>
                    <div class="text-center my-3">
                        <button type="submit" class="btn btn-primary form-control">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="alertModal" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h6 class="text-capitalize">Report a dangerous behavior</h6>
            </div>
            <div class="modal-body">
                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad atque consequuntur debitis dicta dolorem doloremque dolorum enim ipsam, itaque iure laboriosam libero magnam magni molestiae molestias nihil nulla </span>
                <form action="{{url("/api/alert/store")}}" id="alertForm">
                    <input type="hidden" name="reported_user_id" id="reported_user_id">

                    <div class="row my-3">
                        <div class="col-lg-4 col-sm-12 col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="reports[]" value="prostitution"
                                       id="report1">
                                <label class="form-check-label" for="report1">
                                    Prostitution
                                </label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 col-12">
                            <div class="form-check">
                                <input class="form-check-input" name="reports[]" type="checkbox" value="scam"
                                       id="report2">
                                <label class="form-check-label" for="report2">
                                    Scam
                                </label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 col-12">
                            <div class="form-check">
                                <input class="form-check-input" name="reports[]" type="checkbox" value="minor"
                                       id="report3">
                                <label class="form-check-label" for="report3">
                                    Minor
                                </label>
                            </div>
                        </div>
                    </div>

                    <label for="message" id="message_label" class="message_label">Message</label>
                    <textarea name="message" id="message" class="form-control my-3 message"
                              onchange="clearError(this)"></textarea>
                    <span id="message_error" class="text-danger message_error"></span>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary form-control w-50 ">Alert</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>

<div id="message-box">

</div>


@include('partial.landing.auth.login')
<script src="{{asset('asset/vendor/jquery/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
{{--<script src="{{asset('asset/vendor/bootstrap/js/bootstrap.min.js')}}"></script>--}}
<script src="{{asset('asset/vendor/Minimalist-jQuery-Plugin-For-Birthday-Selector-DOB-Picker/dobpicker.js')}}"></script>

<script src="{{asset('asset/vendor/toastr/toastr.js')}}"></script>
<script src="{{asset('asset/vendor/ImagesLoader-main/jquery.imagesloader-1.0.1.js')}}"></script>
<script src="{{asset('asset/vendor/rater-js-master/index.js')}}"></script>

<script src="https://vjs.zencdn.net/7.18.1/video.min.js"></script>


<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.serializeJSON/3.2.1/jquery.serializejson.min.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js"></script>
<script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/cdb.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/languages.js')}}"></script>
<script>

    $('#alertForm').submit(function (e) {
        e.preventDefault();
        let token = localStorage.getItem("accessToken");
        let form = $(this);
        let form_data = JSON.stringify(form.serializeJSON());
        let formData = JSON.parse(form_data)

        let url = form.attr('action');

        let checked = []
        $("input[name='reports[]']:checked").each(function () {
            checked.push($(this).val());

        });
        formData.reports = checked


        $.ajax({
            type: "post",
            url: url,
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                Authorization: token,
            },

            beforeSend: function () {
                $('#preloader').removeClass('d-none');
            },
            success: function (response) {

                toastr.success(response.message)
                location.reload();
            }, error: function (xhr, resp, text) {

                if (xhr && xhr.responseJSON) {
                    let response = xhr.responseJSON;
                    if (response.status && response.status === "validate_error") {
                        $.each(response.message, function (index, message) {
                            $("." + message.field).addClass("is-invalid");
                            $("." + message.field + "_label").addClass(
                                "text-danger"
                            );
                            $("." + message.field + "_error").html(message.error);
                        });
                    }
                }
            },
            complete: function (xhr, status) {
                $('#preloader').addClass('d-none');
            }

        });
    })

    function clearError(input) {
        $('#' + input.id).removeClass('is-invalid');
        $('#' + input.id + '_label').removeClass('text-danger');
        $('#' + input.id + '_icon').removeClass('text-danger');
        $('#' + input.id + '_icon_border').removeClass('field-error');
        $('#' + input.id + '_error').html('');
        $('#' + input.id + '_register_error').html('');
    }

    $('#recoverForm').submit(function (e) {
        e.preventDefault();

        let form = $(this);


        let form_data = JSON.stringify(form.serializeJSON());
        let formData = JSON.parse(form_data);

        if (formData.emailorphone) {
            let data = {
                email: null,
                phone: null,
            };

            let emailRegex =
                /(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))/;

            let numberRegex = /^\s*[+-]?(\d+|\d*\.\d+|\d+\.\d*)([Ee][+-]?\d+)?\s*$/


            if(emailRegex.test(formData.emailorphone)){
                data.email = formData.emailorphone;
                formData.email = data.email;
            }else if(numberRegex.test(formData.emailorphone)){
                data.phone = formData.emailorphone;
                formData.phone = data.phone;
            }else{
                $("#validateEmailPhone").removeClass('d-none')
                $('.emptyEmailPhone').addClass("is-invalid")
            }

        }else{
            $('#loginEmptyEmailPhone').removeClass('d-none')
            $('.emptyEmailPhone').addClass("is-invalid")
            $('.loginEmptyEmailPhone_label').addClass("text-danger")
        }

        if (formData.dob) {
            let now = new Date().getFullYear();
            formData.age = now - formData.dob;
        }


        let url = form.attr("action");



        $.ajax({
            type: 'post',
            url: url,
            data: formData,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                console.log(response)
                if (response.form === "recoverForm") {
                    if (response.data) {
                        $("#recoverPasswordForm").removeClass("d-none");
                        $("#recoverForm").addClass("d-none");

                        if (response.data.email) {
                            $("#recoverEmailHiddenInput").val(response.data.email);
                            $("#forget_modal_title").text("Set a new password for "+ response.data.email );
                        } else if (response.data.phone) {
                            $("#recoverPhoneHiddenInput").val(response.data.phone);
                            $("#forget_modal_title").text("Set a new password for "+ response.data.phone);

                        }
                    } else {
                        if(formData.emailorphone !== ''){
                            $("#emailorphone_register_error").removeClass("d-none");
                        }
                    }
                }


            },
            error: function (xhr, resp, text) {
                if (xhr && xhr.responseJSON) {
                    let response = xhr.responseJSON;
                    if (response.status && response.status === "validate_error") {
                        $.each(response.message, function (index, message) {
                            $("." + message.field).addClass("is-invalid");
                            $("." + message.field + "_label").addClass(
                                "text-danger"
                            );
                            $("." + message.field + "_error").html(message.error);
                        });
                    }
                }
            }
        });
    })

    $('#recoverPasswordForm').submit(function (e) {
        e.preventDefault();

        let form = $(this);
        formSubmit("post", form);
    })


    $(document).ready(function () {
        $.ajax({
            url: window.origin + '/api/share-website',
            type: 'GET',
            dataType: "json",
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (res) {
                $('#facebook-share').attr('href', res.data.facebook)
                $('#twitter-share').attr('href', res.data.twitter)
            }, error: function (jqXhr, ajaxOptions, thrownError) {
                console.log(jqXhr)
            }
        });


        $.ajax({
            url: window.origin + '/api/admin/setting/get-all',
            type: 'GET',
            dataType: "json",
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },

            success: function (res) {
                if (res.status === 'success' && res.data.length) {

                    Object.entries(res.data[0]).forEach(item => {
                        if (item[0] === 'image') {

                            if(item[1]){
                                item[1].forEach(img=>{
                                    if(img.logo){
                                        $('#footerLogo').attr('src',img.logo)
                                        $('#navLogo').attr('src', img.logo)
                                    }
                                })
                            }
                        }
                        if (item[0] === "legal_information") {
                            if (item[1]) {
                                Object.entries(item[1]).forEach(value => {
                                    if (value[0] === "'description'") {
                                        $('#footerDescription').text(value[1])
                                    }
                                    if (value[0] === "'terms_of_use'") {
                                        $('#confirmDialogTermsCondition').text(value[1] ? value[1]: '')
                                    }
                                    if (value[0] === "'about'") {
                                        $('#aboutUs').text(value[1] ? value[1]: '')
                                    }
                                    if (value[0] === "'notice'") {
                                        $('#legalInfo').text(value[1] ? value[1]: '')
                                    }

                                })
                            }

                        }
                        if (item[0] === "partner_site") {
                            if (item[1]) {
                                item[1].forEach(site => {
                                    $('#partnerList').append(`
                                    <li class="col-lg-6 list-item">
                                        <a href="${site.url}" class="list-link">${site.name}</a>
                                    </li>
                                `)
                                })
                            }


                        }

                    })

                }

            }, error: function (jqXhr, ajaxOptions, thrownError) {
                console.log(jqXhr)
            }
        })
    })

    $(function(){
        var userActivity = localStorage.getItem('accessToken')
        if(userActivity){
            $.ajax({
                url: "{{url('/api/user-activity-check')}}",
                method: "patch",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    "Authorization":userActivity
                },
                success:function (res){
                    console.log(res)
                },
                error:function(err){
                    console.log(err)
                }

            })
        }


    })

</script>

@stack('custom-js')


</body>
</html>
