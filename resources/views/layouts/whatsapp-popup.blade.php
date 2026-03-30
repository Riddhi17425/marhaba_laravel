<!-- intl-tel-input CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/css/intlTelInput.css">

<style>
input,
textarea {
    /* font-family: "Lora", serif; */
    line-height: normal;
}

/* ===== FLOATING CONTACT WRAP ===== */
.float-contact-wrap {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 1040;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 10px;
    pointer-events: none;
}

/* ===== OPTIONS POPUP CARD ===== */
.contact-options-popup {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.18);
    padding: 10px;
    display: flex;
    flex-direction: column;
    gap: 4px;
    min-width: 230px;
    transform: scale(0.85) translateY(10px);
    transform-origin: bottom right;
    transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.3s ease, visibility 0.3s;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    position: absolute;
    right: 0;
    bottom: 72px;
}

/* Speech bubble tail */
.contact-options-popup::after {
    content: '';
    position: absolute;
    bottom: -9px;
    right: 20px;
    border-width: 10px 9px 0 9px;
    border-style: solid;
    border-color: #fff transparent transparent transparent;
    filter: drop-shadow(0 3px 2px rgba(0, 0, 0, 0.06));
}

.contact-options-popup.active {
    transform: scale(1) translateY(0);
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
}

/* Option Row */
.contact-option-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 8px 10px;
    border-radius: 8px;
    cursor: pointer;
    text-decoration: none;
    transition: background 0.2s;
    background: none;
    border: none;
    width: 100%;
    text-align: left;
}

.contact-option-item:hover {
    background: #f5f5f5;
    text-decoration: none;
}

.contact-option-icon {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: #25D366;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.contact-option-icon i {
    color: #fff;
    font-size: 20px;
}

.contact-option-label {
    font-size: 15px;
    font-weight: 600;
    color: #333;
    /* font-family: "Lora", serif; */
}

@keyframes contactBtnPulse {
    0%,
    100% {
        box-shadow: 0 4px 15px rgba(69, 38, 102, 0.4);
    }
    50% {
        box-shadow: 0 8px 24px rgba(69, 38, 102, 0.6);
    }
}

@keyframes contactBtnRing {
    0% {
        transform: scale(1);
        opacity: 0.55;
    }
    70% {
        transform: scale(1.35);
        opacity: 0;
    }
    100% {
        transform: scale(1.35);
        opacity: 0;
    }
}

/* ===== MAIN CONTACT BUTTON ===== */
.contact-main-btn {
    width: 62px;
    height: 62px;
    background-color: #452666;
    border-radius: 50%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    border: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(69, 38, 102, 0.4);
    gap: 2px;
    position: relative;
    overflow: visible;
    animation: contactBtnPulse 2.4s ease-in-out infinite;
    pointer-events: auto;
        border: 1px solid #ffffff33;
}

.contact-main-btn::before {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: 50%;
    border: 2px solid rgba(69, 38, 102, 0.45);
    animation: contactBtnRing 2.4s ease-out infinite;
    pointer-events: none;
}

.contact-main-btn:hover {
    transform: scale(1.08);
}

.contact-main-btn .icon-contact {
    font-size: 22px;
    color: #fff;
    transition: all 0.3s;
}

