@extends('layouts.main')
@section('content')
<style>
    .blog-banner-overlay{
        /* background: linear-gradient(180deg, #000000 0%, #113165e8 100%); */
        background: linear-gradient(180deg, #000000 0%, #113165c7 100%);
        height: 100%;
    }
    .styling-cards>div{
        margin-bottom: 25px;
    }
    @media (min-width: 768px){
        .styling-cards{
            display: grid;
            grid-template-columns: 1fr 1fr;
            width: 100%;
            gap: 26px;
        }
    }
    @media (min-width: 1024px){
        .styling-cards{
            display: grid;
            grid-template-columns: 1fr 1fr;
            width: 100%;
            gap: 26px;
        }
        .styling-cards>div{
            border-radius: 5px;
            overflow: hidden;
            margin-bottom: 0;
        }
    }

</style>
@include('frontend.Common.whatsapplogo')

{{-- blogs banner --}}
<div class="blog-banner bg-[#051b3b] md:h-[50vh]">
    <div class="blog-banner-overlay">
        <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[8%]">
            <div class="text-left text-white mt-10">
                <h2 class="uppercase font_inter font-semibold text-[40px]">@if(isset($blogContents)) {{$blogContents->blog_title}} @endif</h2>
                <p class="lg:w-[35%] mt-5 font_inter font-semibold text-[12px]">
                    @if(isset($blogContents)) {{$blogContents->blog_description}} @endif
                </p>
            </div>
        </div>
    </div>
</div>

{{-- Blog sect --}}
<div class="BlogCRDS bg-[#051b3b]">
    <div class="container mx-auto px-5 py-12 xl:px-12  h-full w-full">
        <div id="" class="pt-[20px] md:pb-[40px] lg:grid grid-cols-3 items-center gap-9">
            @foreach ($blogs as $data)
                <div class="mb-10 lg:mb-0">
                    <a href="{{url('blog-details/'.$data->slug)}}">
                        <div class="mx-auto bg-[#051b3b] shadow-lg rounded-lg overflow-hidden mt-[8px] 2xl:mt-10 lg:h-fit w-full sm:max-w-sm h-auto">
                            <img class="w-full object-cover lg:h-[170px] 2xl:h-[225px] aspect-video" src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->image }}"  alt="{{ $data->alt_tag }}">
                            <div class="p-6 border-b border-l border-r border-white rounded-lg mt-[-7px]">
                                <?php $date = $data->date . ' ' . $data->time; ?>

                                <div class="flex items-center justify-between">
                                    <p class="text-white text-[8px] 2xl:text-[10px] flex items-center gap-[8px]">
                                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.2207 2.13379H7.5957V1.19629C7.5957 0.891602 7.83008 0.633789 8.1582 0.633789C8.46289 0.633789 8.7207 0.891602 8.7207 1.19629V2.13379H9.6582C10.4785 2.13379 11.1582 2.81348 11.1582 3.63379V11.1338C11.1582 11.9775 10.4785 12.6338 9.6582 12.6338H2.1582C1.31445 12.6338 0.658203 11.9775 0.658203 11.1338V3.63379C0.658203 2.81348 1.31445 2.13379 2.1582 2.13379H3.0957V1.19629C3.0957 0.891602 3.33008 0.633789 3.6582 0.633789C3.96289 0.633789 4.2207 0.891602 4.2207 1.19629V2.13379ZM1.7832 6.44629H3.6582V5.13379H1.7832V6.44629ZM1.7832 7.57129V9.07129H3.6582V7.57129H1.7832ZM4.7832 7.57129V9.07129H7.0332V7.57129H4.7832ZM8.1582 7.57129V9.07129H10.0332V7.57129H8.1582ZM10.0332 5.13379H8.1582V6.44629H10.0332V5.13379ZM10.0332 10.1963H8.1582V11.5088H9.6582C9.8457 11.5088 10.0332 11.3447 10.0332 11.1338V10.1963ZM7.0332 10.1963H4.7832V11.5088H7.0332V10.1963ZM3.6582 10.1963H1.7832V11.1338C1.7832 11.3447 1.94727 11.5088 2.1582 11.5088H3.6582V10.1963ZM7.0332 5.13379H4.7832V6.44629H7.0332V5.13379Z" fill="white"/>
                                        </svg>

                                        {{ date('M j, Y h:i:s A', strtotime($date)) }}
                                    </p>
                                    <div class="flex items-center gap-[10px] text-white">
                                        <svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.375 7.75879C8.64844 7.75879 10.5 9.61035 10.5 11.8838C10.5 12.3057 10.1484 12.6338 9.75 12.6338H0.75C0.328125 12.6338 0 12.3057 0 11.8838C0 9.61035 1.82812 7.75879 4.125 7.75879H6.375ZM1.125 11.5088H9.35156C9.16406 10.0322 7.89844 8.88379 6.375 8.88379H4.125C2.57812 8.88379 1.3125 10.0322 1.125 11.5088ZM5.25 6.63379C3.58594 6.63379 2.25 5.29785 2.25 3.63379C2.25 1.99316 3.58594 0.633789 5.25 0.633789C6.89062 0.633789 8.25 1.99316 8.25 3.63379C8.25 5.29785 6.89062 6.63379 5.25 6.63379ZM5.25 1.75879C4.19531 1.75879 3.375 2.60254 3.375 3.63379C3.375 4.68848 4.19531 5.50879 5.25 5.50879C6.28125 5.50879 7.125 4.68848 7.125 3.63379C7.125 2.60254 6.28125 1.75879 5.25 1.75879Z" fill="white"/>
                                        </svg>
                                        <span class="text-white text-[10px]">By {{ $data->name }}</span>
                                    </div>
                                </div>

                                <h2 class="text-[12px] 2xl:text-[14px] font-bold text-white mt-[10px] 2xl:mt-[12px] lg:w-[60%] clamp-text-two h-[60px]">
                                    {{ $data->topics }}</h2>
                                <div class="text-white text-[14px] my-0 clamp-text">
                                    {!! $data->description !!}
                                </div>
                                <div class="pt-[18px] 2xl:pt-[25px]">
                                    <a href="{{url('blog-details/'.$data->slug)}}" class="text-[10px] 2xl:text-[10px] font_inter flex items-center text-white gap-[10px]">
                                        Read more
                                        <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.0957 6.00098L10.5957 9.50098C10.2676 9.85645 9.69336 9.85645 9.36523 9.50098C9.00977 9.17285 9.00977 8.59863 9.36523 8.27051L11.3613 6.24707H1.24414C0.751953 6.24707 0.369141 5.86426 0.369141 5.37207C0.369141 4.85254 0.751953 4.49707 1.24414 4.49707H11.3613L9.36523 2.50098C9.00977 2.17285 9.00977 1.59863 9.36523 1.27051C9.69336 0.915039 10.2676 0.915039 10.5957 1.27051L14.0957 4.77051C14.4512 5.09863 14.4512 5.67285 14.0957 6.00098Z" fill="white"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
