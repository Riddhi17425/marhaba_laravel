<!-- intl-tel-input CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/css/intlTelInput.css">

<style>
    /* Hidden Popup */
    input, textarea{
        font-family: "Lora", serif;
        line-height: normal;
    }
    .wa_popup {
        position: fixed;
        bottom: 90px;
        right: 20px;
        width: 320px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.25);
        z-index: 9998;

        /* 🔥 smooth animation with rotation and scale */
        overflow: hidden;
        transform: rotateY(90deg) scale(0.8);
        transform-origin: 100% 100%;
        transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.6s ease, visibility 0.6s;
        opacity: 0;
        visibility: hidden;
        backface-visibility: hidden;
    }

    /* Active state */
    .wa_popup.active {
        transform: rotateY(0deg) scale(1);
        opacity: 1;
        visibility: visible;
    }

   .wa_popup.active .iti__search-input {
    width: 100%;
    border-width: 0;
    border-radius: 3px;
    padding-left: 30px;
    padding-right: 28px;
    border: 1px solid #ddd;
    padding: 6px 24px;
    margin: 5px;
}

    .wa_head {
        align-items: center;
        display: flex;
        justify-content: space-between;
        background-color: #452666;
        padding: 12px 16px;
    }

    .wa_head h3 {
        font-size: 16px;
        margin: 0;
        color: #fff;
        font-weight: 600;
    }

    .close-inquiry {
        font-size: 28px;
        cursor: pointer;
        color: #fff;
        transition: all 0.2s;
        background: rgba(255,255,255,0.2);
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        /* align-items: center; */
        justify-content: center;
        border: none;
        padding: 0;
    }

    .close-inquiry:hover {
        background: rgba(255,255,255,0.3);
        transform: scale(1.1);
    }

    .wa-body {
        padding: 16px;
    }

    .wa-body label {
        color: #333;
        font-size: 13px;
        font-weight: 500;
        margin-bottom: 6px;
    }

    .wa-body .form-control {
        border: 1px solid #d0d0d0;
        border-radius: 6px;
        padding: 10px 12px;
        font-size: 14px;
    }

    .wa-body .form-control:focus {
        border-color: #452666;
        /* box-shadow: 0 0 0 3px rgba(37, 211, 102, 0.1); */
    }

    .wa-body .mb-3 {
        margin-bottom: 12px;
    }

    #sendWa {
        background-color: #452666 !important;
        color: white !important;
        border: none !important;
        border-radius: 6px !important;
        padding: 10px 16px !important;
        font-weight: 600 !important;
        font-size: 14px !important;
        transition: all 0.3s ease !important;
    }

    #sendWa:hover {
        transform: translateY(-2px);
        /* box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3) !important; */
    }

    .float-buttons {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
    }

    .WhatsAppButton {
        position: relative;
    }

    .wa_btn {
        width: 55px;
        height: 55px;
        background-color: #452666;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        /* box-shadow: 0 5px 15px rgba(37, 211, 102, 0.4); */
        transition: all 0.3s ease;
        border: none;
        padding: 0;
    }

    .wa_btn:hover {
        /* background-color: #20BA5A; */
        transform: scale(1.1);
        /* box-shadow: 0 8px 20px rgba(37, 211, 102, 0.6); */
    }

    .wa_btn i {
        font-size: 32px;
        color: #fff;
    }

    /* intl-tel-input Fix */
    .iti__tel-input {
        padding-left: 85px !important;
    }

    .iti__country-container {
        top: 12px !important;
    }
    .iti__selected-country, .iti__country-name{color:#333;}
    .iti__selected-country {
        height: auto !important;
    }
</style>
<div class="float-buttons">
    <div class="WhatsAppButton">
        <button class="wa_btn">
            <i class="fab fa-whatsapp"></i>
        </button>
        <!-- Popup Form -->
        <div class="wa_popup">
            <div class="wa_head">
                <h3>Contact on WhatsApp</h3>
                <button class="close-inquiry">×</button>
            </div>
            <div class="wa-body">
                <form method="POST" action="{{ route('whatsaap.inquiry') }}" id="whatsapForm">
                @csrf
                   
                    <div class="mb-3">
                        <label for="name" class="form-label">Contact No.</label>
                        <input type="tel" name="phone" class="form-control" id="wa_phone" required oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,15);">

                        <!-- Hidden fields -->
                        <input type="hidden" name="number" id="wa_full_phone">
                        <input type="hidden" name="country" id="wa_country_name">
                    </div>
                     <div class="mb-3">
                        <label for="message_note" class="form-label">Message</label>
                        <textarea class="form-control" name="message" id="message_note" rows="3" placeholder="Your Message" required></textarea>
                    </div>
                    <button id="sendWa" class="btn w-100" type="submit">Start Chat With Us</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- intl-tel-input JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const input = document.querySelector("#wa_phone");
        const iti = window.intlTelInput(input, {
            initialCountry: "ae",
            separateDialCode: true,
            geoIpLookup: function (callback) {
                fetch("https://ipapi.co/json")
                    .then(res => res.json())
                    .then(data => callback(data.country_code))
                    .catch(() => callback("us"));
            },
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/js/utils.js"
        });
        // On form submit
        const form = input.closest("form");
        form.addEventListener("submit", function () {
            const countryData = iti.getSelectedCountryData();
            const dialCode = countryData.dialCode;
            const countryName = countryData.name;
            const phoneNumber = input.value.replace(/\s+/g, "");
            const fullPhone = `+${dialCode}${phoneNumber}`;

            document.getElementById("wa_full_phone").value = fullPhone;
            document.getElementById("wa_country_name").value = iti.getSelectedCountryData().name;
        });
    });
</script>

<!-- Popup Toggle Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const waBtn = document.querySelector(".wa_btn");
        const waPopup = document.querySelector(".wa_popup");
        const closeBtn = document.querySelector(".close-inquiry");

        // Toggle popup on button click
        waBtn.addEventListener("click", function (e) {
            e.preventDefault();
            waPopup.classList.toggle("active");
        });

        // Close popup on close button click
        closeBtn.addEventListener("click", function (e) {
            e.preventDefault();
            waPopup.classList.remove("active");
        });

        // Close popup when clicking outside
        document.addEventListener("click", function (e) {
            if (!e.target.closest(".WhatsAppButton")) {
                waPopup.classList.remove("active");
            }
        });
    });
</script>