.contact-main-btn .icon-rotator {
    width: 24px;
    height: 24px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.contact-main-btn .rotating-icon {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transform: scale(0.8);
    transition: opacity 0.3s ease, transform 0.3s ease;
}

.contact-main-btn .rotating-icon.is-active {
    opacity: 1;
    transform: scale(1);
}

.contact-main-btn .btn-label {
    font-size: 10px;
    color: #fff;
    font-weight: 600;
    /* font-family: "Lora", serif; */
    letter-spacing: 0.5px;
}

.contact-main-btn .icon-close {
    display: none;
    font-size: 26px;
    color: #fff;
    font-style: normal;
    font-weight: 400;
    line-height: 1;
}

.contact-main-btn.open .icon-contact {
    display: flex;
}

.contact-main-btn.open .btn-label {
    display: none;
}

.contact-main-btn.open .icon-close {
    display: block;
    margin-top: -4px;
    font-size: 20px;
}

.contact-main-btn.open {
    animation: none;
    gap: 0;
}

.contact-main-btn.open::before {
    animation: none;
    opacity: 0;
}

/* ===== WHATSAPP FORM POPUP ===== */
.wa_popup {
    position: fixed;
    bottom: 100px;
    right: 20px;
    width: 320px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.25);
    z-index: 1041;
    overflow: hidden;
    transform: rotateY(90deg) scale(0.8);
    transform-origin: 100% 100%;
    transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.6s ease, visibility 0.6s;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    backface-visibility: hidden;
}

.wa_popup.active {
    transform: rotateY(0deg) scale(1);
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
}

.wa_popup.active .iti__search-input {
    width: 100%;
    border: 1px solid #ddd;
    padding: 6px 24px;
    margin: 5px;
    border-radius: 3px;
    font-family: none !important;
}

.wa_head {
    align-items: center;
    display: flex;
    justify-content: space-between;
    background-color: #25D366;
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
    background: rgba(255, 255, 255, 0.2);
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    padding: 0;
    line-height: 1;
}

.close-inquiry:hover {
    background: rgba(255, 255, 255, 0.3);
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
    border-color: #25D366;
}

.wa-body .mb-3 {
    margin-bottom: 12px;
}

#sendWa {
    background-color: #25D366 !important;
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
}

/* intl-tel-input Fix */
.iti {
    width: 100% !important;
}

.iti__tel-input {
    padding-left: 85px !important;
}

.iti__country-container {
    top: 12px !important;
}

.iti__selected-country,
.iti__country-name {
    color: #333;
}

.iti__selected-country {
    height: auto !important;
}
</style>

<!-- WhatsApp Form Popup -->
<div class="wa_popup" id="waFormPopup">
    <div class="wa_head">
        <h3>Contact on WhatsApp</h3>
        <button class="close-inquiry" id="closeWaForm">×</button>
    </div>
    <div class="wa-body">
        <form method="POST" action="{{ route('whatsaap.inquiry') }}" id="whatsapForm">
            @csrf
            <div class="mb-3">
                <label for="wa_phone" class="form-label">Contact No.</label>
                <input type="tel" name="phone" class="form-control" id="wa_phone" required
                    oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,15);">
                <input type="hidden" name="number" id="wa_full_phone">
                <input type="hidden" name="country" id="wa_country_name">
            </div>
            <div class="mb-3">
                <label for="message_note" class="form-label">Message</label>
                <textarea class="form-control" name="message" id="message_note" rows="3" placeholder="Your Message"
                    required></textarea>
            </div>
            <button id="sendWa" class="btn w-100" type="submit">Start Chat with Us</button>
        </form>
    </div>
</div>

<!-- Floating Contact Button -->
<div class="float-contact-wrap">
    <!-- Options Popup -->
    <div class="contact-options-popup" id="contactOptionsPopup">
        <button class="contact-option-item" id="openWaForm">
            <span class="contact-option-icon"><i class="fab fa-whatsapp"></i></span>
            <span class="contact-option-label">Whatsapp</span>
        </button>
        <button class="contact-option-item" data-bs-toggle="modal" data-bs-target="#enquiryModal">
            <span class="contact-option-icon" style="background:#452666;"><i class="fas fa-envelope"></i></span>
            <span class="contact-option-label">Enquire Now</span>
        </button>
    </div>
    <!-- Main Button -->
    <button class="contact-main-btn" id="contactMainBtn">
        <span class="icon-rotator" aria-hidden="true">
            <i class="fas fa-comment-dots icon-contact rotating-icon is-active"></i>
            <i class="fab fa-whatsapp icon-contact rotating-icon"></i>
            <i class="fas fa-envelope icon-contact rotating-icon"></i>
        </span>
        <span class="btn-label">Contact</span>
        <span class="icon-close">×</span>
    </button>
