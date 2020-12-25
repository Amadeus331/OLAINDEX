<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="keywords" content="OLAINDEX,OneDrive,Index,Microsoft OneDrive,Directory Index"/>
    <meta name="description" content="OLAINDEX,Another OneDrive Directory Index"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/favicon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>OLAINDEX</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/css/mdui.min.css"
        integrity="sha384-cLRrMq39HOZdvE0j6yBojO4+1PrHfB7a9l5qLcmRm/fiWXYY+CndJPmyu5FV/9Tw"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{ asset('css/mdui.css') }}">
    @stack('stylesheet')
    {!! setting('stats_code') !!}
    <script>
        const App = {
            'routes': {
                'upload_image': '{{ route('image.upload') }}',
            },
            '_token': '{{ csrf_token() }}',
        }
    </script>
</head>
<body class="mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink">
<div id="top" class="anchor"></div>
<div class="mdui-appbar  mdui-appbar-fixed mdui-color-theme">
    <div class="mdui-toolbar mdui-color-theme mdui-container" style="position: relative">
        <a href="{{ route('home') }}" class="mdui-typo-headline">{{ setting('site_name','OLAINDEX') }}</a>
        <div class="mdui-toolbar-spacer"></div>
        @if( setting('open_image_host',0) && (setting('public_image_host',0) || (!setting('public_image_host',0) && auth()->check())) && !request()->routeIs(['image']))
            <div class="image" mdui-tooltip="{content: '图床'}">
                <a class="mdui-btn mdui-btn-icon" href="{{ route('image') }}"><i class="mdui-icon material-icons">insert_photo</i></a>
            </div>
        @endif
        {{--@if(request()->routeIs(['drive.query','home']))
            <div class="switch-view mdui-p-a-2">
                <label class="mdui-switch" mdui-tooltip="{content: '切换视图'}">
                    <i class="mdui-icon material-icons">view_comfy</i> &nbsp;&nbsp;
                    <input id="display-type-chk" class="display-type" type="checkbox"/>
                    <i class="mdui-switch-icon"></i>
                </label>
            </div>
        @endif--}}
    </div>
</div>
@yield('content')
<a
    id="scrolltop"
    class="mdui-fab mdui-fab-fixed mdui-ripple mdui-color-theme-accent mdui-fab-hide"
    onclick="toTop()"
><i class="mdui-icon material-icons">keyboard_arrow_up</i></a
>
<script
    src="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js"
    integrity="sha384-gCMZcshYKOGRX9r6wbDrvF+TcCCswSHFucUzUPwka+Gr+uHgjlYvkABr95TCOz3A"
    crossorigin="anonymous"
></script>
<script src="https://cdn.staticfile.org/clipboard.js/2.0.6/clipboard.min.js"></script>
<script src="https://cdn.staticfile.org/axios/0.21.0/axios.min.js"></script>
<script>
    const $ = mdui.$
    const toTop = () => {
        document.querySelector('#top').scrollIntoView({ behavior: 'smooth', block: 'start' })
    }
    window.addEventListener('scroll', () => {
        console.log('scroll')
        if (!(document.body.scrollTop > 100 || document.documentElement.scrollTop > 100)) {
            if ($('#scrolltop').hasClass('mdui-fab-hide')) {
                $(this).removeClass('mdui-fab-hide')
            }
        } else {
            if (!$('#scrolltop').hasClass('mdui-fab-hide')) {
                $(this).addClass('mdui-fab-hide')
            }
        }
    })
</script>
@stack('scripts')
</body>
</html>
