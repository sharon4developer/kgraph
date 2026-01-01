@extends('layouts.main')

@section('content')
@php
    $locationData = getLocationData();
    $journeyData = $journey->first() ?? null;
    $crewData = isset($crew) ? $crew : collect([]);
@endphp

<div class="min-h-screen">
    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">About KGraph Immigration</h1>
            <p class="text-xl text-slate-300 leading-relaxed max-w-3xl mx-auto mb-8">
                For over 10 years, we've been helping individuals and families achieve their Canadian dream through expert immigration guidance, personalized service, and unwavering commitment to success.
            </p>
            <div class="inline-flex items-center px-6 py-3 bg-blue-900 text-blue-300 rounded-full font-medium">
                🇨🇦 Your Trusted Immigration Partner Since 2015
            </div>
        </div>
    </section>

    {{-- Team Section --}}
    <section class="py-20 bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-white mb-6">Learn More About Our Team</h2>
                    <h3 class="text-2xl font-semibold text-blue-400 mb-6">Dedicated to Guiding You on Your Immigration Journey</h3>
                    <p class="text-lg text-slate-300 leading-relaxed mb-6">
                        At KGraph Immigration Consultancy, our journey began with the vision of making the Canadian immigration process accessible and straightforward for everyone. Founded by a team of dedicated immigration professionals, we understand the challenges faced by individuals and families seeking a new life in Canada.
                    </p>
                    <p class="text-lg text-slate-300 leading-relaxed">
                        As Regulated Canadian Immigration Consultants (RCICs), we offer a range of services tailored to your unique immigration needs, whether it's study permits, work visas, or permanent residency applications.
                    </p>
                </div>
                <div class="relative flex justify-center lg:justify-end">
                    @if(isset($whoweare) && $whoweare->count() > 0)
                        <img src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $whoweare->first()->file }}" alt="Our Team" class="w-full max-w-md h-auto rounded-3xl shadow-2xl">
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    @if($journeyData)
    <section class="py-20 bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-3xl font-bold text-white mb-2">{{ $journeyData->experience ?? '10' }}+</div>
                    <div class="text-blue-300">Years Experience</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-white mb-2">{{ $journeyData->employees ?? '30' }}+</div>
                    <div class="text-blue-300">Employees</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-white mb-2">{{ $journeyData->ratings ?? '4.8' }}</div>
                    <div class="text-blue-300">Google Rating</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-white mb-2">{{ $journeyData->offices ?? '5' }}</div>
                    <div class="text-blue-300">Offices</div>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- CTA Section --}}
    <section class="py-20 bg-blue-800">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Ready to Start Your Journey?</h2>
            <a href="{{ url('contact-us') }}" class="inline-flex items-center px-8 py-4 bg-white text-blue-600 rounded-2xl hover:bg-blue-50 transition-colors font-medium text-lg">
                Contact Us Today
            </a>
        </div>
    </section>
</div>
@endsection

