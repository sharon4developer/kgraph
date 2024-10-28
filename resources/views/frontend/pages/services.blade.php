@extends('layouts.main')
@section('content')
<style>
    .services-grade{
        background: linear-gradient(22deg, #FFFFFF 0%, rgba(255, 255, 255, 0) 100%);
    }
</style>
@include('frontend.Common.whatsapplogo')
{{-- services banner --}}
<div class="services-banner">
    <div class="services-banner-overlay">
        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[8%]">
            <div class="text-left text-white">
                <h2 class="uppercase font_inter font-semibold text-[40px] lg:mt-[6rem]">@if(isset($serviceContents)) {{$serviceContents->service_title}} @endif</h2>
                <p class="lg:w-[85%] mt-5 font_inter font-semibold text-[12px]">
                    @if(isset($serviceContents)) {{$serviceContents->service_description}} @endif
                </p>
            </div>
        </div>
    </div>
</div>

{{-- services section --}}
<div class="choose-yor h-full bg-[#081e44]">
    @foreach ($serviceCategory as $data)
    <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 lg:py-12">
        <div class="services-grade w-full py-2 rounded-md">
            <h2 class="text-[#072459] font_inter text-[20px] pl-4 font-extrabold capitalize">{{$data->title}}</h2>
        </div>
        <h6 class="py-6 text-white">Choose your Services</h6>

        {{-- scroll need --}}
        <div class="grid justify-start gap-4 items-center choose-you-service">
            @foreach ($data->Service as $service)
                <a href="{{url('service-details/'.$service->slug)}}" class="block w-full">
                    <div class="w-full bg-white rounded-xl overflow-hidden lg:h-[380px]">
                        <div class="w-full h-[220px] bg-cover bg-center rounded-xl" style="background-image: url('{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $service->image }}');">
                        </div>
                        <div class="text-left px-5 pt-2 pb-8">
                            <h6 class="clamp-text-one py-3 font-bold font_inter text-[15px]">{{$service->title}}</h6>
                            {{-- <p class="mt-[5px]">{{$ServicePoint->title}}</p> --}}
                        </div>

                        <div class="flex justify-center pb-8">
                            <button class="flex items-center justify-between gap-4 border border-black rounded-full px-6 py-2">
                                <div class="text-black">View</div>
                                <div>
                                    <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="black" d="M12.2576 6.42676L7.95285 10.7315C7.79142 10.8929 7.57618 10.9736 7.36095 10.9736C7.11881 10.9736 6.90357 10.8929 6.74214 10.7315C6.39238 10.4086 6.39238 9.84364 6.74214 9.52079L9.56712 6.6689H1.33432C0.850037 6.6689 0.473373 6.29224 0.473373 5.80795C0.473373 5.35057 0.850037 4.94701 1.33432 4.94701H9.56712L6.74214 2.12202C6.39238 1.79917 6.39238 1.23417 6.74214 0.911318C7.065 0.561558 7.62999 0.561558 7.95285 0.911318L12.2576 5.21605C12.6073 5.53891 12.6073 6.1039 12.2576 6.42676Z" fill="white"/>
                                    </svg>
                                </div>
                            </button>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
    @endforeach
</div>

{{-- regulated section --}}
<div class="RegulatedSec bg-black">
    <div class="container mx-auto px-5 lg:px-12 py-6 lg:py-16 h-full w-full">
        <div class="md:flex justify-center items-start gap-5">
            <div class="md:w-3/4 flex flex-col justify-center items-center text-center">
                <h2 class="text-white font_inter font-semibold text-2xl lg:text-3xl lg:w-[55%]">@if(isset($serviceContents)) {{$serviceContents->certificate_title}} @endif</h2>
                <p class="py-5 text-white font-normal font_inter text-[14px] lg:w-[50%]">@if(isset($serviceContents)) {{$serviceContents->certificate_description}} @endif</p>
                <div class="flex flex-col md:flex-row gap-5 items-center">
                    @foreach ($certificate as $data)
                    <img class="w-[200px]" src="{{ $locationData['storage_server_path'].$locationData['storage_image_path'].$data->image }}" alt="{{$data->alt_tag}}">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.Common.getintouch')

@endsection
