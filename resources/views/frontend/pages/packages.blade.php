@extends('layouts.main')
@section('content')

<style>

</style>


{{-- services banner --}}
<div class="services-banner md:h-fit">
    <div class="services-banner-overlay">
        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:pt-[8%] lg:pb-[5%]">
            <div class="text-left text-white mt-10">
                <h2 class="uppercase font_inter font-semibold text-[40px] mt-[90px]">Immigration packages</h2>
                <p class="lg:w-[46%] mt-5 font_inter font-semibold text-[16px]">
                    Studying in America can be an exciting experience, but it also comes with its own set of challenges.
                    One such challenge is getting your US student visa approved by the US embassy or consulate
                </p>
            </div>
        </div>
    </div>
</div>

{{-- Immigration packages choose --}}
<div class="bg-[#062358] h-full">
    <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[8%]">
        <div class="packages-boxes">
            @foreach ($packages as $data)
            <div class="mb-10 lg:mb-0 rounded-xl overflow-hidden">
                <div class="lg:max-h-[200px] overflow-hidden">
                    <img class="object-cover w-full" src="{{ $locationData['storage_server_path'].$locationData['storage_image_path'].$data->image }}" alt="{{$data->alt_tag}}">
                </div>
                <div class="bg-white px-7 py-4 lg:h-full">
                    <h5 class="font_inter font-bold text-base text-[#082559]">{{$data->country}}</h5>
                    <p class="font_inter font-semibold text-sm text-[#082559] py-4">{{$data->description}}</p>
                    <a href="{{url('package-details/'.$data->id)}}" class="border border-[#082559] text-[#082559] font_inter font-semibold text-sm px-10 py-2 rounded-full">View -></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@include('frontend.Common.getintouch')

@endsection
{{-- Immigration packages --}}
