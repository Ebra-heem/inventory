@extends('layouts.master')

@section('content')
<section class="section">
                    <div class="row ">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                           
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <h5 class="font-15"> Purchase Total</h5>
                                                    <h2 class="mb-3 font-18">{{ $total }}</h2>
                                                    
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content text-success">
                                                    <h5 class="font-15">Purchase Paid</h5>
                                                    <h2 class="mb-3 font-18">{{ $paid }}</h2>
                                                    
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content text-danger">
                                                    <h5 class="font-15">Purchase Due</h5>
                                                    <h2 class="mb-3 font-18">{{ $due }}</h2>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <h5 class="font-15">Revenue</h5>
                                                    <h2 class="mb-3 font-18">$48,697</h2>
                                                    <p class="mb-0"><span class="col-green">42%</span> Increase</p>
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                <div class="banner-img">
                                                    <img src="{{asset('admin/')}}/assets/img/banner/4.png" alt="">
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                           
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <h5 class="font-15">Today Purchase Total</h5>
                                                    <h2 class="mb-3 font-18">{{ $today_total }}</h2>
                                                    
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content text-success">
                                                    <h5 class="font-15">Today Purchase Paid</h5>
                                                    <h2 class="mb-3 font-18">{{ $today_paid }}</h2>
                                                    
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content text-danger">
                                                    <h5 class="font-15">Today Purchase Due</h5>
                                                    <h2 class="mb-3 font-18">{{ $today_due }}</h2>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <h5 class="font-15">Revenue</h5>
                                                    <h2 class="mb-3 font-18">$48,697</h2>
                                                    <p class="mb-0"><span class="col-green">42%</span> Increase</p>
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                <div class="banner-img">
                                                    <img src="{{asset('admin/')}}/assets/img/banner/4.png" alt="">
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   
                    
                </section>

@endsection