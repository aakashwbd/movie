@extends('layouts.landing.index')
@section('content')
    <div id="profile" class="profile">
        <div class="container">
            <ul class="nav nav-tabs justify-content-center border-0 bg-primary" id="profileNav" role="tablist">
                <li class="nav-item" role="presentation">
                    <button onclick="pageTabChanger('help')" class="nav-link {{ ((request()->get('tab')) == "faq") ? "active" : ''}}" id="info-tab"
                            data-bs-toggle="tab" data-bs-target="#information" type="button" role="tab"
                            aria-controls="home" aria-selected="true">Help
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button onclick="pageTabChanger('terms')" class="nav-link {{ ((request()->get('tab')) == "terms") ? "active" : ''}}" id="photos-tab"
                            data-bs-toggle="tab" data-bs-target="#photos" type="button" role="tab"
                            aria-controls="profile" aria-selected="false">Terms of use
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button onclick="pageTabChanger('legal')" class="nav-link {{ ((request()->get('tab')) == "legal") ? "active" : ''}}" id="setting-tab"
                            data-bs-toggle="tab" data-bs-target="#setting" type="button" role="tab"
                            aria-controls="contact" aria-selected="false">Legal Notice
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button onclick="pageTabChanger('refund')" class="nav-link {{ ((request()->get('tab')) == "refund") ? "active" : ''}}" id="setting-tab"
                            data-bs-toggle="tab" data-bs-target="#refund" type="button" role="tab"
                            aria-controls="contact" aria-selected="false">Refund Policy
                    </button>
                </li>
            </ul>
            <div class="tab-content bg-white" id="profileNavContent">
                <div class="tab-pane fade show  p-4 {{ ((request()->get('tab')) == "faq") ? "active" : ''}}"
                     id="information" role="tabpanel">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <input type="search" placeholder="Search.." class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <span class="text-black-50">The FAQ answers practical questions that you can ask yourself using the site. A search engin is available if you can not find a response <a
                                        href="#" data-bs-target="#contactModal" data-bs-toggle="modal"
                                        class="text-decoration-underline text-black-50">contact us</a> </span>
                            </div>
                        </div>


                        <div class="accordion my-3" id="accordionExample">


                        </div>
                        <div class="notFoundData">Please create faq at admin panel to show in your site</div>

                    </div>
                </div>
                <div class="tab-pane fade show p-4 {{ ((request()->get('tab')) == "terms") ? "active" : ''}}" id="photos" role="tabpanel">
                    <div id="terms"></div>
                    <div class="notFoundData">Please create terms of use & conditions at admin panel to show in your site</div>
                </div>
                <div class="tab-pane fade show p-4 {{ ((request()->get('tab')) == "legal") ? "active" : ''}}"
                     id="setting" role="tabpanel">
                    <div class="container">
                        <h4 class="my-3"></h4>

                        <span id="legalInfo"></span>
                        <div class="notFoundData">Please create legal information at admin panel to show in your site</div>
                        <address></address>
                    </div>
                </div>

                <div class="tab-pane fade show p-4 {{ ((request()->get('tab')) == "refund") ? "active" : ''}}"
                     id="refund" role="tabpanel">
                    <div class="container">
                        <h4 class="my-3"></h4>

                        <span id="refundInfo"></span>
                        <div class="notFoundData">Please create refund policies at admin panel to show in your site</div>
                        <address></address>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@push('custom-js')
    <script>

        /**
         * Change the current page title
         * */
        let currentPath = window.location.search

        currentPath === '?tab=legal'? document.title = 'Legal Notice' : ''
        currentPath === '?tab=faq'? document.title = 'Help' : ''
        currentPath === '?tab=refund'? document.title = 'Refund Policies' : ''
        currentPath === '?tab=terms'? document.title = 'Terms of use' : ''


        /**
         * tab changer
         * */
        pageTabChanger = function (tab){
            tab === 'help' ? location.href = window.origin + '/information?tab=faq' : ''
            tab === 'legal' ? location.href = window.origin + 'information?tab=legal' : ''
            tab === 'refund' ? location.href = window.origin + '/information?tab=refund' : ''
            tab === 'terms' ? location.href = window.origin + '/information?tab=terms' : ''
        }


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
                    // console.log(res)

                    Object.entries(res.data[0]).forEach(item => {

                        if (item[0] === "help") {
                            if (item[1]) {
                                $('.notFoundData').addClass('d-none')
                                item[1].forEach((value, index) => {
                                    $("#accordionExample").append(`
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="question${index}">
                                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer${index}" >
                                                              ${value.question}
                                                  </button>
                                                </h2>
                                                <div id="answer${index}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                  <div class="accordion-body">
                                                    <strong>${value.answer}</strong>
                                                  </div>
                                                </div>
                                              </div>
                                   `)

                                })
                            }

                        }

                        if (item[0] === "legal_information") {

                            Object.entries(item[1]).forEach(value=>{

                                if(value[0] === "'terms_of_use'"){
                                    $('#terms').text(value[1])
                                    $('.notFoundData').addClass('d-none')
                                }
                                if(value[0] === "'refund_policy'"){
                                    $('#refundInfo').text(value[1])
                                    $('.notFoundData').addClass('d-none')
                                }
                            })
                        }


                    })

                }

            }, error: function (jqXhr, ajaxOptions, thrownError) {
                console.log(jqXhr)
            }
        })
    </script>
@endpush
