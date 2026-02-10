@include('layouts.frontheader')
<section class="banner_head_section section_gradientbg  ">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <nav style="--bs-breadcrumb-divider: '|';" aria-label="breadcrumb">
                    <ol class="breadcrumb  justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
                <h2 class="mean_head scroll-text" data-animate-on-scroll>Contact Us</h2>
                <P class="scroll-text" data-animate-on-scroll>Get in Touch with Marhaba Fashion</P>
            </div>
        </div>
    </div>
</section>
<section class="section_pt">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="">
            <form method="POST" class="contact_wrapper" id="contactForm" action="{{ route('post.contact') }}">
                @csrf
                <p class="f_24">Fill out the form below, and we’ll get back to you shortly.</p>

                <div class="row g-md-4">
                    <div class="col-md-6 mb-2">
                        <div class="form_floating_contect">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="fullname" value="{{old('full_name')}}" name="full_name" placeholder="Full Name" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();">
                                <label for="fullname">Full Name*</label>
                                @error('full_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form_floating_contect">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="companyname" value="{{old('company_name')}}" name="company_name" placeholder="Company Name">
                                <label for="companyname">Company Name*</label>
                                @error('company_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form_floating_contect">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="name@example.com">
                                <label for="email">Email Address*</label>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form_floating_contect">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="contactnumber" value="{{old('contact_no')}}" name="contact_no" placeholder="Contact Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);">
                                <label for="contactnumber">Contact Number*</label>
                                @error('contact_no')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form_floating_contect">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="Message" value="{{old('message_note')}}" name="message_note" placeholder="Message">
                                <label for="Message">Message*</label>
                                @error('message_note')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class=" text-center mt-xxl-5 mt-4">
                        <button href="#" class="comman_btn2 border-0"><span>Submit</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                                <path d="M1 10.5L11 0.5" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M2.10938 0.5H10.9983V8.5" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                        <!--<a href="https://api.whatsapp.com/send?phone=971569233052&text=Hello,%20I%27m%20visiting%20your%20website%20and%20would%20like%20to%20know%20more%22" class="comman_btn2 border-0"><span>Submit</span>-->
                        <!--    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">-->
                        <!--        <path d="M1 10.5L11 0.5" stroke="white" stroke-linecap="round" stroke-linejoin="round" />-->
                        <!--        <path d="M2.10938 0.5H10.9983V8.5" stroke="white" stroke-linecap="round" stroke-linejoin="round" />-->
                        <!--    </svg>-->
                        <!--</a>-->
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<section class="section_pt">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h3 class="f_24 mb-4 scroll-text" data-animate-on-scroll> Reach Us</h3>
                <div class="address_item">
                    <div class="address_title col-md-3">
                        <img src="{{ asset('public/front/img/address_icon.png') }}" alt="address" class="img-fluid">
                        <span>Address:</span>
                    </div>
                    <div>
                        <a href="https://maps.app.goo.gl/yNsyj9FukmZHos4K9">Shop No. 2 & 3, Maeen Hotel Building, Murshid Bazar, Opposite Dubai Wholesale Plaza, Deira, Dubai, UAE</a>
                    </div>
                </div>
                <div class="address_item">
                    <div class="address_title col-md-3">
                        <img src="{{ asset('public/front/img/call_iocn.png') }}" alt="Call" class="img-fluid">
                        <span>Call:</span>
                    </div>
                    <a href="tel:+97142264582">
                        +971 4 226 4582
                    </a>
                </div>
                <div class="address_item">
                    <div class="address_title col-md-3">
                        <img src="{{ asset('public/front/img/email_icon.png') }}" alt="Email" class="img-fluid">
                        <span>Email:</span>
                    </div>
                    <a href="mailto:info@marhabafashion.com">
                        info@marhabafashion.com
                    </a>
                </div>
                <div class="address_item">
                    <div class="address_title col-md-3">
                        <img src="{{ asset('public/front/img/wp_icon.png') }}" alt="WhatsApp" class="img-fluid">
                        <span>WhatsApp:</span>
                    </div>
                    <a href="tel:+971569233052">
                        +971 5 692 33052
                    </a>
                </div>
            </div>
            <div class="col-md-5">
                <h3 class="f_24 mb-4 scroll-text" data-animate-on-scroll>Open Hours</h3>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="col">Monday</th>
                            <td scope="col">8:30 am–1:15 pm</td>
                            <td scope="col">4:30 pm–9 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">Tuesday</th>
                            <td>8:30 am–1:15 pm</td>
                            <td>4:30 pm–9 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">Wednesday</th>
                            <td>8:30 am–1:15 pm</td>
                            <td>4:30 pm–9 pm</td>
                        </tr>
                         <tr>
                            <th scope="row">Thursday</th>
                            <td>8:30 am–1:15 pm</td>
                            <td>4:30 pm–9 pm</td>
                        </tr>
                         <tr>
                            <th scope="row">Friday</th>
                            <td>8:30 am–12:30 pm</td>
                            <td>4:30 pm–9 pm</td>
                        </tr>
                         <tr>
                            <th scope="row">Saturday</th>
                            <td>8:30 am–1:15 pm</td>
                            <td>4:30 pm–9 pm</td>
                        </tr>

                        <tr>
                            <th scope="row">Sunday</th>
                            <td colspan="2">Closed</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<section class="section_pt">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31811.759933657435!2d55.26607008641606!3d25.282619641482643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f4346f3514075%3A0x9ae7192a04d3b7dd!2sMarhaba%20Fashion%20-%20Najmuddin%20Trading%20Co.%20LLC!5e0!3m2!1sen!2sin!4v1760102338475!5m2!1sen!2sin" width="100%" height="600" style="border:0;display:block;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
@include('layouts.frontfooter')

<script>

$.validator.addMethod("uniqueEmail", function(value, element, tableName) {
    let isValid = false;

    $.ajax({
        url: sitePath + "/check-email-unique",
        type: "POST",
        data: { 
            email: value,
        },
        async: false,
        success: function(response) {
            isValid = response.unique === true;
        }
    });
    return isValid;
}, "This email is already registered");

$.validator.addMethod("noSpamEmail", function (value, element) {
    const spamPatterns = [
        /^[a-zA-Z]{8,}[0-9]{6,}@/,
        /^[0-9]+@/,
        /(temp-mail|10minutemail|mailinator|guerrillamail|yopmail|throwawaymail|form-check.online|seismologiomail|ru|mailport.lat)/i,
        /^(test|demo|example|noreply|fake|admin|info|random|dummy)/i,
        /^(.)(\1){5,}@/
    ];

    for (let pattern of spamPatterns) {
        if (pattern.test(value)) {
            return false;
        }
    }
    return true;
}, "This email is not allowed");

$.validator.addMethod("validPhone", function(value, element) {
    return this.optional(element) || /^[0-9]{7,15}$/.test(value);
}, "Please enter a valid phone number (7-15 digits).");

$(document).ready(function() {
    $("#contactForm").validate({
        rules: {
            full_name: {
                required: true,
                minlength: 2,
                maxlength: 50,
            },
            company_name: {
                required: true,
                minlength: 6,
                maxlength: 50,
            },
            email: {
                required: true,
                email: true,
                noSpamEmail: true,
                uniqueEmail: true
            },
            contact_no: {
                required: true,
                validPhone: true,
            },
            message_note: {
                minlength: 5,
                maxlength: 500
            },
        },
        messages: {
            full_name: {
                required: "Please enter your Full name",
                minlength: "Name must be at least 2 characters",
                maxlength: "Name cannot be longer than 50 characters",
                lettersonly: "Only letters and spaces are allowed"
            },
            company_name: {
                required: "Please enter your Company Name",
                minlength: "Name must be at least 6 characters",
                maxlength: "Name cannot be longer than 50 characters",
            },
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address",
                noSpamEmail: "This email address is not allowed",
            },
            contact_no: {
                required: "Please enter your Contact Number"
            },
            message_note: {
                minlength: "Address atlease 5 characters",
                maxlength: "Address cannot be longer than 500 characters"
            },
        },
        errorElement: 'div',
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        },
        highlight: function(element) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function(element) {
            $(element).addClass('is-valid').removeClass('is-invalid');
        },
        submitHandler: function(form) {
            if (!formSubmitted) {
                formSubmitted = true;
                const btn = $(form).find('button[type="submit"]');
                if (btn.length) {
                    btn.prop('disabled', true).text('Submitting...');
                }
                form.submit();
            }
        }
    });
});
</script>
