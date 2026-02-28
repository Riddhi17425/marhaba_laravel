<!-- intl-tel-input CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/css/intlTelInput.css">

<style>
    /* Hidden Popup */
    input, textarea{
        font-family: "Lora", serif;
        line-height: normal;
    }
    .wa_popup {
        position: absolute;
        bottom: 0px;
        right: 50px;
        width: 300px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);

        /* 🔥 rotation hidden state */
        overflow: hidden;
        transform: rotateY(90deg);
        transform-origin: 100% 100%;
        transition: transform 0.4s ease, opacity 0.4s ease, visibility 0.4s;
        opacity: 0;
        visibility: hidden;
        backface-visibility: hidden;
    }

    .wa_head {
        align-items: center;
        display: flex;
        justify-content: space-between;
        background-color: #452667;
        padding: 10px 20px;
    }

    .wa_head h3 {
        font-size: 18px;;
        margin: 0;
    }

    /* Active state */
    .wa_popup.active {
        transform: rotateY(0deg);
        opacity: 1;
        visibility: visible;
    }

    .close-inquiry {
        font-size: 28px;
        cursor: pointer;
        color: #fff;
        transition: color 0.2s;
    }

    .wa-body {
        padding: 10px 20px;
    }

    .wa-body label {
        color: #333;
    }

    /* intl-tel-input Fix */
    .iti__tel-input {
        padding-left: 85px !important;
    }

    .iti__country-container {
        top: 8px !important;
    }
    .iti__selected-country, .iti__country-name{color:#333;}
    .iti__selected-country {
    height: auto !important;
}
</style>
<div class="float-buttons position-fixed">
    <div class="WhatsAppButton">
        <a class="wa_btn">
            <i class="fab fa-whatsapp"></i>
        </a>
        <!-- hidden -->
        <div class="wa_popup">
            <div class="wa_head">
                <h3>Chat on Whatsapp</h3>
                <span class="close-inquiry">×</span>
            </div>
            <div class="wa-body">
                <form>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="3" placeholder="Your Message"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="tel" class="form-control" id="wa_phone" required>

                        <!-- Hidden fields -->
                        <input type="hidden" name="number" id="wa_full_phone">
                        <input type="hidden" name="country" id="wa_country_name">
                    </div>
                    <a href="#" id="sendWa" class="btn btn-success w-100">Send on WhatsApp</a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- intl-tel-input JS -->
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/js/intlTelInput.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        const input = document.querySelector("#wa_phone");

        const iti = window.intlTelInput(input, {
            initialCountry: "auto",
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

            if (iti.isValidNumber()) {

                document.getElementById("wa_full_phone").value = iti.getNumber();
                document.getElementById("wa_country_name").value = iti.getSelectedCountryData().name;

            } else {
                alert("Please enter a valid phone number");
                event.preventDefault();
            }
        });

    });
</script>
<script>
    const waBtn = document.querySelector(".wa_btn");
    const waPopup = document.querySelector(".wa_popup");
    const closeBtn = document.querySelector(".close-inquiry");

    // open / toggle popup
    waBtn.addEventListener("click", function (e) {
        e.preventDefault();
        waPopup.classList.toggle("active");
    });

    // close popup
    closeBtn.addEventListener("click", function () {
        waPopup.classList.remove("active");
    });
    document.addEventListener("click", function (e) {
        if (!e.target.closest(".WhatsAppButton")) {
            waPopup.classList.remove("active");
        }
    });
</script>