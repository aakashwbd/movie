@extends('layouts.landing.index')
@section('content')

    <div id="package" class="package content-config " style="min-height: 60vh">
        <div class="container bg-white my-5 py-3">

            <div class="row" id="packageList">
                <div class="col-lg-3 col-sm-12 col-12 mb-3">
                    <div class="package-item" id="free">
                        <h6 class="package-title" id="package-title-1"></h6>

                        <ul class="package-list">
                            <li class="package-list-item package-list-active" onclick="clickHandler()">
                                <span class="iconify icon" data-icon="emojione-monotone:heavy-check-mark"
                                      data-width="20" data-height="20"></span>

                                <span>view members directory</span>

                            </li>
                            <li class="package-list-item package-list-active">
                                <span class="iconify icon" data-icon="emojione-monotone:heavy-check-mark"
                                      data-width="20" data-height="20"></span>
                                <span>
                                    view members profile
                                </span>

                            </li>
                            <li class="package-list-item package-list-inactive">
                                <span class="iconify icon" data-icon="emojione-monotone:cross-mark" data-width="20"
                                      data-height="20"></span>
                                <span>send 1 private message</span>


                            </li>
                            <li class="package-list-item package-list-inactive">
                                <span class="iconify icon" data-icon="emojione-monotone:cross-mark" data-width="20"
                                      data-height="20"></span>
                                <span>add 1 media to your profile</span>

                            </li>
                        </ul>

                        <h6 class="package-title" id="package-price-1"></h6>

                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 col-12 mb-3">
                    <div class="package-item bronze" id="bronze">
                        <h6 class="package-title" id="package-title-2"></h6>

                        <ul class="package-list">
                            <li class="package-list-item package-list-active">
                                <span class="iconify icon" data-icon="emojione-monotone:heavy-check-mark"
                                      data-width="20" data-height="20"></span>

                                <span>view members directory</span>

                            </li>
                            <li class="package-list-item package-list-active">
                                <span class="iconify icon" data-icon="emojione-monotone:heavy-check-mark"
                                      data-width="20" data-height="20"></span>
                                <span>
                                    view members profile
                                </span>

                            </li>
                            <li class="package-list-item package-list-inactive">
                                <span class="iconify icon" data-icon="emojione-monotone:cross-mark" data-width="20"
                                      data-height="20"></span>
                                <span>send 3 private message</span>


                            </li>
                            <li class="package-list-item package-list-inactive">
                                <span class="iconify icon" data-icon="emojione-monotone:cross-mark" data-width="20"
                                      data-height="20"></span>
                                <span>add 3 media to your profile</span>

                            </li>
                        </ul>

                        <h6 class="package-price" id="package-price-2"></h6>

                        <span class="d-block">per month</span>
                        <span class="d-block text-capitalize">unlimited <span id="unlimited-2"></span> month</span>
                        <span class="d-block text-capitalize">(<span id="limited-2"></span> month free)</span>
                        <span class="d-block text-capitalize">7 month billed a payment of 42</span>
                        <button class="btn btn-outline-light mt-3" id="payBtn2">Buy Now</button>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 col-12 mb-3">
                    <div class="package-item silver">
                        <h6 class="package-title" id="package-title-3"></h6>
                        <span>popular plan</span>

                        <ul class="package-list">
                            <li class="package-list-item package-list-active">
                                <span class="iconify icon" data-icon="emojione-monotone:heavy-check-mark"
                                      data-width="20" data-height="20"></span>

                                <span>view members directory</span>

                            </li>
                            <li class="package-list-item package-list-active">
                                <span class="iconify icon" data-icon="emojione-monotone:heavy-check-mark"
                                      data-width="20" data-height="20"></span>
                                <span>
                                    view members profile
                                </span>

                            </li>
                            <li class="package-list-item package-list-inactive">
                                <span class="iconify icon" data-icon="emojione-monotone:heavy-check-mark"
                                      data-width="20" data-height="20"></span>
                                <span>send 5 private message</span>


                            </li>
                            <li class="package-list-item package-list-inactive">
                                <span class="iconify icon" data-icon="emojione-monotone:cross-mark" data-width="20"
                                      data-height="20"></span>
                                <span>add 5 media to your profile</span>

                            </li>
                        </ul>

                        <h6 class="package-price" id="package-price-3"></h6>

                        <span class="d-block">per month</span>
                        <span class="d-block text-capitalize">unlimited 6 month</span>
                        <span class="d-block text-capitalize">(3 month free)</span>
                        <span class="d-block text-capitalize">7 month billed a payment of 42</span>
                        <button class="btn btn-outline-light mt-3" id="payBtn3">Buy Now</button>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 col-12 mb-3">
                    <div class="package-item plus">
                        <h6 class="package-title" id="package-title-4"></h6>
                        <ul class="package-list">
                            <li class="package-list-item package-list-active">
                                <span class="iconify icon" data-icon="emojione-monotone:heavy-check-mark"
                                      data-width="20" data-height="20"></span>

                                <span>view members directory</span>

                            </li>
                            <li class="package-list-item package-list-active">
                                <span class="iconify icon" data-icon="emojione-monotone:heavy-check-mark"
                                      data-width="20" data-height="20"></span>
                                <span>
                                    view members profile
                                </span>

                            </li>
                            <li class="package-list-item package-list-active">
                                <span class="iconify icon" data-icon="emojione-monotone:heavy-check-mark"
                                      data-width="20" data-height="20"></span>
                                <span>send 3 private message</span>


                            </li>
                            <li class="package-list-item package-list-active">
                                <span class="iconify icon" data-icon="emojione-monotone:heavy-check-mark"
                                      data-width="20" data-height="20"></span>
                                <span>add 3 media to your profile</span>

                            </li>
                        </ul>

                        <h6 class="package-price" id="package-price-4"></h6>

                        <span class="d-block">per month</span>
                        <span class="d-block text-capitalize">unlimited 6 month</span>
                        <span class="d-block text-capitalize">(3 month free)</span>
                        <span class="d-block text-capitalize">7 month billed a payment of 42</span>

                        <button class="btn btn-outline-light mt-3" id="payBtn4">Buy Now</button>
                    </div>
                </div>

