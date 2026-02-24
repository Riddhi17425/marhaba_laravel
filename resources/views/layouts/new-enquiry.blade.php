<!-- Modal -->
<div class="modal fade" id="enquiryModal" tabindex="-1" aria-labelledby="enquiryModalLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="enquiry_head">
                <h1 class="modal-title" id="enquiryModalLabel">Product Inquiry</h1>
                <p>Share your requirements and our team will be in touch</p>
                <p>For wholesale buyers only</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body enquiry_body">
                <div>
                    language
                </div>
                <form action="">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" id="name">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="">Business Name</label>
                            <input type="text" name="name" id="name">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="businessType">Business Type(optional) </label><br>
                            <select id="businessType" name="businessType">
                                <option value="">Select business type</option>
                                <option value="Regional Distributor">Regional Distributor</option>
                                <option value="Children's Clothing Store">Children's Clothing Store</option>
                                <option value="Department Store">Department Store</option>
                                <option value="Independent Retailer">Independent Retailer</option>
                                <option value="Online Seller">Online Seller</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <input type="tel" id="wa_phone" name="number" placeholder="Enter phone number" required
                                oninput="this.value = this.value.replace(/[^0-9]/g,'').slice(0,15);" />
                        </div>
                        <div class="col-12 mb-3">
                            Product Intrest(Select all that apply)
                        </div>
                        <div class="col-12 mb-3">
                            <div>
                                <label>Gender(Select one or both)</label>
                                <div class="d-flex gap-3">
                                    <div class="d-flex gap-1">
                                        <input type="checkbox" value="" id="flexCheckDefault">
                                        <label for="flexCheckDefault">
                                            Boy
                                        </label>
                                    </div>
                                    <div class="d-flex gap-1">
                                        <input type="checkbox" value="" id="flexCheckDefault">
                                        <label for="flexCheckDefault">
                                            Girl
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label>Age Range(Select one or more)</label>
                            <div class="d-flex gap-3">
                                <div class="d-flex gap-1">
                                    <input type="checkbox" value="" id="flexCheckDefault">
                                    <label for="flexCheckDefault">
                                        0-3Y
                                    </label>
                                </div>
                                <div class="d-flex gap-1">
                                    <input type="checkbox" value="" id="flexCheckDefault">
                                    <label for="flexCheckDefault">
                                        2-6Y
                                    </label>
                                </div>
                                <div class="d-flex gap-1">
                                    <input type="checkbox" value="" id="flexCheckDefault">
                                    <label for="flexCheckDefault">
                                        6-14Y
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="businessType">Product Type(optional)</label>
                            <select id="businessType" name="businessType">
                                <option value="">bodysuits1</option>
                                <option value="Regional Distributor">bodysuits2</option>
                                <option value="Children's Clothing Store">bodysuits3</option>
                                <option value="Department Store">bodysuits4</option>
                                <option value="Independent Retailer">bodysuits5</option>
                                <option value="Online Seller">bodysuits6</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <textarea name="" id="" placeholder="any specific requirements(optional)"></textarea>
                        </div>
                        <button href="#" class="comman_btn2 border-0"><span>Submit</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11"
                                fill="none">
                                <path d="M1 10.5L11 0.5" stroke="white" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path d="M2.10938 0.5H10.9983V8.5" stroke="white" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const input = document.querySelector("#wa_phone");
        const fullPhone = document.querySelector("#wa_full_phone");
        const countryName = document.querySelector("#wa_country_name");
        const form = document.getElementById("whatsappForm");

        const iti = window.intlTelInput(input, {
            initialCountry: "in",
            separateDialCode: true,
            preferredCountries: ["in", "ae", "us", "gb"],
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/js/utils.js"
        });

        form.addEventListener("submit", function () {
            const countryData = iti.getSelectedCountryData();
            const number = input.value.replace(/\s+/g, "");
            fullPhone.value = "+" + countryData.dialCode + number;
            countryName.value = countryData.name;
        });
    });
</script>
