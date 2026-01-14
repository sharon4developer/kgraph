@php
    $customTitle = null;
    if (isset($pageTitle)) {
        $customTitle = $pageTitle;
    }
    
    // Default OG image - using existing KGRAPH logo
    $defaultOgImage = asset('assets/KgraphLogo.png');
    $defaultOgImageWidth = '1200';
    $defaultOgImageHeight = '630';
    $siteName = 'KGRAPH';
    $siteDescription = 'KGRAPH - Canadian Immigration Services';
    
    // Determine values based on context
    if ($customTitle) {
        $ogTitle = $customTitle;
        $ogDescription = $siteDescription;
        $ogImage = $defaultOgImage;
        $ogUrl = url()->current();
    } elseif (isset($seo) && $seo->Seo) {
        $ogTitle = $seo->Seo->og_title ?? $seo->Seo->meta_title ?? 'KGRAPH';
        $ogDescription = $seo->Seo->og_description ?? $seo->Seo->meta_description ?? $siteDescription;
        $ogImage = $seo->Seo->og_image ? url($seo->Seo->og_image) : $defaultOgImage;
        $ogUrl = $seo->Seo->og_url ?? url()->current();
    } else {
        $ogTitle = 'KGRAPH';
        $ogDescription = $siteDescription;
        $ogImage = $defaultOgImage;
        $ogUrl = url()->current();
    }
@endphp

@if($customTitle)
<title>{{$customTitle}}</title>
<meta name="title" content="{{$customTitle}}">
@elseif(isset($seo) && $seo->Seo)
<title>{{$seo->Seo->meta_title ?? ''}}</title>
<meta name="title" content="{{$seo->Seo->meta_title ?? ''}}">
<meta name="description" content="{{$seo->Seo->meta_description ?? ''}}" />
<meta name="keywords" content="{{$seo->Seo->meta_keywords ?? ''}}" />
@else
<title>KGRAPH</title>
@endif

{{-- Open Graph / Facebook / LinkedIn / WhatsApp --}}
<meta property="og:type" content="website">
<meta property="og:site_name" content="{{$siteName}}">
<meta property="og:title" content="{{$ogTitle}}">
<meta property="og:description" content="{{$ogDescription}}">
<meta property="og:image" content="{{$ogImage}}">
<meta property="og:image:width" content="{{$defaultOgImageWidth}}">
<meta property="og:image:height" content="{{$defaultOgImageHeight}}">
<meta property="og:image:alt" content="{{$ogTitle}}">
<meta property="og:url" content="{{$ogUrl}}">
<meta property="og:locale" content="en_CA">

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@kgraphca">
<meta name="twitter:title" content="{{$ogTitle}}">
<meta name="twitter:description" content="{{$ogDescription}}">
<meta name="twitter:image" content="{{$ogImage}}">
<meta name="twitter:image:alt" content="{{$ogTitle}}">

@if(isset($seo) && $seo->Seo)
<script type="application/ld+json">
    {!! $seo->Seo->schema !!}
</script>
@endif
