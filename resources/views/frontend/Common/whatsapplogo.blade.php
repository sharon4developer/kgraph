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

    /* @-webkit-keyframes breathing {
      0% {
        -webkit-transform: scale(0.9);
        transform: scale(0.9);
      }

      25% {
        -webkit-transform: scale(1);
        transform: scale(1);
      }

      60% {
        -webkit-transform: scale(0.9);
        transform: scale(0.9);
      }

      100% {
        -webkit-transform: scale(0.9);
        transform: scale(0.9);
      }
    }

    @keyframes breathing {
      0% {
        -webkit-transform: scale(0.9);
        -ms-transform: scale(0.9);
        transform: scale(0.9);
      }

      25% {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
      }

      60% {
        -webkit-transform: scale(0.9);
        -ms-transform: scale(0.9);
        transform: scale(0.9);
      }

      100% {
        -webkit-transform: scale(0.9);
        -ms-transform: scale(0.9);
        transform: scale(0.9);
      }
    } */

    </style>


<a href="http://wa.me/+64272571646" href="http://wa.me/+16473956682" class="block fixed bottom-[5%] w-[60px] right-[4%] z-[9999999999999] chatlogo" style="background: #00800063; border-radius: 100%; width: 54px; height: 54px; display: flex; justify-content: center; align-items: center;" target="_blank">
    <img src="{{asset('assets/navigation/latestwhatsapplogo.png')}}" style="width: 50px; height: 50px;" />
</a>
