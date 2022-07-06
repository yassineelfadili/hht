@extends('front.layouts.main')
@section('page_title', 'Gallery')
@include('front.include.breadcrumb')
@section('content')
    <!-- gallery area start here  -->
    <section class="gallery-area section-top pb-90">
        <div class="container">
            <div class="section-title text-center">
                <div class="row">
                    @if (section_title('gallery-section') != null)
                        <div class="col-lg-12">
                            <h2 class="title">{{ section_title('gallery-section')->title }} </h2>
                            <p class="subtitle">{{ section_title('gallery-section')->description }}</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="gallery-list">
                <div class="row">
                    @foreach ($galleries as $gallery)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <a href="{{ route('front.single.service', $gallery->service->slug) }}" class="single-gallery">
                                <div class="gallery-thumbnail">
                                    <img src="{{ asset(path_gallery_image() . $gallery->image) }}"
                                        alt="{{ $gallery->service->title }}" />
                                    <span class="catagory-label">{{ $gallery->service->title }}</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- gallery area start here  -->
    @include('front.include.testimonial')
    @include('front.include.doctor')
@endsection
