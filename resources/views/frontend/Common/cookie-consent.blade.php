<div style="z-index: 999999999999999999999999;" id="cookie-consent" class="fixed bottom-0 left-0 w-full bg-white  text-black border border-blue-950 p-4 flex items-center justify-between shadow-lg translate-y-full transition-transform duration-500 ease-in-out">
    <div class="flex items-center">
        <span class="text-xl mr-2">🍪</span>
        <p>This website uses cookies to ensure you get the best experience.</p>
    </div>
    <div>
        <button onclick="acceptCookies()" class="bg-black shadow-md border hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition">Accept</button>
        <button onclick="rejectCookies()" class="bg-white shadow-md border hover:bg-red-600 text-black  font-bold py-2 px-4 rounded transition ml-2">Reject</button>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(() => {
            if (!localStorage.getItem("cookiesAccepted")) {
                document.getElementById("cookie-consent").classList.remove("translate-y-full");
            }
        }, 1000);
    });
    
    function acceptCookies() {
        localStorage.setItem("cookiesAccepted", "true");
        hideCookieConsent();
    }
    
    function rejectCookies() {
        hideCookieConsent();
    }
    
    function hideCookieConsent() {
        document.getElementById("cookie-consent").classList.add("translate-y-full");
    }
</script>