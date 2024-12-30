@extends('frontend.layouts.master')
@section('content')
    <div id="carouselExampleCaptions" class="carousel slide d-none d-md-block">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://tenders.nadra.gov.pk/img/slider_images/Tenders.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-flex align-items-center justify-content-start" style="min-height: 100%; text-align: left; left: 5%;">
                    <h5 class="fw-bold text-dark display-6">Active Tenders</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://tenders.nadra.gov.pk/img/slider_images/Evaluation.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-flex align-items-center justify-content-start" style="min-height: 100%; text-align: left; left: 5%;">
                    <h5 class="fw-bold text-dark display-6">Bid Evaluation Results</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://tenders.nadra.gov.pk/img/slider_images/Request%20for%20Quotation.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-flex align-items-center justify-content-start" style="min-height: 100%; text-align: left; left: 5%;">
                    <h5 class="fw-bold text-dark display-6">Active RFQs</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="input-group">
                    <input type="search" class="form-control border-success rounded-start form-control-lg" placeholder="Search here..." aria-label="Search" aria-describedby="search-addon" />
                    <button type="button" class="btn btn-success btn-lg px-4" aria-label="Search Button">
                        <i class="fa-solid fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-css')
@endpush
@push('custom-js')
@endpush