{{--                <div class="col-lg-2 col-sm-12 col-12 mb-3">--}}
{{--                    <div class="private-room">--}}
{{--                        <span>Top Room Private</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

    <div class="modal fade" id="payModal2" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h6 class="text-capitalize">Payment: </h6>
                </div>
                <div class="modal-body">

                    <span id="modal-package-name2"></span>
                    <h6 id="modal-package-price2"></h6>

                    <div id="paypal-button-container3"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="payModal3" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h6 class="text-capitalize">Payment: </h6>
                </div>
                <div class="modal-body">

                    <span id="modal-package-name3"></span>
                    <h6 id="modal-package-price3"></h6>

                    <div id="paypal-button-container2"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="payModal4" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h6 class="text-capitalize">Payment: </h6>
                </div>
                <div class="modal-body">

                    <span id="modal-package-name4"></span>
                    <h6 id="modal-package-price4"></h6>

                    <div id="paypal-button-container1"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('custom-js')
    <script src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL_CLIENT_ID')}}&currency={{env('PAYPAL_CURRENCY')}}"></script>
    <script>
        /**
         * Change the current page title
         * */
        window.location.pathname === '/package'? document.title = 'Packages' : ''



        let bronzePrice = null
        let silverPrice = null
        let plusPrice = null

        let bronzePackage = null


        $(document).ready(function () {
            $.ajax({
                url: window.origin + '/api/admin/package/all-list',
                type: 'get',
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (res) {
                    if (res.status === 'success') {
                        console.log(typeof res.data[0])
                        bronzePackage = res.data[1]

                        $('#package-title-1').text(res.data[0].name)
                        $('#package-title-2').text(res.data[1].name)
                        $('#package-title-3').text(res.data[2].name)
                        $('#package-title-4').text(res.data[3].name)

                        $('#modal-package-name2').text('Package Name: ' + res.data[1].name)
                        $('#modal-package-name3').text('Package Name: ' + res.data[2].name)
                        $('#modal-package-name4').text('Package Name: ' + res.data[3].name)



                        $('#package-price-1').text(res.data[0].price ? res.data[0].price : 'Free')
                        $('#package-price-2').text(res.data[1].price ? "$ "+ res.data[1].price : '$ ')
                        $('#package-price-3').text(res.data[2].price ? "$ "+ res.data[2].price : '$')
                        $('#package-price-4').text(res.data[3].price ? "$ "+ res.data[3].price : '$')

                        $('#modal-package-price2').text('Price: $' + res.data[1].price)
                        $('#modal-package-price3').text('Price: $' + res.data[2].price)
                        $('#modal-package-price4').text(res.data[3].price ? 'Price: $' + res.data[3].price : 'Price: $')

                        bronzePrice = res.data[1].price
                        silverPrice = res.data[2].price
                        plusPrice = res.data[3].price
                    }

                }, error: function (jqXhr, ajaxOptions, thrownError) {
                    console.log(jqXhr)
                }
            });

        })



        let price = null
        let packageList = null

        $(document).on('click', '#payBtn2', function () {
            $('#payModal2').modal('show')
            price = bronzePrice
            packageList = JSON.stringify(bronzePackage)

            // localStorage.setItem('helloPackage', JSON.stringify(bronzePackage))

            // console.log('brx', bronzePackage)

        })

        $(document).on('click', '#payBtn3', function () {
            $('#payModal3').modal('show')
            price = silverPrice

        })

        $(document).on('click', '#payBtn4', function () {
            $('#payModal4').modal('show')
            price = plusPrice

        })

        let user = JSON.parse(localStorage.getItem('user'))



        const paypalButtonsComponent = paypal.Buttons({
            style: {
                color: "gold",
                shape: "rect",
                layout: "vertical"
            },

            createOrder: (data, actions) => {
                const createOrderPayload = {
                    intent: "CAPTURE",
                    purchase_units: [
                        {
                            reference_id: "REFID-000-1001",
                            amount: {
                                value: price
                            }

                        }
                    ],
                };

                return actions.order.create(createOrderPayload);
            },

            onApprove: (data, actions) => {
                const captureOrderHandler = (details) => {
                    let token = localStorage.getItem('accessToken')
                    let list = JSON.parse(packageList)
                    $.ajax({
                        url: window.origin + '/api/checkout',
                        type: 'POST',
                        data: list,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            'Authorization': token
                        },
                        success: function (res) {
                            console.log(res)
                        }, error: function (jqXhr, ajaxOptions, thrownError) {
                            console.log(jqXhr)
                        }
                    });
                };
                return actions.order.capture().then(captureOrderHandler);
            },
            onError: (err) => {
                console.error('An error prevented the buyer from checking out with PayPal');
            }
        });

        paypalButtonsComponent
            .render("#paypal-button-container1")
            .catch((err) => {
                console.error('PayPal Buttons failed to render');
            });

        paypalButtonsComponent
            .render("#paypal-button-container2")
            .catch((err) => {
                console.error('PayPal Buttons failed to render');
            });

        paypalButtonsComponent
            .render("#paypal-button-container3")
            .catch((err) => {
                console.error('PayPal Buttons failed to render');
            });
    </script>
@endpush
