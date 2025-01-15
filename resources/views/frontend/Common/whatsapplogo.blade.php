<style>
    .chatlogo {
        /* transition: width 1s, height 1s;
        -webkit-animation: breathing 2.5s ease-out infinite normal;
        animation: breathing 2.5s ease-out infinite normal;
        -webkit-font-smoothing: antialiased; */

        animation: pulse-animation 2s infinite;
    }

    .chatlogo img {
        transition: width 2s, height 2s;
    }

    .chatlogo:hover img {
        height: 55px;
        width: 55px;
    }

    .chatlogo:hover {
        width: 54px;
        height: 54px;
    }

    @keyframes pulse-animation {
      0% {
        box-shadow: 0 0 0 0px #00800063;
      }
      100% {
        box-shadow: 0 0 0 20px #00800063;
      }
    }

</style>
@php
use App\Models\whatsApp;
$data = whatsApp::first();

@endphp

@if($data)
<a href="http://wa.me/{{$data->phone}}" class="block fixed bottom-[5%] w-[60px] right-[4%] z-[9999999999999] chatlogo" style="background: #00800063; border-radius: 100%; width: 54px; height: 54px; display: flex; justify-content: center; align-items: center;" target="_blank">
    <img src="{{asset('assets/Navigation/latest-whatsapplogo.png')}}" style="width: 50px; height: 50px;" />
</a>
@endif
