@extends('layouts.main')

@section('content')
<div class="min-h-screen" x-data="{
    modalOpen: false,
    selectedJobId: null,
    selectedJobTitle: '',
    loading: false,
    successMessage: '',
    errorMessage: '',
    formData: {
        name_n: '',
        email_n: '',
        country_n: '',
        mobile_n: '',
        branch_n: '',
        department_n: '',
        resume_n: null,
        message_n: null,
        job_id: null
    },
    openApplicationModal(jobId, jobTitle) {
        this.selectedJobId = jobId;
        this.selectedJobTitle = jobTitle;
        this.formData.job_id = jobId;
        this.modalOpen = true;
        this.successMessage = '';
        this.errorMessage = '';
        this.formData = {
            name_n: '',
            email_n: '',
            country_n: '',
            mobile_n: '',
            branch_n: '',
            department_n: '',
            resume_n: null,
            message_n: null,
            job_id: jobId
        };
    },
    closeModal() {
        this.modalOpen = false;
        this.successMessage = '';
        this.errorMessage = '';
        setTimeout(() => {
            this.formData = {
                name_n: '',
                email_n: '',
                country_n: '',
                mobile_n: '',
                branch_n: '',
                department_n: '',
                resume_n: null,
                message_n: null,
                job_id: null
            };
        }, 300);
    },
    async submitApplication() {
        if (this.loading) return;
        this.loading = true;
        this.successMessage = '';
        this.errorMessage = '';
        const formDataObj = new FormData();
        formDataObj.append('name_n', this.formData.name_n);
        formDataObj.append('email_n', this.formData.email_n);
        formDataObj.append('country_n', this.formData.country_n);
        formDataObj.append('mobile_n', this.formData.mobile_n);
        formDataObj.append('job_id', this.formData.job_id);
        if (this.formData.branch_n) formDataObj.append('branch_n', this.formData.branch_n);
        if (this.formData.department_n) formDataObj.append('department_n', this.formData.department_n);
        if (this.formData.resume_n) formDataObj.append('resume_n', this.formData.resume_n);
        if (this.formData.message_n) formDataObj.append('message_n', this.formData.message_n);
        try {
            const response = await fetch('{{ route('submit-career-form-new') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content')
                },
                body: formDataObj
            });
            const data = await response.json();
            if (data.status) {
                this.successMessage = data.message || 'Application submitted successfully!';
                setTimeout(() => this.closeModal(), 3000);
            } else {
                this.errorMessage = data.message || 'Something went wrong. Please try again.';
            }
        } catch (error) {
            this.errorMessage = 'An error occurred. Please try again.';
            console.error('Error:', error);
        } finally {
            this.loading = false;
        }
    }
}">
    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="opacity-0 animate-fade-in-up" style="animation-fill-mode: forwards;">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    Build a Rewarding Career With Us
                </h1>
            <p class="text-xl text-slate-300 leading-relaxed max-w-3xl mx-auto mb-8">
                    At KGraph, we are a passionate team dedicated to helping individuals and families navigate their journey to a new life in a new country. Join us and make a difference.
            </p>
                <div class="inline-flex items-center px-6 py-3 bg-blue-900 text-blue-300 rounded-full font-medium">
                    🚀 Grow Your Career With KGraph
                </div>
            </div>
        </div>
    </section>

    {{-- Job Listings --}}
    @if(isset($careers) && $careers->count() > 0)
    <section class="py-20 bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 opacity-0 animate-fade-in-up" style="animation-fill-mode: forwards;">
                <h2 class="text-3xl font-bold text-white mb-4">Current Job Openings</h2>
                <p class="text-slate-300 max-w-2xl mx-auto leading-none">
                    Explore exciting career opportunities and find the perfect role for your skills and aspirations.
                </p>
            </div>
            
                <div class="space-y-6">
                    @foreach($careers as $index => $career)
                    <div class="bg-slate-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-slate-700 p-8 opacity-0 animate-fade-in-up group" style="animation-delay: {{ (int)$index * 0.1 }}s; animation-fill-mode: forwards;">
                        <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-6 job-description-content">
                                <div class="flex-1">
                                <div class="flex items-start justify-between mb-4">
                                    <div>
                                        <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-blue-400 transition-colors">
                                            {{ $career->title ?? 'Position' }}
                                        </h3>
                                        <div class="flex flex-wrap gap-4 mb-4">
                                            @if($career->location)
                                                <div class="flex items-center text-slate-300">
                                                    @include('frontend.icons.map-pin', ['class' => 'w-5 h-5 text-slate-400 mr-2'])
                                                    <span>{{ $career->location }}</span>
                                                </div>
                                            @endif
                                            @if($career->experience)
                                                <div class="flex items-center text-slate-300">
                                                    @include('frontend.icons.briefcase', ['class' => 'w-5 h-5 text-slate-400 mr-2'])
                                                    <span>{{ $career->experience }}</span>
                                                </div>
                                            @endif
                                            @if($career->type)
                                                <div class="flex items-center text-slate-300">
                                                    @include('frontend.icons.clock', ['class' => 'w-5 h-5 text-slate-400 mr-2'])
                                                    <span>{{ $career->type }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                @if($career->overview)
                                    <div class="text-slate-300 leading-relaxed mb-4 job-description-content">
                                        {!! nl2br(e($career->overview)) !!}
                                    </div>
                                @elseif($career->description)
                                    <div class="text-slate-300 leading-relaxed mb-4 job-description-content">
                                        {!! nl2br(e($career->description)) !!}
                                    </div>
                                @endif
                            </div>
                            
                            <div class="flex-shrink-0 lg:ml-8">
                                <button 
                                   @click="openApplicationModal({{ $career->id }}, '{{ addslashes($career->title ?? '') }}')"
                                   class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors button-glow">
                                        Apply Now
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Why Join Us Section --}}
    <section class="py-20 bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 opacity-0 animate-fade-in-up" style="animation-fill-mode: forwards;">
                <h2 class="text-3xl font-bold text-white mb-4">Why Join KGraph?</h2>
                <p class="text-slate-300 max-w-2xl mx-auto">
                    Discover what makes KGraph a great place to work and grow your career.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $benefits = [
                        [
                            'icon' => 'award',
                            'title' => 'Competitive Compensation',
                            'description' => 'We offer attractive salary packages and performance-based bonuses that recognize and reward your contributions to our success.'
                        ],
                        [
                            'icon' => 'trending-up',
                            'title' => 'Career Growth Opportunities',
                            'description' => 'Advance your career with structured development programs, mentorship, and opportunities to take on challenging projects.'
                        ],
                        [
                            'icon' => 'heart',
                            'title' => 'Work-Life Balance',
                            'description' => 'Enjoy flexible working arrangements and a supportive environment that values your well-being and personal commitments.'
                        ],
                        [
                            'icon' => 'users-group',
                            'title' => 'Collaborative Culture',
                            'description' => 'Join a diverse, inclusive team where your ideas matter and collaboration drives innovation and excellence.'
                        ],
                        [
                            'icon' => 'globe',
                            'title' => 'Global Impact',
                            'description' => 'Make a meaningful difference by helping individuals and families achieve their dreams of a better future in Canada.'
                        ],
                        [
                            'icon' => 'shield',
                            'title' => 'Professional Development',
                            'description' => 'Access ongoing training, certifications, and learning opportunities to stay ahead in the immigration industry.'
                        ]
                    ];
                @endphp

                @foreach($benefits as $index => $benefit)
                    <div class="bg-slate-700 rounded-2xl p-8 border border-slate-600 opacity-0 animate-fade-in-up hover:border-blue-600 transition-colors" style="animation-delay: {{ (int)$index * 0.1 }}s; animation-fill-mode: forwards;">
                        <div class="w-16 h-16 bg-blue-600 rounded-xl flex items-center justify-center mb-6">
                            @include('frontend.icons.' . $benefit['icon'], ['class' => 'w-8 h-8 text-white'])
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4">{{ $benefit['title'] }}</h3>
                        <p class="text-slate-300 leading-relaxed text-center">{{ $benefit['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Departments & Branches --}}
    @if((isset($departments) && $departments->count() > 0) || (isset($branches) && $branches->count() > 0))
    <section class="py-20 bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(isset($departments) && $departments->count() > 0)
                <div class="mb-16">
                    <div class="text-center mb-12 opacity-0 animate-fade-in-up" style="animation-fill-mode: forwards;">
                        <h2 class="text-3xl font-bold text-white mb-4">Our Departments</h2>
                        <p class="text-slate-300 max-w-2xl mx-auto">
                            Explore opportunities across our various departments.
                        </p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($departments as $index => $department)
                            <div class="bg-slate-700 rounded-xl p-6 border border-slate-600 text-center opacity-0 animate-fade-in-up" style="animation-delay: {{ (int)$index * 0.1 }}s; animation-fill-mode: forwards;">
                                <h3 class="text-lg font-bold text-white mb-2">{{ $department->title ?? 'Department' }}</h3>
                        </div>
                    @endforeach
                    </div>
                </div>
            @endif

            @if(isset($branches) && $branches->count() > 0)
                <div>
                    <div class="text-center mb-12 opacity-0 animate-fade-in-up" style="animation-fill-mode: forwards;">
                        <h2 class="text-3xl font-bold text-white mb-4">Our Locations</h2>
                        <p class="text-slate-300 max-w-2xl mx-auto">
                            Join us at any of our office locations across Canada and India.
                        </p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($branches as $index => $branch)
                            <div class="bg-slate-700 rounded-xl p-6 border border-slate-600 text-center opacity-0 animate-fade-in-up" style="animation-delay: {{ (int)$index * 0.1 }}s; animation-fill-mode: forwards;">
                                <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                    @include('frontend.icons.map-pin', ['class' => 'w-6 h-6 text-white'])
                                </div>
                                <h3 class="text-lg font-bold text-white mb-2">{{ $branch->title ?? 'Location' }}</h3>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
    @endif

    {{-- CTA Section --}}
    <section class="py-20 bg-blue-600 border-t border-slate-700">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="opacity-0 animate-fade-in-up" style="animation-fill-mode: forwards;">
                <h2 class="text-3xl font-bold text-white mb-4">
                    Interested in Joining Our Team?
                </h2>
                <p class="text-xl text-blue-200 mb-8 max-w-2xl mx-auto">
                    Even if you don't see a position that matches your skills, we'd love to hear from you. Send us your resume and we'll keep you in mind for future opportunities.
                </p>
                
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                    <a href="{{ url('contact-us') }}" class="px-8 py-4 bg-white text-blue-600 rounded-2xl hover:bg-blue-50 transition-colors font-medium text-lg button-glow">
                Send Us Your Resume
            </a>
                    <a href="tel:+14169897788" class="px-8 py-4 border-2 border-blue-200 text-blue-200 rounded-2xl hover:bg-blue-200 hover:text-blue-600 transition-colors font-medium text-lg">
                        Call +1 416 989 7788
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Application Modal --}}
    <div 
        x-show="modalOpen"
        @keydown.escape.window="closeModal()"
        x-cloak
        class="fixed inset-0 z-50 overflow-hidden"
        style="display: none;"
        x-transition
        x-effect="modalOpen ? document.body.style.overflow = 'hidden' : document.body.style.overflow = ''"
    >
        <!-- Background overlay -->
        <div 
            x-show="modalOpen"
            @click="closeModal()"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"
        ></div>

        <!-- Modal container -->
        <div class="fixed inset-0 flex items-center justify-center px-4 py-4 pointer-events-none">
            <!-- Modal panel -->
            <div 
                x-show="modalOpen"
                @click.stop
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:scale-95"
                class="relative bg-white rounded-2xl text-left shadow-2xl transform transition-all w-full max-w-md z-50 max-h-[90vh] flex flex-col pointer-events-auto"
            >
                <!-- Header -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-6 py-5 flex items-center justify-between flex-shrink-0">
                    <h3 class="text-lg font-bold text-white">Apply for <span x-text="selectedJobTitle"></span></h3>
                    <button @click="closeModal()" class="text-white hover:text-blue-200 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Form - Scrollable Content -->
                <div class="overflow-y-auto flex-1" style="min-height: 0;">
                    <form @submit.prevent="submitApplication()" enctype="multipart/form-data" class="px-6 py-6">
                    <!-- Success Message -->
                    <div x-show="successMessage" x-cloak class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-green-800 font-medium flex-1" style="color: #065f46 !important; display: block;" x-text="successMessage"></span>
                        </div>
                    </div>

                    <!-- Error Message -->
                    <div x-show="errorMessage" x-cloak class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-red-600 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-red-800 font-medium flex-1" style="color: #991b1b !important; display: block;" x-text="errorMessage"></span>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <!-- Name -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text"
                                x-model="formData.name_n"
                                required
                                class="w-full px-4 py-2 bg-white text-gray-900 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                style="color: #111827 !important; background-color: #ffffff !important;"
                                placeholder="John Doe"
                            >
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="email"
                                x-model="formData.email_n"
                                required
                                class="w-full px-4 py-2 bg-white text-gray-900 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                style="color: #111827 !important; background-color: #ffffff !important;"
                                placeholder="john.doe@example.com"
                            >
                        </div>

                        <!-- Country Code & Mobile -->
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Country Code <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text"
                                    x-model="formData.country_n"
                                    required
                                    class="w-full px-4 py-2 bg-white text-gray-900 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    style="color: #111827 !important; background-color: #ffffff !important;"
                                    placeholder="+1"
                                >
                            </div>
                            <div class="col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Mobile Number <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="tel"
                                    x-model="formData.mobile_n"
                                    required
                                    class="w-full px-4 py-2 bg-white text-gray-900 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    style="color: #111827 !important; background-color: #ffffff !important;"
                                    placeholder="416 989 7788"
                                >
                            </div>
                        </div>

                        <!-- Branch & Department -->
                        @if((isset($branches) && $branches->count() > 0) || (isset($departments) && $departments->count() > 0))
                        <div class="grid grid-cols-2 gap-4">
                            @if(isset($branches) && $branches->count() > 0)
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Branch
                                </label>
                                <select 
                                    x-model="formData.branch_n"
                                    class="w-full px-4 py-2 bg-white text-gray-900 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                >
                                    <option value="" class="text-gray-900">Select Branch</option>
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch->id }}" class="text-gray-900">{{ $branch->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif

                            @if(isset($departments) && $departments->count() > 0)
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Department
                                </label>
                                <select 
                                    x-model="formData.department_n"
                                    class="w-full px-4 py-2 bg-white text-gray-900 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                >
                                    <option value="" class="text-gray-900">Select Department</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}" class="text-gray-900">{{ $department->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                        </div>
                        @endif

                        <!-- Resume Upload -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Resume/CV <span class="text-red-500">*</span> <span class="text-xs text-gray-500">(PDF, DOC, DOCX - Max 10MB)</span>
                            </label>
                            <input 
                                type="file"
                                @change="formData.resume_n = $event.target.files[0]"
                                accept=".pdf,.doc,.docx"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            >
                        </div>

                        <!-- Cover Letter Upload (Optional) -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Cover Letter <span class="text-xs text-gray-500">(Optional - PDF, DOC, DOCX - Max 10MB)</span>
                            </label>
                            <input 
                                type="file"
                                @change="formData.message_n = $event.target.files[0]"
                                accept=".pdf,.doc,.docx"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            >
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end space-x-4 pt-4">
                            <button 
                                type="button"
                                @click="closeModal()"
                                class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors"
                            >
                                Cancel
                            </button>
                            <button 
                                type="submit"
                                :disabled="loading"
                                class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                            >
                                <span x-show="!loading">Submit Application</span>
                                <span x-show="loading">Submitting...</span>
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

<style>
    /* Keep text-align justify for job description paragraphs */
    .job-description-content {
        text-align: justify;
    }
    .job-description-content p {
        text-align: justify;
        margin-bottom: 1rem;
    }
</style>

</div>
@endsection
