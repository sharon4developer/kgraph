@props(['faqs', 'title' => 'Frequently Asked Questions'])

@php
    $faqs = $faqs ?? collect([]);
    $faqsArray = $faqs->map(function($faq) {
        return [
            'id' => $faq->id ?? uniqid(),
            'question' => $faq->title ?? $faq->question ?? '',
            'answer' => $faq->description ?? $faq->answer ?? '',
            'category' => $faq->category ?? ''
        ];
    })->values()->toArray();
    $faqsJson = json_encode($faqsArray, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_SLASHES);
    $uniqueId = 'faq_' . str_replace('.', '_', uniqid('', true));
@endphp

<script>
    window.{{ $uniqueId }} = {!! $faqsJson !!};
</script>
<div x-data="{
    currentIndex: 0,
    openItems: new Set(),
    direction: 0,
    faqs: window.{{ $uniqueId }} || [],
    init() {
        if (this.faqs && Array.isArray(this.faqs) && this.faqs.length > 0) {
            this.openItems.add(this.faqs[0].id);
        }
    },
    get currentFaq() {
        if (!this.faqs || !Array.isArray(this.faqs) || this.faqs.length === 0) {
            return {};
        }
        return this.faqs[this.currentIndex] || {};
    },
    toggleItem(id) {
        if (this.openItems.has(id)) {
            this.openItems.delete(id);
        } else {
            this.openItems.add(id);
        }
    },
    handleNext() {
        if (!this.faqs || !Array.isArray(this.faqs) || this.faqs.length === 0) return;
        this.direction = 1;
        this.currentIndex = (this.currentIndex + 1) % this.faqs.length;
        this.openItems.clear();
        if (this.currentFaq && this.currentFaq.id) {
            this.openItems.add(this.currentFaq.id);
        }
    },
    handlePrev() {
        if (!this.faqs || !Array.isArray(this.faqs) || this.faqs.length === 0) return;
        this.direction = -1;
        this.currentIndex = (this.currentIndex - 1 + this.faqs.length) % this.faqs.length;
        this.openItems.clear();
        if (this.currentFaq && this.currentFaq.id) {
            this.openItems.add(this.currentFaq.id);
        }
    },
    handleDotClick(index) {
        if (!this.faqs || !Array.isArray(this.faqs) || this.faqs.length === 0) return;
        if (index < 0 || index >= this.faqs.length) return;
        this.direction = index > this.currentIndex ? 1 : -1;
        this.currentIndex = index;
        this.openItems.clear();
        if (this.currentFaq && this.currentFaq.id) {
            this.openItems.add(this.currentFaq.id);
        }
    }
}" x-cloak>
    @if($title)
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-4">{{ $title }}</h2>
            <p class="text-slate-300 max-w-2xl mx-auto">
                Get answers to common questions about Canadian immigration processes and requirements.
            </p>
        </div>
    @endif

    <div class="relative" x-show="faqs && Array.isArray(faqs) && faqs.length > 0">
        <div class="overflow-hidden">
            <div class="w-full" 
                 x-show="currentFaq && currentFaq.id"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform translate-x-full"
                 x-transition:enter-end="opacity-100 transform translate-x-0"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 transform translate-x-0"
                 x-transition:leave-end="opacity-0 transform -translate-x-full"
                 x-cloak>
                <div class="bg-blue-900 rounded-2xl shadow-md overflow-hidden border border-blue-800">
                    <button
                        @click="currentFaq && currentFaq.id && toggleItem(currentFaq.id)"
                        class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-inset transition-colors active:brightness-125 button-glow"
                        x-bind:aria-expanded="currentFaq && currentFaq.id ? openItems.has(currentFaq.id) : false"
                        x-bind:aria-controls="currentFaq && currentFaq.id ? 'faq-' + currentFaq.id : ''"
                    >
                        <span class="text-lg font-medium text-white pr-4" x-text="currentFaq ? (currentFaq.question || '') : ''"></span>
                        <svg 
                            class="w-5 h-5 text-blue-400 transition-transform duration-200 flex-shrink-0"
                            x-bind:class="{ 'rotate-180': currentFaq && currentFaq.id && openItems.has(currentFaq.id) }"
                            fill="none" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div 
                        x-show="currentFaq && currentFaq.id && openItems.has(currentFaq.id)"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 max-h-0"
                        x-transition:enter-end="opacity-100 max-h-screen"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 max-h-screen"
                        x-transition:leave-end="opacity-0 max-h-0"
                        class="overflow-hidden"
                    >
                        <div class="px-6 pb-4 pt-0">
                            <div class="border-t border-blue-800 pt-4">
                                <p class="text-blue-200 leading-relaxed" x-text="currentFaq ? (currentFaq.answer || '') : ''"></p>
                                <div x-show="currentFaq && currentFaq.category" class="mt-3">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-800 text-blue-300" x-text="currentFaq ? (currentFaq.category || '') : ''"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center items-center gap-3 mt-8" x-show="faqs && Array.isArray(faqs) && faqs.length > 1">
            <button
                @click="handlePrev()"
                class="bg-blue-800 hover:bg-blue-700 text-white p-2 rounded-full shadow-lg transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 active:brightness-125 active:scale-95 button-glow"
                aria-label="Previous question"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <div class="flex items-center gap-2">
                <template x-for="(faq, index) in faqs" :key="index">
                    <button
                        @click="handleDotClick(index)"
                        class="transition-all duration-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 active:scale-90"
                        :class="index === currentIndex ? 'w-8 h-3 bg-blue-500' : 'w-3 h-3 bg-blue-700 hover:bg-blue-600'"
                        :aria-label="'Go to question ' + (index + 1)"
                        :aria-current="index === currentIndex ? 'true' : 'false'"
                    ></button>
                </template>
            </div>

            <button
                @click="handleNext()"
                class="bg-blue-800 hover:bg-blue-700 text-white p-2 rounded-full shadow-lg transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 active:brightness-125 active:scale-95 button-glow"
                aria-label="Next question"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</div>

