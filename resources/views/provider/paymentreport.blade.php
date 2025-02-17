@extends('provider.provider')

@section('content')
<div class="page-wrapper page-settings">
    <div class="content">

        <!-- Breadcrumb -->
        <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
            <div class="my-auto mb-2">
                <h2 class="page-title mb-1">{{ __('Payment Report') }}</h2>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ Auth::user()->user_type == 2 ? route('provider.dashboard') : route('staff.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Payment Report') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
                <div class="mb-2">
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                            <i class="ti ti-file-export me-1"></i>Export
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end p-3">
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1" id="export_pdf"><i class="ti ti-file-type-pdf me-1"></i>Export as PDF</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1" id="export_excel"><i class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <div class="row">

            <!-- Total Exponses -->
            <div class="col-xl-6 d-flex">
                <div class="row flex-fill">
                    <div class="col-lg-6 col-md-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body ">
                                <div
                                    class="d-flex flex-wrap align-items-center justify-content-between pb-2">
                                    <div class="d-flex align-items-center flex-column overflow-hidden">
                                        <div>
                                            <div>
                                                <span class="fs-14 fw-normal text-truncate mb-1">Total
                                                    Payments</span>
                                                <div id="total-payments">
                                                    <h5 class="mt-3"></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                                        <a href="#"
                                            class="avatar avatar-md br-5 payment-report-icon  bg-transparent-primary border border-primary">
                                            <div id="total_currency">
                                                <span class="text-primary"></span>
                                            </div>

                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body ">
                                <div
                                    class="d-flex flex-wrap align-items-center justify-content-between  pb-2">
                                    <div class="d-flex align-items-center flex-column overflow-hidden">
                                        <div>
                                            <div>
                                                <span class="fs-14 fw-normal text-truncate mb-1">Provider
                                                    Payments</span>
                                                <div id="provider-payments">
                                                    <h5 class="mt-3"></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                                        <a href="#"
                                            class="avatar avatar-md br-5 payment-report-icon  bg-transparent-skyblue border border-skyblue">
                                            <div id="total_currency">
                                                <span class="text-primary"></span>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body ">
                                <div
                                    class="d-flex flex-wrap align-items-center justify-content-between  pb-2">
                                    <div class="d-flex align-items-center flex-column overflow-hidden">
                                        <div>
                                            <div>
                                                <span class="fs-14 fw-normal text-truncate mb-1">Leads
                                                    Payments</span>
                                                <div id="leads-payments">
                                                    <h5 class="mt-3"></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                                        <a href="#"
                                            class="avatar avatar-md br-5 payment-report-icon  bg-transparent-danger border border-danger">
                                            <div id="total_currency">
                                                <span class="text-primary"></span>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Total Exponses -->

            <!-- Total Exponses -->
            <div class="col-xl-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-header border-0">
                        <div class="d-flex flex-wrap row-gap-2 justify-content-between align-items-center">
                            <div class="d-flex align-items-center ">
                                <span class="me-2"><i class="ti ti-chart-donut text-danger"></i></span>
                                <h5>Payments By Payment Methods </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between pt-0">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="position-relative payment-total">
                                    <div id="payment-report"></div>
                                    <div class="payment-total-content" id="total-payments">
                                        <span class="display-3 fs-24 fw-bold text-skyblue"></span>
                                        <p>Total amount paid</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row gy-4">
                                    <div class="col-md-6" id="paypal_chat">
                                        <h6 class="fs-16 text-gray-5 fw-normal side-badge mb-1">Paypal</h6>
                                        <h5 class="fs-20 fw-bold"></h5>
                                    </div>
                                    <div class="col-md-6" id="strpie_chat">
                                        <h6 class="fs-16 text-gray-5 fw-normal side-badge-pink mb-1"> Stripe</h6>
                                        <h5 class="fs-20 fw-bold"></h5>
                                    </div>
                                    <div class="col-md-5" id="wallet_chat">
                                        <h6 class="fs-16 text-gray-5 fw-normal side-badge-purple mb-1"> Wallet</h6>
                                        <h5 class="fs-20 fw-bold"></h5>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- /Total Exponses -->


        </div>

        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom-0">
                <h5>Payment List</h5>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">
                    <div class="me-3">
                        <div class="input-icon-end position-relative">
                            <input type="text" class="form-control date-range bookingrange filter_date"
                                placeholder="dd/mm/yyyy" id="filter_date">
                            <span class="input-icon-addon">
                                <i class="ti ti-chevron-down"></i>
                            </span>
                        </div>
                    </div>
                    <div class="dropdown me-3">
                        <select name="filter_payment" id="filter_payment" class="form-control filter_payment">
                            <option value="All">Select Payment Type</option>
                            <option value="Paypal">Paypal</option>
                            <option value="Stripe">Stripe</option>
                        </select>
                    </div>

                    <div class="dropdown me-3">
                        <select name="filter_type" id="filter_type" class="form-control filter_type">
                            <option value="All">Select Type</option>
                            <option value="Booking">Booking</option>
                            <option value="Leads">Leads</option>
                        </select>
                    </div>
                    <div class="dropdown me-3">
                        <select name="filter_sort" id="filter_sort" class="form-control filter_sort">
                            <option value="desc">Sort By</option>
                            <option value="asc">{{ __('Ascending') }}</option>
                            <option value="desc">{{ __('Descending') }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="custom-datatable-filter table-responsive">
                    <table class="table" id="paymentReportList">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Provider Name</th>
                                <th>Type</th>
                                <th>Payment Type</th>
                                <th>Paid Date</th>
                                <th>Paid Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="paymentReportList">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection