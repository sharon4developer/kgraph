@if(isset($seo) && $seo->Seo)
<title>{{$seo->Seo->meta_title ?? ''}}</title>
<meta name="title" content="{{$seo->Seo->meta_title ?? ''}}">
<meta name="description" content="{{$seo->Seo->meta_description ?? ''}}" />
<meta name="keywords" content="{{$seo->Seo->meta_keywords ?? ''}}" />
<meta property="og:title" content="{{$seo->Seo->og_title ?? ''}}">
<meta property="og:description" content="{{$seo->Seo->og_description ?? ''}}">
<meta property="og:image" content="{{$seo->Seo->og_image ? url($seo->Seo->og_image) : ''}}">
<meta property="og:url" content="{{$seo->Seo->og_url ?? ''}}">
<script type="application/ld+json">
    {!! $seo->Seo->schema !!}
</script>
@else
<title>K-Graph</title>
@endif