</div>

<!-- intl-tel-input JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const input = document.querySelector("#wa_phone");
    const iti = window.intlTelInput(input, {
        initialCountry: "ae",
        separateDialCode: true,
        geoIpLookup: function(callback) {
            fetch("https://ipapi.co/json")
                .then(res => res.json())
                .then(data => callback(data.country_code))
                .catch(() => callback("us"));
        },
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/js/utils.js"
    });

    const form = input.closest("form");
    form.addEventListener("submit", function() {
        const countryData = iti.getSelectedCountryData();
        const phoneNumber = input.value.replace(/\s+/g, "");
        document.getElementById("wa_full_phone").value = `+${countryData.dialCode}${phoneNumber}`;
        document.getElementById("wa_country_name").value = countryData.name;
    });

    const mainBtn = document.getElementById("contactMainBtn");
    const optionsPopup = document.getElementById("contactOptionsPopup");
    const waFormPopup = document.getElementById("waFormPopup");
    const openWaForm = document.getElementById("openWaForm");
    const closeWaForm = document.getElementById("closeWaForm");
    const rotatingIcons = mainBtn ? mainBtn.querySelectorAll(".rotating-icon") : [];
    let activeIconIndex = 0;
    let iconRotationTimer = null;

    function setActiveIcon(index) {
        rotatingIcons.forEach((icon, idx) => {
            icon.classList.toggle("is-active", idx === index);
        });
    }

    function startIconRotation() {
        if (!rotatingIcons.length || iconRotationTimer) {
            return;
        }

        iconRotationTimer = setInterval(function() {
            activeIconIndex = (activeIconIndex + 1) % rotatingIcons.length;
            setActiveIcon(activeIconIndex);
        }, 3200);
    }

    function stopIconRotation() {
        if (!iconRotationTimer) {
            return;
        }

        clearInterval(iconRotationTimer);
        iconRotationTimer = null;
    }

    setActiveIcon(activeIconIndex);
    startIconRotation();

    document.addEventListener("visibilitychange", function() {
        if (document.hidden) {
            stopIconRotation();
        } else {
            startIconRotation();
        }
    });

    mainBtn.addEventListener("click", function(e) {
        e.stopPropagation();
        optionsPopup.classList.toggle("active");
        mainBtn.classList.toggle("open");
        waFormPopup.classList.remove("active");

        if (mainBtn.classList.contains("open")) {
            activeIconIndex = 0;
            setActiveIcon(activeIconIndex);
            stopIconRotation();
        } else {
            startIconRotation();
        }
    });

    openWaForm.addEventListener("click", function() {
        optionsPopup.classList.remove("active");
        mainBtn.classList.remove("open");
        waFormPopup.classList.add("active");
    });

    const openEnquireModal = document.getElementById("openEnquireModal");
    const enquiryModal = document.getElementById("enquiryModal");

    function closeFloatingContactUi() {
        optionsPopup.classList.remove("active");
        mainBtn.classList.remove("open");
        waFormPopup.classList.remove("active");
    }

    if (openEnquireModal) {
        openEnquireModal.addEventListener("click", function() {
            closeFloatingContactUi();
        });
    }

    if (enquiryModal) {
        enquiryModal.addEventListener("show.bs.modal", closeFloatingContactUi);
        enquiryModal.addEventListener("hidden.bs.modal", closeFloatingContactUi);
    }

    closeWaForm.addEventListener("click", function(e) {
        e.preventDefault();
        waFormPopup.classList.remove("active");
    });

    document.addEventListener("click", function(e) {
        if (!e.target.closest(".float-contact-wrap") && !e.target.closest("#waFormPopup")) {
            closeFloatingContactUi();
        }
    });
});
</script>