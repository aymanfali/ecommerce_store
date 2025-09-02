,@extends('layouts.app')

@section('title', 'About')
@section('content')
    <div>
        <div class="container-fluid products pt-5">
            <div class="container products-mini py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 700px;">
                    <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius wow fadeInUp"
                        data-wow-delay="0.1s">{{ $aboutUs['title'] }}</h4>
                    <p class="mb-0 wow fadeInUp" data-wow-delay="0.2s">{{ $aboutUs['description'] }}</p>
                </div>
                <div class="mx-auto text-center mb-5" style="max-width: 700px;">
                    <p class="mb-0 wow fadeInUp" data-wow-delay="0.2s">{!! $aboutUs['rawHtml'] !!}</p>
                </div>
                <span class="mb-0 wow fadeInUp">@php
                    echo 'Ayman Fahd @ ' . date('Y');
                @endphp</span>
            </div>
        </div>

    </div>
@endsection
