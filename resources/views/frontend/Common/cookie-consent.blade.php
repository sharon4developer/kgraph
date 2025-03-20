<div style="z-index: 999999999999999999999999;" id="cookie-consent" class="fixed bottom-0 left-0 w-full bg-white  text-black border border-blue-950 p-4 flex flex-col  items-center justify-between shadow-lg translate-y-full transition-transform duration-500 ease-in-out">
    <div class="flex flex-col items-center">
        <span class="text-xl text-left w-full font-semibold mr-2 mb-4">🍪 Cookies Consent</span>
        <p>We use cookies to enhance your browsing experience, analyze site traffic, and personalize content. By continuing to use this website, you consent to our use of cookies in accordance with our Privacy Policy. You can manage your cookie preferences at any time through your browser settings.</p>
    </div>
    <div class="my-4">
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