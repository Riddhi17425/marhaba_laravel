<style>
    :root {
        --navy: #1E1E2F;
        --charcoal: #2D2D3A;
        --gold: #C9A86C;
        --gold-light: #D4B87A;
        --cream: #FAF9F6;
        --white: #FFFFFF;
        --soft-gray: #6B6B7B;
        --light-gray: #9B9BA8;
        --border-gray: #E5E5E8;
        --shadow: rgba(30, 30, 47, 0.08);
    }

    .enquiry_modal {
        /* background: var(--cream); */
        color: var(--charcoal);
        line-height: 1.6;
    }

    .enquiry_modal .language-selector {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 1rem;
    }

    .enquiry_modal .language-selector select {
        padding: 0.4rem 0.75rem;
        font-family: 'Jost', sans-serif;
        font-size: 0.8rem;
        color: var(--charcoal);
        background: var(--cream);
        border: 1px solid var(--border-gray);
        border-radius: 6px;
        cursor: pointer;
        outline: none;
        transition: all 0.2s ease;
    }

    .enquiry_modal .language-selector select:hover {
        border-color: var(--gold-light);
    }

    .enquiry_modal .language-selector select:focus {
        border-color: var(--gold);
    }

    .enquiry_modal [dir="rtl"] .language-selector {
        justify-content: flex-start;
    }

    /* Main Content */
    .enquiry_modal main {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2.5rem 1.5rem;
    }

    .enquiry_modal .form-container {
        width: 100%;
        max-width: 520px;
        background: var(--white);
        border-radius: 00px;
        box-shadow: 0 4px 24px var(--shadow);
        overflow: hidden;
    }

    .enquiry_modal .form-header {
        background: #452667;
        padding: 2rem 2rem 1.75rem;
        text-align: center;
    }

    .enquiry_modal .form-header h1 {
        font-family: 'Cormorant Garamond', Georgia, serif;
        font-size: 1.6rem;
        font-weight: 500;
        color: var(--white);
        letter-spacing: 0.02em;
    }

    .enquiry_modal .form-header p {
        color: var(--light-gray);
        font-size: 0.85rem;
        margin-top: 0.4rem;
        font-weight: 300;
    }

    .enquiry_modal .form-header .bulk-notice {
        font-size: 0.75rem;
        color: var(--gold);
        margin-top: 0.75rem;
        letter-spacing: 0.03em;
        font-weight: 400;
    }

    .enquiry_modal .form-body {
        padding: 2rem;
        background-color: var(--cream);
    }

    /* Form Elements */
    .enquiry_modal .form-group {
        margin-bottom: 1.25rem;
    }

    .enquiry_modal label,
    .enquiry_modal .group-label {
        display: block;
        font-size: 0.75rem;
        font-weight: 500;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--soft-gray);
        margin-bottom: 0.5rem;
    }

    .enquiry_modal .optional-label {
        font-weight: 300;
        text-transform: none;
        letter-spacing: 0;
        color: var(--light-gray);
    }

    .enquiry_modal input[type="text"],
    .enquiry_modal input[type="tel"] {
        width: 100%;
        padding: 0.9rem 1rem;
        font-family: 'Jost', sans-serif;
        font-size: 0.95rem;
        font-weight: 400;
        color: var(--charcoal);
        background: var(--white);
        border: 1px solid var(--border-gray);
        border-radius: 10px;
        transition: all 0.2s ease;
    }

    .enquiry_modal input[type="text"]:focus,
    .enquiry_modal input[type="tel"]:focus {
        outline: none;
        border-color: var(--gold);
        box-shadow: 0 0 0 3px rgba(201, 168, 108, 0.12);
    }

    .enquiry_modal input::placeholder {
        color: #C0C0C0;
        font-family: 'Jost', sans-serif;
        font-weight: 400;
    }

    .enquiry_modal textarea {
        width: 100%;
        padding: 0.75rem 0.85rem;
        font-family: 'Jost', sans-serif;
        font-size: 0.8rem;
        font-weight: 400;
        color: var(--charcoal);
        background: var(--cream);
        border: 1px solid var(--border-gray);
        border-radius: 8px;
        transition: all 0.2s ease;
        resize: vertical;
        min-height: 60px;
    }

    .enquiry_modal textarea:focus {
        outline: none;
        border-color: var(--gold);
        box-shadow: 0 0 0 3px rgba(201, 168, 108, 0.12);
    }

    .enquiry_modal textarea::placeholder {
        color: #C0C0C0;
    }

    /* Business Type Select */
    .enquiry_modal select#businessType {
        width: 100%;
        padding: 0.9rem 0.85rem;
        font-family: 'Jost', sans-serif;
        font-size: 0.95rem;
        font-weight: 400;
        color: var(--charcoal);
        background: var(--white);
        border: 1px solid var(--border-gray);
        border-radius: 10px;
        transition: all 0.2s ease;
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23888' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 0.85rem center;
    }

    .enquiry_modal select#businessType.placeholder {
        color: #C0C0C0;
    }

    .enquiry_modal select#businessType:focus {
        outline: none;
        border-color: var(--gold);
        box-shadow: 0 0 0 3px rgba(201, 168, 108, 0.12);
    }

    .enquiry_modal select#businessType option {
        color: var(--charcoal);
    }

    .enquiry_modal select#businessType option[value=""] {
        color: #C0C0C0;
    }

    /* Phone Input Group */
    .enquiry_modal .phone-input-group {
        display: flex;
        gap: 0.5rem;
    }

    .enquiry_modal .country-code-select {
        position: relative;
        flex-shrink: 0;
    }

    .enquiry_modal .country-code-select select {
        display: none;
    }

    .enquiry_modal .country-picker {
        position: relative;
        min-width: 100px;
    }

    .enquiry_modal .country-picker-trigger {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.9rem 2rem 0.9rem 0.75rem;
        font-family: 'Poppins', sans-serif;
        font-size: 0.9rem;
        font-weight: 500;
        color: var(--text-dark);
        border: 2px solid var(--gold-light);
        border-radius: var(--radius-md);
        cursor: pointer;
        transition: all 0.25s ease;
        min-width: 100px;
    }

    /* .country-picker-trigger:hover {
        background: var(--cream-warm);
    } */

    .enquiry_modal .country-picker-trigger.active {
        background: var(--white);
        border-color: var(--gold);
        border-radius: var(--radius-md) var(--radius-md) 0 0;
    }

    .enquiry_modal .country-picker-trigger .flag {
        font-size: 1.1rem;
    }

    .enquiry_modal .country-picker-trigger .code {
        font-weight: 500;
    }

    .enquiry_modal .country-picker-trigger::after {
        content: '▼';
        position: absolute;
        right: 0.75rem;
        top: 50%;
        transform: translateY(-50%);
        font-size: 0.6rem;
        color: var(--text-light);
        transition: transform 0.25s ease;
    }

    .enquiry_modal .country-picker-trigger.active::after {
        transform: translateY(-50%) rotate(180deg);
    }

    .enquiry_modal .country-picker-dropdown {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: var(--white);
        border: 2px solid var(--gold);
        border-top: none;
        border-radius: 0 0 var(--radius-md) var(--radius-md);
        max-height: 280px;
        overflow: hidden;
        z-index: 1000;
        display: none;
        box-shadow: var(--shadow-md);
        min-width: 280px;
    }

    .enquiry_modal .country-picker-dropdown.open {
        display: block;
    }

    .enquiry_modal .country-search-wrapper {
        padding: 0.5rem;
        border-bottom: 1px solid var(--border-light);
        position: sticky;
        top: 0;
        background: var(--white);
    }

    .enquiry_modal .country-search {
        width: 100%;
        padding: 0.6rem 0.75rem;
        font-family: 'Poppins', sans-serif;
        font-size: 0.85rem;
        color: var(--text-dark);
        background: var(--cream);
        border: 1px solid var(--border);
        border-radius: var(--radius-sm);
        outline: none;
    }

    .enquiry_modal .country-search:focus {
        border-color: var(--gold);
        background: var(--white);
    }

    .country-search::placeholder {
        color: var(--text-muted);
    }

    .enquiry_modal .country-list {
        max-height: 220px;
        overflow-y: auto;
    }

    .enquiry_modal .country-option {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        padding: 0.65rem 0.75rem;
        cursor: pointer;
        transition: background 0.15s ease;
        font-size: 0.85rem;
    }

    .enquiry_modal .country-option:hover {
        background: var(--cream);
    }

    .enquiry_modal .country-option.selected {
        background: var(--gold-soft);
    }

    .enquiry_modal .country-option .flag {
        font-size: 1.1rem;
        width: 24px;
        text-align: center;
    }

    .enquiry_modal .country-option .name {
        flex: 1;
        color: var(--text-medium);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .enquiry_modal .country-option .dial-code {
        color: var(--text-dark);
        font-weight: 500;
    }

    .enquiry_modal .country-list::-webkit-scrollbar {
        width: 6px;
    }

    .enquiry_modal .country-list::-webkit-scrollbar-track {
        background: var(--cream);
    }

    .enquiry_modal .country-list::-webkit-scrollbar-thumb {
        background: var(--border);
        border-radius: 3px;
    }

    .enquiry_modal .no-results {
        padding: 1rem;
        text-align: center;
        color: var(--text-muted);
        font-size: 0.85rem;
    }

    .enquiry_modal [dir="rtl"] .country-picker-trigger {
        padding: 0.9rem 0.75rem 0.9rem 2rem;
    }

    .enquiry_modal [dir="rtl"] .country-picker-trigger::after {
        right: auto;
        left: 0.75rem;
    }

    .enquiry_modal [dir="rtl"] .country-option {
        flex-direction: row-reverse;
    }

    /* Divider */
    .enquiry_modal .divider {
        display: flex;
        align-items: center;
        text-align: center;
        margin: 1.75rem 0 0.5rem;
    }

    .enquiry_modal .divider::before,
    .enquiry_modal .divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid var(--border-gray);
    }

    .enquiry_modal .divider span {
        font-size: 0.65rem;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: var(--gold);
        padding: 0 1rem;
        font-weight: 500;
    }

    .enquiry_modal .section-hint {
        text-align: center;
        font-size: 0.8rem;
        color: var(--light-gray);
        margin: 0.25rem 0 1.25rem;
    }

    /* Checkbox Group - Elegant Chip Style with Visible Checkboxes */
    .enquiry_modal .checkbox-group {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.5rem;
    }

    .enquiry_modal .checkbox-group.age-group {
        grid-template-columns: repeat(3, 1fr);
    }

    .enquiry_modal .checkbox-item {
        position: relative;
    }

    .enquiry_modal .checkbox-item input[type="checkbox"] {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    .enquiry_modal .checkbox-item label {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        width: 100%;
        padding: 0.75rem 1rem;
        background: var(--white);
        border: 1.5px solid var(--border-gray);
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s ease;
        font-size: 0.85rem;
        font-weight: 400;
        letter-spacing: 0.01em;
        text-transform: none;
        color: var(--charcoal);
        margin-bottom: 0;
    }

    .enquiry_modal .checkbox-item label::before {
        content: '';
        width: 16px;
        height: 16px;
        border: 1.5px solid var(--border-gray);
        border-radius: 3px;
        background: var(--white);
        flex-shrink: 0;
        transition: all 0.2s ease;
    }

    .enquiry_modal .checkbox-item label:hover {
        border-color: var(--gold);
    }

    .enquiry_modal .checkbox-item label:hover::before {
        border-color: var(--gold);
    }

    .enquiry_modal .checkbox-item input[type="checkbox"]:checked+label {
        background: var(--navy);
        color: var(--white);
        border-color: var(--navy);
    }

    .enquiry_modal .checkbox-item input[type="checkbox"]:checked+label::before {
        background: var(--white);
        border-color: var(--white);
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%231E1E2F'%3E%3Cpath d='M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z'/%3E%3C/svg%3E");
        background-size: 11px;
        background-position: center;
        background-repeat: no-repeat;
    }

    .enquiry_modal .checkbox-item input[type="checkbox"]:disabled+label {
        opacity: 0.4;
        cursor: not-allowed;
    }

    .enquiry_modal .checkbox-item input[type="checkbox"]:disabled+label:hover {
        border-color: var(--border-gray);
    }

    .enquiry_modal .checkbox-item input[type="checkbox"]:disabled+label:hover::before {
        border-color: var(--border-gray);
    }

    .enquiry_modal .selection-count {
        font-weight: 400;
        font-size: 0.7rem;
        color: var(--light-gray);
        margin-left: 0.35rem;
        text-transform: none;
        letter-spacing: 0;
    }

    .enquiry_modal .selection-count.has-selection {
        color: var(--gold);
    }

    /* Multi-Select Dropdown */
    .enquiry_modal .multi-select {
        position: relative;
        z-index: 100;
    }

    .enquiry_modal .multi-select-trigger {
        width: 100%;
        padding: 0.9rem 1rem;
        font-family: 'Jost', sans-serif;
        font-size: 0.85rem;
        color: var(--light-gray);
        background: var(--white);
        border: 1px solid var(--border-gray);
        border-radius: 10px;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.2s ease;
    }

    .enquiry_modal .multi-select-trigger:hover {
        border-color: var(--gold-light);
    }

    .enquiry_modal .multi-select-trigger.active {
        border-color: var(--gold);
        border-radius: 10px 10px 0 0;
    }

    .enquiry_modal .multi-select-trigger.disabled {
        opacity: 0.4;
        cursor: not-allowed;
    }

    .enquiry_modal .multi-select-trigger.disabled:hover {
        border-color: var(--border-gray);
    }

    .enquiry_modal .multi-select-trigger .arrow {
        font-size: 0.7rem;
        color: var(--soft-gray);
        transition: transform 0.2s ease;
    }

    .enquiry_modal .multi-select-trigger.active .arrow {
        transform: rotate(180deg);
    }

    .enquiry_modal .multi-select-dropdown {
        position: absolute;
        top: 100%;
        bottom: auto;
        left: 0;
        right: 0;
        background: var(--white);
        border: 1px solid var(--gold);
        border-top: none;
        border-radius: 0 0 10px 10px;
        max-height: 220px;
        overflow-y: auto;
        z-index: 1000;
        display: none;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }

    .enquiry_modal .multi-select-dropdown.open {
        display: block;
    }

    /* Mobile - dropdown goes up */
    @media (max-width: 480px) {
        .enquiry_modal .multi-select-dropdown {
            top: auto;
            bottom: 100%;
            border-top: 1px solid var(--gold);
            border-bottom: none;
            border-radius: 10px 10px 0 0;
            box-shadow: 0 -8px 24px rgba(0, 0, 0, 0.1);
        }

        .enquiry_modal .multi-select-trigger.active {
            border-radius: 0 0 10px 10px;
        }

        .enquiry_modal .multi-select-trigger .arrow {
            transform: rotate(180deg);
        }

        .enquiry_modal .multi-select-trigger.active .arrow {
            transform: rotate(0deg);
        }
    }

    .enquiry_modal .multi-select-option {
        padding: 0.7rem 1rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.6rem;
        transition: background 0.15s ease;
        font-size: 0.85rem;
        user-select: none;
        color: var(--charcoal);
    }

    .enquiry_modal .multi-select-option:hover {
        background: var(--cream);
    }

    .enquiry_modal .multi-select-option .check {
        width: 16px;
        height: 16px;
        border: 1.5px solid var(--border-gray);
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.65rem;
        color: transparent;
        transition: all 0.15s ease;
        flex-shrink: 0;
        background: var(--white);
    }

    .enquiry_modal .multi-select-option.selected .check {
        background: var(--navy);
        border-color: var(--navy);
        color: var(--white);
    }

    .enquiry_modal .multi-select-option.selected .check::after {
        content: '✓';
    }

    .enquiry_modal .age-label {
        font-size: 0.75em;
        color: var(--light-gray);
        font-weight: 400;
    }

    .enquiry_modal #productPlaceholder {
        color: var(--light-gray);
    }

    .enquiry_modal .multi-select-trigger.has-selection #productPlaceholder {
        color: var(--charcoal);
    }

    .enquiry_modal .multi-select-trigger.disabled #productPlaceholder {
        color: #C0C0C0;
    }

    .enquiry_modal .form-group:has(.multi-select) {
        margin-bottom: 2rem;
    }

    /* Optional Section */
    .enquiry_modal .optional-section {
        margin-top: 1rem;
    }

    .enquiry_modal .optional-section .multi-select-trigger {
        padding: 0.65rem 0.85rem;
        font-size: 0.8rem;
        background: var(--cream);
        border-color: var(--border-gray);
    }

    .enquiry_modal .optional-section .multi-select-trigger:hover {
        border-color: var(--gold-light);
    }

    .enquiry_modal .optional-section .multi-select-dropdown {
        max-height: 200px;
    }

    .enquiry_modal .optional-section .multi-select-option {
        padding: 0.5rem 0.85rem;
        font-size: 0.8rem;
    }

    .enquiry_modal .optional-section .multi-select-option .check {
        width: 14px;
        height: 14px;
    }

    .enquiry_modal .dropdown-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem 0.85rem;
        border-bottom: 1px solid var(--border-gray);
        background: var(--cream);
    }

    .enquiry_modal .dropdown-header span {
        font-size: 0.7rem;
        color: var(--soft-gray);
    }

    .enquiry_modal .clear-all-btn {
        font-size: 0.7rem;
        color: var(--gold);
        background: none;
        border: none;
        cursor: pointer;
        padding: 0;
        text-decoration: underline;
    }

    .enquiry_modal .clear-all-btn:hover {
        color: var(--gold-light);
    }

    .enquiry_modal .dropdown-options {
        max-height: 160px;
        overflow-y: auto;
    }

    /* Submit Button */
    .enquiry_modal .submit-btn {
        width: 100%;
        padding: 1rem;
        background: var(--navy);
        color: var(--white);
        border: none;
        border-radius: 8px;
        font-family: 'Jost', sans-serif;
        font-size: 0.9rem;
        font-weight: 500;
        letter-spacing: 0.05em;
        cursor: pointer;
        transition: all 0.2s ease;
        margin-top: 0.5rem;
    }

    .enquiry_modal .submit-btn:hover {
        background: var(--charcoal);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(30, 30, 47, 0.2);
    }

    .enquiry_modal .submit-btn:active {
        transform: translateY(0);
    }

    /* Success Message */
    .enquiry_modal .success-message {
        display: none;
        text-align: center;
        padding: 3rem 2rem;
    }

    .enquiry_modal .success-message.show {
        display: block;
    }

    .enquiry_modal .success-icon {
        width: 64px;
        height: 64px;
        background: var(--navy);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 1.75rem;
        color: var(--white);
    }

    .enquiry_modal .success-message h2 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.5rem;
        color: var(--navy);
        margin-bottom: 0.75rem;
    }

    .enquiry_modal .success-message p {
        color: var(--soft-gray);
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
    }

    .enquiry_modal .success-message a {
        color: var(--gold);
        text-decoration: none;
    }

    .enquiry_modal .success-message a:hover {
        text-decoration: underline;
    }

    /* Footer */
    .enquiry_modal footer {
        padding: 1.5rem;
        text-align: center;
        font-size: 0.75rem;
        color: var(--light-gray);
        background: var(--white);
        border-top: 1px solid var(--border-gray);
    }

    .enquiry_modal footer a {
        color: var(--gold);
        text-decoration: none;
    }

    /* RTL Support */
    .enquiry_modal [dir="rtl"] .checkbox-group {
        flex-direction: row-reverse;
    }

    .enquiry_modal [dir="rtl"] .checkbox-group.age-group {
        direction: rtl;
    }

    .enquiry_modal [dir="rtl"] .multi-select-trigger {
        flex-direction: row-reverse;
    }

    .enquiry_modal [dir="rtl"] .multi-select-option {
        flex-direction: row-reverse;
    }

    .enquiry_modal [dir="rtl"] input[type="text"],
    .enquiry_modal [dir="rtl"] input[type="tel"] {
        text-align: right;
    }

    /* Responsive */
    @media (max-width: 480px) {
        .enquiry_modal main {
            padding: 1.5rem 1rem;
        }

        .enquiry_modal .form-container {
            border-radius: 16px;
        }

        .enquiry_modal .form-header {
            padding: 1.75rem 1.5rem;
        }

        .enquiry_modal .form-body {
            padding: 1.5rem;
        }

        .checkbox-item label {
            padding: 0.5rem 0.75rem;
            font-size: 0.8rem;
        }
    }
</style>
<!-- Modal -->
<div class="modal fade enquiry_modal" id="enquiryModal" tabindex="-1" aria-labelledby="enquiryModalLabel"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body enquiry_body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="form-container">
                    <div class="form-header">
                        <h1 id="formTitle">Product Inquiry</h1>
                        <p id="formSubtitle">Share your requirements and our team will be in touch</p>
                        <p class="bulk-notice" id="bulkNotice">For wholesale buyers only</p>
                    </div>

                    <div class="form-body">
                        <form id="inquiryForm">
                            <div class="language-selector">
                                <select id="languageSelect" onchange="changeLanguage(this.value)">
                                    <optgroup label="──────────">
                                        <option value="en">English</option>
                                    </optgroup>
                                    <optgroup label="──────────">
                                        <option value="ar">العربية</option>
                                        <option value="fa">فارسی</option>
                                        <option value="fr">Français</option>
                                        <option value="ru">Русский</option>
                                        <option value="sw">Kiswahili</option>
                                    </optgroup>
                                    <optgroup label="──────────">
                                        <option value="af">Afrikaans</option>
                                        <option value="sq">Shqip (Albanian)</option>
                                        <option value="am">አማርኛ (Amharic)</option>
                                        <option value="hy">Հայdelays (Armenian)</option>
                                        <option value="az">Azərbaycan (Azerbaijani)</option>
                                        <option value="es">Español (Spanish)</option>
                                        <option value="gu">ગુજરાતી (Gujarati)</option>
                                        <option value="ha">Hausa</option>
                                        <option value="hi">हिन्दी (Hindi)</option>
                                        <option value="kk">Қазақ (Kazakh)</option>
                                        <option value="ku">Kurdî (Kurdish)</option>
                                        <option value="mn">Монгол (Mongolian)</option>
                                        <option value="ps">پښتو (Pashto)</option>
                                        <option value="pt">Português (Portuguese)</option>
                                        <option value="so">Soomaali (Somali)</option>
                                        <option value="tr">Türkçe (Turkish)</option>
                                        <option value="ur">اردو (Urdu)</option>
                                        <option value="uz">Oʻzbek (Uzbek)</option>
                                        <option value="yo">Yorùbá</option>
                                        <option value="zu">isiZulu (Zulu)</option>
                                    </optgroup>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" required placeholder="Your name">
                            </div>

                            <div class="form-group">
                                <label for="businessName">Business Name</label>
                                <input type="text" id="businessName" name="businessName" required
                                    placeholder="Your business name">
                            </div>

                            <div class="form-group">
                                <label for="businessType">Business Type <span class="optional-label"
                                        id="businessOptionalLabel">(Optional)</span></label>
                                <select id="businessType" name="businessType">
                                    <option value="">Select business type</option>
                                    <option value="Regional Distributor">Regional Distributor</option>
                                    <option value="Children's Clothing Store">Children's Clothing Store</option>
                                    <option value="Department Store">Department Store</option>
                                    <option value="Independent Retailer">Independent Retailer</option>
                                    <option value="Online Seller">Online Seller</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="whatsapp">WhatsApp Number</label>
                                <div class="phone-input-group">
                                    <div class="country-code-select">
                                        <div class="country-picker" id="countryPicker">
                                            <div class="country-picker-trigger" id="countryPickerTrigger"
                                                onclick="toggleCountryPicker()">
                                                <span class="flag" id="selectedFlag">🇦🇪</span>
                                                <span class="code" id="selectedCode">+971</span>
                                            </div>
                                            <div class="country-picker-dropdown" id="countryPickerDropdown">
                                                <div class="country-search-wrapper">
                                                    <input type="text" class="country-search" id="countrySearch"
                                                        placeholder="Search country..."
                                                        oninput="filterCountries(this.value)">
                                                </div>
                                                <div class="country-list" id="countryList"></div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="countryCode" name="countryCode" value="+971">
                                    </div>
                                    <input type="tel" id="whatsapp" name="whatsapp" required placeholder="50 123 4567"
                                        class="phone-number-input">
                                </div>
                            </div>

                            <div class="divider">
                                <span>Product Interest</span>
                            </div>

                            <p class="section-hint">Select all that apply</p>

                            <div class="form-group">
                                <span class="group-label">Gender <span class="selection-count"
                                        id="genderCount"></span></span>
                                <div class="checkbox-group" id="genderGroup">
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="gender-boy" name="gender" value="boy">
                                        <label for="gender-boy">Boy</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="gender-girl" name="gender" value="girl">
                                        <label for="gender-girl">Girl</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="group-label">Age Range <span class="selection-count"
                                        id="ageCount"></span></span>
                                <div class="checkbox-group age-group" id="ageGroup">
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="age-baby" name="age" value="baby" disabled>
                                        <label for="age-baby">0-3Y</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="age-toddlers" name="age" value="toddlers" disabled>
                                        <label for="age-toddlers">2-6Y</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="age-kids" name="age" value="kids" disabled>
                                        <label for="age-kids">6-14Y</label>
                                    </div>
                                </div>
                            </div>

                            <div class="optional-section">
                                <div class="form-group" style="margin-bottom: 0.75rem;">
                                    <label class="field-label" id="productTypeLabel">Product Type <span
                                            class="optional-label">(Optional)</span></label>
                                    <div class="multi-select" id="productMultiSelect">
                                        <div class="multi-select-trigger disabled" id="productTrigger"
                                            onclick="toggleDropdown()">
                                            <span id="productPlaceholder">Select gender and age first</span>
                                            <span class="arrow"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M6 9l6 6 6-6" />
                                                </svg></span>
                                        </div>
                                        <div class="multi-select-dropdown" id="productDropdown">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 1rem;">
                                    <textarea id="message" name="message" rows="2"
                                        placeholder="Any specific requirements? (Optional)"></textarea>
                                </div>
                            </div>

                            <button type="submit" class="submit-btn" id="submitBtn">Send via WhatsApp</button>
                        </form>

                        <div class="success-message" id="successMessage">
                            <div class="success-icon">✓</div>
                            <h2>Opening WhatsApp</h2>
                            <p>If WhatsApp doesn't open automatically,<br><a href="#" id="whatsappLink"
                                    target="_blank">click here to send your inquiry</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Translations
    const translations = {
        en: {
            formTitle: "Product Inquiry",
            formSubtitle: "Share your requirements and our team will be in touch",
            name: "Name",
            namePlaceholder: "Your name",
            businessName: "Business Name",
            businessNamePlaceholder: "Your business name",
            business: "Business Type",
            businessPlaceholder: "Select business type",
            businessTypes: {
                regionalDistributor: "Regional Distributor",
                childrensClothingStore: "Children's Clothing Store",
                departmentStore: "Department Store",
                independentRetailer: "Independent Retailer",
                onlineSeller: "Online Seller"
            },
            whatsapp: "WhatsApp Number",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "Product Interest",
            selectAll: "Select all that apply",
            gender: "Gender",
            boy: "Boy",
            girl: "Girl",
            ageRange: "Age Range",
            ageBaby: "0-3Y",
            ageToddlers: "2-6Y",
            ageKids: "6-14Y",
            products: "Products",
            productType: "Product Type",
            optional: "(Optional)",
            selectGenderAge: "Select gender and age first",
            selectProducts: "Select product type",
            noProducts: "No product types available",
            productsSelected: "items selected",
            submit: "Send via WhatsApp",
            successTitle: "Opening WhatsApp",
            successText: "If WhatsApp doesn't open automatically,",
            successLink: "click here to send your inquiry",
            selected: "selected",
            selectOneOrBoth: "Select one or both",
            selectOneOrMore: "Select one or more",
            selectAllThatApply: "select all that apply",
            footer: "© 2026 Marhaba Fashion",
            optional: "Optional",
            bulkNotice: "For wholesale buyers only",
            messagePlaceholder: "Any specific requirements? (Optional)",
            businessOptional: "(Optional)",
            searchCountry: "Search country..."
        },
        ar: {
            formTitle: "استفسار عن المنتجات",
            formSubtitle: "شاركنا متطلباتك وسيتواصل معك فريقنا",
            name: "الاسم",
            namePlaceholder: "اسمك",
            businessName: "اسم الشركة",
            businessNamePlaceholder: "اسم شركتك",
            business: "نوع النشاط",
            businessPlaceholder: "اختر نوع النشاط",
            businessTypes: {
                regionalDistributor: "موزع إقليمي",
                childrensClothingStore: "متجر ملابس أطفال",
                departmentStore: "متجر متعدد الأقسام",
                independentRetailer: "تاجر تجزئة مستقل",
                onlineSeller: "بائع عبر الإنترنت"
            },
            whatsapp: "رقم الواتساب",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "المنتجات المطلوبة",
            selectAll: "اختر كل ما ينطبق",
            gender: "الجنس",
            boy: "ولد",
            girl: "بنت",
            ageRange: "الفئة العمرية",
            ageBaby: "٠-٣ سنة",
            ageToddlers: "٢-٦ سنة",
            ageKids: "٦-١٤ سنة",
            products: "المنتجات",
            productType: "نوع المنتج",
            selectGenderAge: "اختر الجنس والعمر أولاً",
            selectProducts: "اختر أصناف الملابس",
            noProducts: "لا توجد أصناف ملابس متاحة",
            productsSelected: "أصناف مختارة",
            submit: "إرسال عبر الواتساب",
            successTitle: "جاري فتح الواتساب",
            successText: "إذا لم يفتح الواتساب تلقائياً،",
            successLink: "اضغط هنا لإرسال استفسارك",
            selected: "مختار",
            selectOneOrBoth: "اختر واحد أو كليهما",
            selectOneOrMore: "اختر واحد أو أكثر",
            selectAllThatApply: "اختر كل ما ينطبق",
            footer: "© 2026 مرحبا فاشن",
            optional: "اختياري",
            bulkNotice: "لتجار الجملة فقط",
            messagePlaceholder: "أي متطلبات محددة؟ (اختياري)",
            businessOptional: "(اختياري)",
            searchCountry: "ابحث عن البلد..."
        },
        fa: {
            formTitle: "استعلام محصول",
            formSubtitle: "نیازهای خود را به اشتراک بگذارید و تیم ما با شما تماس خواهد گرفت",
            name: "نام",
            namePlaceholder: "نام شما",
            businessName: "نام کسب و کار",
            businessNamePlaceholder: "نام کسب و کار شما",
            business: "نوع کسب و کار",
            businessPlaceholder: "نوع کسب و کار را انتخاب کنید",
            businessTypes: {
                regionalDistributor: "توزیع کننده منطقه‌ای",
                childrensClothingStore: "فروشگاه لباس کودک",
                departmentStore: "فروشگاه بزرگ",
                independentRetailer: "خرده فروش مستقل",
                onlineSeller: "فروشنده آنلاین"
            },
            whatsapp: "شماره واتساپ",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "علاقه به محصول",
            selectAll: "همه موارد مربوطه را انتخاب کنید",
            gender: "جنسیت",
            boy: "پسر",
            girl: "دختر",
            ageRange: "محدوده سنی",
            ageBaby: "۰-۳ سال",
            ageToddlers: "۲-۶ سال",
            ageKids: "۶-۱۴ سال",
            products: "محصولات",
            productType: "نوع محصول",
            selectGenderAge: "ابتدا جنسیت و سن را انتخاب کنید",
            selectProducts: "اقلام لباس را انتخاب کنید",
            noProducts: "هیچ لباسی موجود نیست",
            productsSelected: "مورد انتخاب شده",
            submit: "ارسال از طریق واتساپ",
            successTitle: "در حال باز کردن واتساپ",
            successText: "اگر واتساپ به طور خودکار باز نشد،",
            successLink: "اینجا کلیک کنید تا استعلام خود را ارسال کنید",
            selected: "انتخاب شده",
            selectOneOrBoth: "یکی یا هر دو را انتخاب کنید",
            selectOneOrMore: "یک یا چند مورد انتخاب کنید",
            selectAllThatApply: "همه موارد مربوطه را انتخاب کنید",
            footer: "© 2026 مرحبا فشن",
            optional: "اختیاری",
            bulkNotice: "فقط برای خریداران عمده",
            messagePlaceholder: "نیازهای خاصی دارید؟ (اختیاری)",
            businessOptional: "(اختیاری)",
            searchCountry: "جستجوی کشور..."
        },
        fr: {
            formTitle: "Demande de Produits",
            formSubtitle: "Partagez vos besoins et notre équipe vous contactera",
            name: "Nom",
            namePlaceholder: "Votre nom",
            businessName: "Nom de l'entreprise",
            businessNamePlaceholder: "Nom de votre entreprise",
            business: "Type d'activité",
            businessPlaceholder: "Sélectionnez le type d'activité",
            businessTypes: {
                regionalDistributor: "Distributeur régional",
                childrensClothingStore: "Magasin de vêtements pour enfants",
                departmentStore: "Grand magasin",
                independentRetailer: "Détaillant indépendant",
                onlineSeller: "Vendeur en ligne"
            },
            whatsapp: "Numéro WhatsApp",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "Intérêt Produit",
            selectAll: "Sélectionnez tout ce qui s'applique",
            gender: "Genre",
            boy: "Garçon",
            girl: "Fille",
            ageRange: "Tranche d'âge",
            ageBaby: "0-3 ans",
            ageToddlers: "2-6 ans",
            ageKids: "6-14 ans",
            products: "Produits",
            productType: "Type de Produit",
            selectGenderAge: "Sélectionnez d'abord le genre et l'âge",
            selectProducts: "Sélectionnez les articles",
            noProducts: "Aucun article disponible",
            productsSelected: "articles sélectionnés",
            submit: "Envoyer via WhatsApp",
            successTitle: "Ouverture de WhatsApp",
            successText: "Si WhatsApp ne s'ouvre pas automatiquement,",
            successLink: "cliquez ici pour envoyer votre demande",
            selected: "sélectionné",
            selectOneOrBoth: "sélectionnez un ou les deux",
            selectOneOrMore: "sélectionnez un ou plusieurs",
            selectAllThatApply: "sélectionnez tout ce qui s'applique",
            footer: "© 2026 Marhaba Fashion",
            optional: "Facultatif",
            bulkNotice: "Réservé aux acheteurs en gros",
            messagePlaceholder: "Des exigences spécifiques? (Facultatif)",
            businessOptional: "(Facultatif)",
            searchCountry: "Rechercher un pays..."
        },
        ru: {
            formTitle: "Запрос на продукцию",
            formSubtitle: "Поделитесь своими требованиями, и наша команда свяжется с вами",
            name: "Имя",
            namePlaceholder: "Ваше имя",
            businessName: "Название компании",
            businessNamePlaceholder: "Название вашей компании",
            business: "Тип бизнеса",
            businessPlaceholder: "Выберите тип бизнеса",
            businessTypes: {
                regionalDistributor: "Региональный дистрибьютор",
                childrensClothingStore: "Магазин детской одежды",
                departmentStore: "Универмаг",
                independentRetailer: "Независимый розничный продавец",
                onlineSeller: "Онлайн-продавец"
            },
            whatsapp: "Номер WhatsApp",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "Интерес к продукту",
            selectAll: "Выберите все подходящие варианты",
            gender: "Пол",
            boy: "Мальчик",
            girl: "Девочка",
            ageRange: "Возрастной диапазон",
            ageBaby: "0-3 года",
            ageToddlers: "2-6 лет",
            ageKids: "6-14 лет",
            products: "Продукты",
            productType: "Тип Продукта",
            selectGenderAge: "Сначала выберите пол и возраст",
            selectProducts: "Выберите виды одежды",
            noProducts: "Нет доступных видов одежды",
            productsSelected: "выбрано",
            submit: "Отправить через WhatsApp",
            successTitle: "Открытие WhatsApp",
            successText: "Если WhatsApp не открылся автоматически,",
            successLink: "нажмите здесь, чтобы отправить запрос",
            selected: "выбрано",
            selectOneOrBoth: "выберите один или оба",
            selectOneOrMore: "выберите один или несколько",
            selectAllThatApply: "выберите все подходящие",
            footer: "© 2026 Marhaba Fashion",
            optional: "Необязательно",
            bulkNotice: "Только для оптовых покупателей",
            messagePlaceholder: "Особые требования? (Необязательно)",
            businessOptional: "(Необязательно)",
            searchCountry: "Поиск страны..."
        },
        es: {
            formTitle: "Consulta de Productos",
            formSubtitle: "Comparte tus requisitos y nuestro equipo se pondrá en contacto",
            name: "Nombre",
            namePlaceholder: "Tu nombre",
            businessName: "Nombre del negocio",
            businessNamePlaceholder: "Nombre de tu negocio",
            business: "Tipo de negocio",
            businessPlaceholder: "Selecciona tipo de negocio",
            businessTypes: {
                regionalDistributor: "Distribuidor regional",
                childrensClothingStore: "Tienda de ropa infantil",
                departmentStore: "Tienda departamental",
                independentRetailer: "Minorista independiente",
                onlineSeller: "Vendedor en línea"
            },
            whatsapp: "Número de WhatsApp",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "Interés en Productos",
            selectAll: "Selecciona todo lo que aplique",
            gender: "Género",
            boy: "Niño",
            girl: "Niña",
            ageRange: "Rango de Edad",
            ageBaby: "0-3 años",
            ageToddlers: "2-6 años",
            ageKids: "6-14 años",
            products: "Productos",
            productType: "Tipo de Producto",
            selectGenderAge: "Selecciona género y edad primero",
            selectProducts: "Selecciona artículos de ropa",
            noProducts: "No hay artículos disponibles",
            productsSelected: "artículos seleccionados",
            submit: "Enviar por WhatsApp",
            successTitle: "Abriendo WhatsApp",
            successText: "Si WhatsApp no se abre automáticamente,",
            successLink: "haz clic aquí para enviar tu consulta",
            selected: "seleccionado",
            selectOneOrBoth: "selecciona uno o ambos",
            selectOneOrMore: "selecciona uno o más",
            selectAllThatApply: "selecciona todos los que apliquen",
            footer: "© 2026 Marhaba Fashion",
            optional: "Opcional",
            bulkNotice: "Solo para compradores mayoristas",
            messagePlaceholder: "¿Requisitos específicos? (Opcional)",
            businessOptional: "(Opcional)",
            searchCountry: "Buscar país..."
        },
        sw: {
            formTitle: "Uchunguzi wa Bidhaa",
            formSubtitle: "Shiriki mahitaji yako na timu yetu itawasiliana nawe",
            name: "Jina",
            namePlaceholder: "Jina lako",
            businessName: "Jina la biashara",
            businessNamePlaceholder: "Jina la biashara yako",
            business: "Aina ya biashara",
            businessPlaceholder: "Chagua aina ya biashara",
            businessTypes: {
                regionalDistributor: "Msambazaji wa kikanda",
                childrensClothingStore: "Duka la nguo za watoto",
                departmentStore: "Duka kubwa",
                independentRetailer: "Muuzaji huru",
                onlineSeller: "Muuzaji mtandaoni"
            },
            whatsapp: "Nambari ya WhatsApp",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "Maslahi ya Bidhaa",
            selectAll: "Chagua yote yanayotumika",
            gender: "Jinsia",
            boy: "Mvulana",
            girl: "Msichana",
            ageRange: "Kiwango cha Umri",
            ageBaby: "Miaka 0-3",
            ageToddlers: "Miaka 2-6",
            ageKids: "Miaka 6-14",
            products: "Bidhaa",
            productType: "Aina ya Bidhaa",
            selectGenderAge: "Chagua jinsia na umri kwanza",
            selectProducts: "Chagua aina za nguo",
            noProducts: "Hakuna nguo zinazopatikana",
            productsSelected: "vimechaguliwa",
            submit: "Tuma kupitia WhatsApp",
            successTitle: "Kufungua WhatsApp",
            successText: "Ikiwa WhatsApp haifunguki moja kwa moja,",
            successLink: "bofya hapa kutuma uchunguzi wako",
            selected: "imechaguliwa",
            selectOneOrBoth: "chagua moja au zote mbili",
            selectOneOrMore: "chagua moja au zaidi",
            selectAllThatApply: "chagua yote yanayotumika",
            footer: "© 2026 Marhaba Fashion",
            optional: "Hiari",
            bulkNotice: "Kwa wanunuzi wa jumla pekee",
            messagePlaceholder: "Mahitaji maalum? (Hiari)",
            businessOptional: "(Hiari)",
            searchCountry: "Tafuta nchi..."
        },
        af: {
            formTitle: "Produk Navraag",
            formSubtitle: "Deel jou vereistes en ons span sal jou kontak",
            name: "Naam",
            namePlaceholder: "Jou naam",
            businessName: "Besigheidsnaam",
            businessNamePlaceholder: "Jou besigheidsnaam",
            business: "Tipe besigheid",
            businessPlaceholder: "Kies tipe besigheid",
            businessTypes: {
                regionalDistributor: "Streeksverspreider",
                childrensClothingStore: "Kinderklerewinkel",
                departmentStore: "Afdelingswinkel",
                independentRetailer: "Onafhanklike kleinhandelaar",
                onlineSeller: "Aanlyn verkoper"
            },
            whatsapp: "WhatsApp Nommer",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "Produk Belangstelling",
            selectAll: "Kies alles wat van toepassing is",
            gender: "Geslag",
            boy: "Seun",
            girl: "Meisie",
            ageRange: "Ouderdomsgroep",
            ageBaby: "0-3 jaar",
            ageToddlers: "2-6 jaar",
            ageKids: "6-14 jaar",
            products: "Produkte",
            productType: "Produk Tipe",
            selectGenderAge: "Kies eers geslag en ouderdom",
            selectProducts: "Kies kledingstukke",
            noProducts: "Geen kledingstukke beskikbaar nie",
            productsSelected: "items gekies",
            submit: "Stuur via WhatsApp",
            successTitle: "Maak WhatsApp oop",
            successText: "As WhatsApp nie outomaties oopmaak nie,",
            successLink: "klik hier om jou navraag te stuur",
            selected: "gekies",
            selectOneOrBoth: "kies een of albei",
            selectOneOrMore: "kies een of meer",
            selectAllThatApply: "kies alles wat van toepassing is",
            footer: "© 2026 Marhaba Fashion",
            optional: "Opsioneel",
            bulkNotice: "Slegs vir groothandelkopers",
            messagePlaceholder: "Enige spesifieke vereistes? (Opsioneel)",
            businessOptional: "(Opsioneel)"
        },
        sq: {
            formTitle: "Kërkesë Produkti",
            formSubtitle: "Ndani kërkesat tuaja dhe ekipi ynë do t'ju kontaktojë",
            name: "Emri",
            namePlaceholder: "Emri juaj",
            businessName: "Emri i biznesit",
            businessNamePlaceholder: "Emri i biznesit tuaj",
            business: "Lloji i biznesit",
            businessPlaceholder: "Zgjidhni llojin e biznesit",
            businessTypes: {
                regionalDistributor: "Distributor rajonal",
                childrensClothingStore: "Dyqan veshjesh për fëmijë",
                departmentStore: "Dyqan i madh",
                independentRetailer: "Shitës i pavarur",
                onlineSeller: "Shitës online"
            },
            whatsapp: "Numri WhatsApp",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "Interesi për Produkte",
            selectAll: "Zgjidhni të gjitha që aplikohen",
            gender: "Gjinia",
            boy: "Djalë",
            girl: "Vajzë",
            ageRange: "Grupmoshat",
            ageBaby: "0-3 vjeç",
            ageToddlers: "2-6 vjeç",
            ageKids: "6-14 vjeç",
            products: "Produktet",
            productType: "Lloji i Produktit",
            selectGenderAge: "Zgjidhni fillimisht gjininë dhe moshën",
            selectProducts: "Zgjidhni artikujt e veshjeve",
            noProducts: "Nuk ka artikuj të disponueshëm",
            productsSelected: "artikuj të zgjedhur",
            submit: "Dërgo përmes WhatsApp",
            successTitle: "Po hapet WhatsApp",
            successText: "Nëse WhatsApp nuk hapet automatikisht,",
            successLink: "klikoni këtu për të dërguar kërkesën tuaj",
            selected: "zgjedhur",
            selectOneOrBoth: "zgjidhni një ose të dyja",
            selectOneOrMore: "zgjidhni një ose më shumë",
            selectAllThatApply: "zgjidhni të gjitha që aplikohen",
            footer: "© 2026 Marhaba Fashion",
            optional: "Opsionale",
            bulkNotice: "Vetëm për blerësit me shumicë",
            messagePlaceholder: "Ndonjë kërkesë specifike? (Opsionale)",
            businessOptional: "(Opsionale)"
        },
        am: {
            formTitle: "የምርት ጥያቄ",
            formSubtitle: "መስፈርቶችዎን ያጋሩ እና ቡድናችን ያገኝዎታል",
            name: "ስም",
            namePlaceholder: "ስምዎ",
            businessName: "የንግድ ስም",
            businessNamePlaceholder: "የንግድ ስምዎ",
            business: "የንግድ ዓይነት",
            businessPlaceholder: "የንግድ ዓይነት ይምረጡ",
            businessTypes: {
                regionalDistributor: "የክልል አከፋፋይ",
                childrensClothingStore: "የልጆች ልብስ መደብር",
                departmentStore: "ዲፓርትመንት መደብር",
                independentRetailer: "ገለልተኛ ቸርቻሪ",
                onlineSeller: "የመስመር ላይ ሻጭ"
            },
            whatsapp: "የዋትስአፕ ቁጥር",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "የምርት ፍላጎት",
            selectAll: "የሚመለከቱትን ሁሉ ይምረጡ",
            gender: "ጾታ",
            boy: "ወንድ",
            girl: "ሴት",
            ageRange: "የዕድሜ ክልል",
            ageBaby: "0-3 ዓመት",
            ageToddlers: "2-6 ዓመት",
            ageKids: "6-14 ዓመት",
            products: "ምርቶች",
            productType: "የምርት ዓይነት",
            selectGenderAge: "መጀመሪያ ጾታ እና ዕድሜ ይምረጡ",
            selectProducts: "የልብስ እቃዎችን ይምረጡ",
            noProducts: "ምንም የልብስ እቃዎች የሉም",
            productsSelected: "እቃዎች ተመርጠዋል",
            submit: "በዋትስአፕ ይላኩ",
            successTitle: "ዋትስአፕ እየተከፈተ ነው",
            successText: "ዋትስአፕ በራስ-ሰር ካልተከፈተ፣",
            successLink: "ጥያቄዎን ለመላክ እዚህ ጠቅ ያድርጉ",
            selected: "ተመርጧል",
            selectOneOrBoth: "አንድ ወይም ሁለቱንም ይምረጡ",
            selectOneOrMore: "አንድ ወይም ከዚያ በላይ ይምረጡ",
            selectAllThatApply: "የሚመለከቱትን ሁሉ ይምረጡ",
            footer: "© 2026 Marhaba Fashion",
            optional: "አማራጭ",
            bulkNotice: "ለጅምላ ገዢዎች ብቻ",
            messagePlaceholder: "ልዩ መስፈርቶች? (አማራጭ)",
            businessOptional: "(አማራጭ)"
        },
        hy: {
            formTitle: "Ապրdelays Հետdelays",
            formSubtitle: "Կdelays delays delays delays delays",
            name: "Աdelays",
            namePlaceholder: " Delays delays",
            businessName: "Business Name",
            businessNamePlaceholder: "Your business name",
            business: "Business Type",
            businessPlaceholder: "Select business type",
            businessTypes: {
                regionalDistributor: "Regional Distributor",
                childrensClothingStore: "Children's Clothing Store",
                departmentStore: "Department Store",
                independentRetailer: "Independent Retailer",
                onlineSeller: "Online Seller"
            },
            whatsapp: "WhatsApp Հdelays",
            whatsappPlaceholder: "50 123 4567",
            productInterest: " Delays Հdelays",
            selectAll: " Delays delays delays",
            gender: "Սdelays",
            boy: "Տdelays",
            girl: "Աdelays",
            ageRange: "Տdelays Մdelays",
            ageBaby: "0-3 տdelays",
            ageToddlers: "2-6 delays",
            ageKids: "6-14 delays",
            products: " Delays",
            productType: "Product Type",
            selectGenderAge: "Delays delays delays",
            selectProducts: "Ընdelays հागdelays",
            noProducts: " delays delays",
            productsSelected: " delays",
            submit: "Delays WhatsApp-delays",
            successTitle: "WhatsApp-delays delays",
            successText: "Delays WhatsApp delays delays,",
            successLink: "delays delays delays",
            selected: "delays",
            selectOneOrBoth: "delays delays delays",
            selectOneOrMore: "delays delays delays",
            selectAllThatApply: "delays delays delays",
            footer: "© 2026 Marhaba Fashion",
            optional: "Delays",
            bulkNotice: "Delays delays delays",
            messagePlaceholder: "Delays delays? (Delays)",
            businessOptional: "(Delays)"
        },
        az: {
            formTitle: "Məhsul Sorğusu",
            formSubtitle: "Tələblərinizi paylaşın və komandamız sizinlə əlaqə saxlayacaq",
            name: "Ad",
            namePlaceholder: "Adınız",
            businessName: "Şirkət adı",
            businessNamePlaceholder: "Şirkətinizin adı",
            business: "Biznes növü",
            businessPlaceholder: "Biznes növünü seçin",
            businessTypes: {
                regionalDistributor: "Regional distribütor",
                childrensClothingStore: "Uşaq geyim mağazası",
                departmentStore: "Univermaq",
                independentRetailer: "Müstəqil pərakəndə satıcı",
                onlineSeller: "Onlayn satıcı"
            },
            whatsapp: "WhatsApp Nömrəsi",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "Məhsul Marağı",
            selectAll: "Uyğun olanların hamısını seçin",
            gender: "Cins",
            boy: "Oğlan",
            girl: "Qız",
            ageRange: "Yaş Aralığı",
            ageBaby: "0-3 yaş",
            ageToddlers: "2-6 yaş",
            ageKids: "6-14 yaş",
            products: "Məhsullar",
            productType: "Məhsul Növü",
            selectGenderAge: "Əvvəlcə cins və yaşı seçin",
            selectProducts: "Geyim məhsullarını seçin",
            noProducts: "Geyim yoxdur",
            productsSelected: "seçildi",
            submit: "WhatsApp ilə Göndər",
            successTitle: "WhatsApp açılır",
            successText: "WhatsApp avtomatik açılmazsa,",
            successLink: "sorğunuzu göndərmək üçün bura klikləyin",
            selected: "seçildi",
            selectOneOrBoth: "birini və ya hər ikisini seçin",
            selectOneOrMore: "birini və ya daha çoxunu seçin",
            selectAllThatApply: "uyğun olanların hamısını seçin",
            footer: "© 2026 Marhaba Fashion",
            optional: "İstəyə bağlı",
            bulkNotice: "Yalnız topdan alıcılar üçün",
            messagePlaceholder: "Xüsusi tələblər? (İstəyə bağlı)",
            businessOptional: "(İstəyə bağlı)"
        },
        gu: {
            formTitle: "ઉત્પાદન પૂછપરછ",
            formSubtitle: "તમારી જરૂરિયાતો શેર કરો અને અમારી ટીમ સંપર્ક કરશે",
            name: "નામ",
            namePlaceholder: "તમારું નામ",
            businessName: "વ્યવસાયનું નામ",
            businessNamePlaceholder: "તમારા વ્યવસાયનું નામ",
            business: "વ્યવસાયનો પ્રકાર",
            businessPlaceholder: "વ્યવસાયનો પ્રકાર પસંદ કરો",
            businessTypes: {
                regionalDistributor: "પ્રાદેશિક વિતરક",
                childrensClothingStore: "બાળકોના કપડાંની દુકાન",
                departmentStore: "ડિપાર્ટમેન્ટ સ્ટોર",
                independentRetailer: "સ્વતંત્ર છૂટક વિક્રેતા",
                onlineSeller: "ઓનલાઈન વિક્રેતા"
            },
            whatsapp: "WhatsApp નંબર",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "ઉત્પાદન રસ",
            selectAll: "લાગુ પડતા બધા પસંદ કરો",
            gender: "જાતિ",
            boy: "છોકરો",
            girl: "છોકરી",
            ageRange: "ઉંમર શ્રેણી",
            ageBaby: "0-3 વર્ષ",
            ageToddlers: "2-6 વર્ષ",
            ageKids: "6-14 વર્ષ",
            products: "ઉત્પાદનો",
            productType: "ઉત્પાદન પ્રકાર",
            selectGenderAge: "પહેલા જાતિ અને ઉંમર પસંદ કરો",
            selectProducts: "કપડાં પસંદ કરો",
            noProducts: "કોઈ કપડાં ઉપલબ્ધ નથી",
            productsSelected: "પસંદ કર્યા",
            submit: "WhatsApp દ્વારા મોકલો",
            successTitle: "WhatsApp ખોલી રહ્યું છે",
            successText: "જો WhatsApp આપોઆપ ન ખૂલે,",
            successLink: "તમારી પૂછપરછ મોકલવા અહીં ક્લિક કરો",
            selected: "પસંદ કર્યું",
            selectOneOrBoth: "એક અથવા બંને પસંદ કરો",
            selectOneOrMore: "એક અથવા વધુ પસંદ કરો",
            selectAllThatApply: "લાગુ પડતા બધા પસંદ કરો",
            footer: "© 2026 Marhaba Fashion",
            optional: "વૈકલ્પિક",
            bulkNotice: "માત્ર જથ્થાબંધ ખરીદદારો માટે",
            messagePlaceholder: "કોઈ ચોક્કસ જરૂરિયાતો? (વૈકલ્પિક)",
            businessOptional: "(વૈકલ્પિક)"
        },
        ha: {
            formTitle: "Tambayar Samfur",
            formSubtitle: "Raba bukatunku kuma ƙungiyarmu za ta tuntuɓe ku",
            name: "Suna",
            namePlaceholder: "Sunanka",
            businessName: "Sunan kasuwanci",
            businessNamePlaceholder: "Sunan kasuwancinka",
            business: "Nau'in kasuwanci",
            businessPlaceholder: "Zaɓi nau'in kasuwanci",
            businessTypes: {
                regionalDistributor: "Mai rarraba yanki",
                childrensClothingStore: "Shagon tufafin yara",
                departmentStore: "Babban shago",
                independentRetailer: "Mai siyar da kansa",
                onlineSeller: "Mai siyarwa ta yanar gizo"
            },
            whatsapp: "Lambar WhatsApp",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "Sha'awar Samfur",
            selectAll: "Zaɓi duk abin da ya dace",
            gender: "Jinsi",
            boy: "Namiji",
            girl: "Mace",
            ageRange: "Shekarun Shekaru",
            ageBaby: "Shekaru 0-3",
            ageToddlers: "Shekaru 2-6",
            ageKids: "Shekaru 6-14",
            products: "Samfuran",
            productType: "Nau'in Samfur",
            selectGenderAge: "Da farko zaɓi jinsi da shekaru",
            selectProducts: "Zaɓi nau'ikan sutura",
            noProducts: "Babu sutura da ke akwai",
            productsSelected: "an zaɓa",
            submit: "Aika ta WhatsApp",
            successTitle: "Ana buɗe WhatsApp",
            successText: "Idan WhatsApp bai buɗe da kansa ba,",
            successLink: "danna nan don aika tambayarka",
            selected: "an zaɓa",
            selectOneOrBoth: "zaɓi ɗaya ko duka biyun",
            selectOneOrMore: "zaɓi ɗaya ko fiye",
            selectAllThatApply: "zaɓi duk abin da ya dace",
            footer: "© 2026 Marhaba Fashion",
            optional: "Na zaɓi",
            bulkNotice: "Ga masu siye da yawa kawai",
            messagePlaceholder: "Wasu buƙatu na musamman? (Na zaɓi)",
            businessOptional: "(Na zaɓi)"
        },
        hi: {
            formTitle: "उत्पाद पूछताछ",
            formSubtitle: "अपनी आवश्यकताएं साझा करें और हमारी टीम संपर्क करेगी",
            name: "नाम",
            namePlaceholder: "आपका नाम",
            businessName: "व्यवसाय का नाम",
            businessNamePlaceholder: "आपके व्यवसाय का नाम",
            business: "व्यवसाय का प्रकार",
            businessPlaceholder: "व्यवसाय का प्रकार चुनें",
            businessTypes: {
                regionalDistributor: "क्षेत्रीय वितरक",
                childrensClothingStore: "बच्चों के कपड़ों की दुकान",
                departmentStore: "डिपार्टमेंट स्टोर",
                independentRetailer: "स्वतंत्र खुदरा विक्रेता",
                onlineSeller: "ऑनलाइन विक्रेता"
            },
            whatsapp: "WhatsApp नंबर",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "उत्पाद रुचि",
            selectAll: "सभी लागू चुनें",
            gender: "लिंग",
            boy: "लड़का",
            girl: "लड़की",
            ageRange: "आयु सीमा",
            ageBaby: "0-3 वर्ष",
            ageToddlers: "2-6 वर्ष",
            ageKids: "6-14 वर्ष",
            products: "उत्पाद",
            productType: "उत्पाद प्रकार",
            selectGenderAge: "पहले लिंग और आयु चुनें",
            selectProducts: "कपड़े चुनें",
            noProducts: "कोई कपड़े उपलब्ध नहीं",
            productsSelected: "चुने गए",
            submit: "WhatsApp से भेजें",
            successTitle: "WhatsApp खुल रहा है",
            successText: "अगर WhatsApp स्वचालित रूप से नहीं खुलता,",
            successLink: "अपनी पूछताछ भेजने के लिए यहां क्लिक करें",
            selected: "चयनित",
            selectOneOrBoth: "एक या दोनों चुनें",
            selectOneOrMore: "एक या अधिक चुनें",
            selectAllThatApply: "सभी लागू चुनें",
            footer: "© 2026 Marhaba Fashion",
            optional: "वैकल्पिक",
            bulkNotice: "केवल थोक खरीदारों के लिए",
            messagePlaceholder: "कोई विशेष आवश्यकता? (वैकल्पिक)",
            businessOptional: "(वैकल्पिक)"
        },
        kk: {
            formTitle: "Өнім сұрауы",
            formSubtitle: "Талаптарыңызды бөлісіңіз, біздің команда сізбен байланысады",
            name: "Аты",
            namePlaceholder: "Сіздің атыңыз",
            businessName: "Бизнес атауы",
            businessNamePlaceholder: "Сіздің бизнес атауыңыз",
            business: "Бизнес түрі",
            businessPlaceholder: "Бизнес түрін таңдаңыз",
            businessTypes: {
                regionalDistributor: "Аймақтық дистрибьютор",
                childrensClothingStore: "Балалар киімі дүкені",
                departmentStore: "Әмбебап дүкен",
                independentRetailer: "Тәуелсіз бөлшек сатушы",
                onlineSeller: "Онлайн сатушы"
            },
            whatsapp: "WhatsApp нөмірі",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "Өнімге қызығушылық",
            selectAll: "Барлық сәйкес келетіндерді таңдаңыз",
            gender: "Жынысы",
            boy: "Ұл",
            girl: "Қыз",
            ageRange: "Жас аралығы",
            ageBaby: "0-3 жас",
            ageToddlers: "2-6 жас",
            ageKids: "6-14 жас",
            products: "Өнімдер",
            productType: "Өнім Түрі",
            selectGenderAge: "Алдымен жынысы мен жасын таңдаңыз",
            selectProducts: "Киім түрлерін таңдаңыз",
            noProducts: "Киім түрлері жоқ",
            productsSelected: "таңдалды",
            submit: "WhatsApp арқылы жіберу",
            successTitle: "WhatsApp ашылуда",
            successText: "Егер WhatsApp автоматты түрде ашылмаса,",
            successLink: "сұрауыңызды жіберу үшін мұнда басыңыз",
            selected: "таңдалды",
            selectOneOrBoth: "бірін немесе екеуін де таңдаңыз",
            selectOneOrMore: "бірін немесе бірнешеуін таңдаңыз",
            selectAllThatApply: "барлық сәйкес келетіндерді таңдаңыз",
            footer: "© 2026 Marhaba Fashion",
            optional: "Міндетті емес",
            bulkNotice: "Тек көтерме сатып алушыларға",
            messagePlaceholder: "Арнайы талаптар? (Міндетті емес)",
            businessOptional: "(Міндетті емес)"
        },
        ku: {
            formTitle: "Pirsiyara Hilberê",
            formSubtitle: "Pêdiviyên xwe parve bikin û tîmê me dê pêwendiyê bi we re bike",
            name: "Nav",
            namePlaceholder: "Navê te",
            businessName: "Navê karsaziyê",
            businessNamePlaceholder: "Navê karsaziya te",
            business: "Cureya karsaziyê",
            businessPlaceholder: "Cureya karsaziyê hilbijêre",
            businessTypes: {
                regionalDistributor: "Belavkerê herêmî",
                childrensClothingStore: "Dikana cil û bergên zarokan",
                departmentStore: "Dikana mezin",
                independentRetailer: "Firotkarê serbixwe",
                onlineSeller: "Firotkarê serhêl"
            },
            whatsapp: "Jimara WhatsApp",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "Eleqeya Hilberê",
            selectAll: "Hemû yên têkildar hilbijêre",
            gender: "Zayend",
            boy: "Kur",
            girl: "Keç",
            ageRange: "Rêza Temenî",
            ageBaby: "0-3 sal",
            ageToddlers: "2-6 sal",
            ageKids: "6-14 sal",
            products: "Hilber",
            productType: "Cureyê Hilberê",
            selectGenderAge: "Pêşî zayend û temen hilbijêre",
            selectProducts: "Cil û bergan hilbijêre",
            noProducts: "Tu cil tune",
            productsSelected: "hatin hilbijartin",
            submit: "Bi WhatsApp bişîne",
            successTitle: "WhatsApp vedibe",
            successText: "Eger WhatsApp bixweber venebe,",
            successLink: "ji bo şandina pirsiyara xwe li vir bikirtînin",
            selected: "hilbijartî",
            selectOneOrBoth: "yek an her du hilbijêre",
            selectOneOrMore: "yek an zêdetir hilbijêre",
            selectAllThatApply: "hemû yên têkildar hilbijêre",
            footer: "© 2026 Marhaba Fashion",
            optional: "Bijartî",
            bulkNotice: "Tenê ji bo kiriyarên mezin",
            messagePlaceholder: "Pêdiviyên taybet? (Bijartî)",
            businessOptional: "(Bijartî)"
        },
        mn: {
            formTitle: "Бүтээгдэхүүний лавлагаа",
            formSubtitle: "Шаардлагаа хуваалцана уу, манай баг тантай холбогдоно",
            name: "Нэр",
            namePlaceholder: "Таны нэр",
            businessName: "Бизнесийн нэр",
            businessNamePlaceholder: "Таны бизнесийн нэр",
            business: "Бизнесийн төрөл",
            businessPlaceholder: "Бизнесийн төрлийг сонгоно уу",
            businessTypes: {
                regionalDistributor: "Бүсийн түгээгч",
                childrensClothingStore: "Хүүхдийн хувцасны дэлгүүр",
                departmentStore: "Их дэлгүүр",
                independentRetailer: "Бие даасан жижиглэн худалдаач",
                onlineSeller: "Онлайн худалдагч"
            },
            whatsapp: "WhatsApp дугаар",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "Бүтээгдэхүүний сонирхол",
            selectAll: "Тохирох бүгдийг сонгоно уу",
            gender: "Хүйс",
            boy: "Хүү",
            girl: "Охин",
            ageRange: "Насны ангилал",
            ageBaby: "0-3 нас",
            ageToddlers: "2-6 нас",
            ageKids: "6-14 нас",
            products: "Бүтээгдэхүүн",
            productType: "Бүтээгдэхүүний Төрөл",
            selectGenderAge: "Эхлээд хүйс, насыг сонгоно уу",
            selectProducts: "Хувцасны төрлийг сонгоно уу",
            noProducts: "Хувцас байхгүй",
            productsSelected: "сонгогдсон",
            submit: "WhatsApp-аар илгээх",
            successTitle: "WhatsApp нээгдэж байна",
            successText: "Хэрэв WhatsApp автоматаар нээгдэхгүй бол,",
            successLink: "лавлагаагаа илгээхийн тулд энд дарна уу",
            selected: "сонгогдсон",
            selectOneOrBoth: "нэг эсвэл хоёуланг нь сонгоно уу",
            selectOneOrMore: "нэг эсвэл түүнээс дээш сонгоно уу",
            selectAllThatApply: "тохирох бүгдийг сонгоно уу",
            footer: "© 2026 Marhaba Fashion",
            optional: "Нэмэлт",
            bulkNotice: "Зөвхөн бөөний худалдан авагчдад",
            messagePlaceholder: "Тусгай шаардлага? (Нэмэлт)",
            businessOptional: "(Нэмэлт)"
        },
        ps: {
            formTitle: "د محصول پوښتنه",
            formSubtitle: "خپلې اړتیاوې شریکې کړئ او زموږ ټیم به تاسو سره اړیکه ونیسي",
            name: "نوم",
            namePlaceholder: "ستاسو نوم",
            businessName: "د سوداګرۍ نوم",
            businessNamePlaceholder: "ستاسو د سوداګرۍ نوم",
            business: "د سوداګرۍ ډول",
            businessPlaceholder: "د سوداګرۍ ډول غوره کړئ",
            businessTypes: {
                regionalDistributor: "سیمه ایز توزیع کونکی",
                childrensClothingStore: "د ماشومانو جامو پلورنځی",
                departmentStore: "لوی پلورنځی",
                independentRetailer: "خپلواک پرچون پلورونکی",
                onlineSeller: "آنلاین پلورونکی"
            },
            whatsapp: "د واټساپ شمیره",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "د محصول لیوالتیا",
            selectAll: "ټول اړونده غوره کړئ",
            gender: "جنسیت",
            boy: "هلک",
            girl: "نجلۍ",
            ageRange: "د عمر سلسله",
            ageBaby: "۰-۳ کاله",
            ageToddlers: "۲-۶ کاله",
            ageKids: "۶-۱۴ کاله",
            products: "محصولات",
            productType: "د محصول ډول",
            selectGenderAge: "لومړی جنسیت او عمر غوره کړئ",
            selectProducts: "د جامو توکي وټاکئ",
            noProducts: "هیڅ جامې شتون نلري",
            productsSelected: "غوره شول",
            submit: "د واټساپ له لارې واستوئ",
            successTitle: "واټساپ خلاصیږي",
            successText: "که واټساپ په اتوماتیک ډول خلاص نشي،",
            successLink: "د خپلې پوښتنې لیږلو لپاره دلته کلیک وکړئ",
            selected: "غوره شوی",
            selectOneOrBoth: "یو یا دواړه غوره کړئ",
            selectOneOrMore: "یو یا ډیر غوره کړئ",
            selectAllThatApply: "ټول اړونده غوره کړئ",
            footer: "© 2026 Marhaba Fashion",
            optional: "اختیاري",
            bulkNotice: "یوازې د عمده پیرودونکو لپاره",
            messagePlaceholder: "کومې ځانګړې اړتیاوې? (اختیاري)",
            businessOptional: "(اختیاري)"
        },
        pt: {
            formTitle: "Consulta de Produtos",
            formSubtitle: "Compartilhe suas necessidades e nossa equipe entrará em contato",
            name: "Nome",
            namePlaceholder: "Seu nome",
            businessName: "Nome da empresa",
            businessNamePlaceholder: "Nome da sua empresa",
            business: "Tipo de negócio",
            businessPlaceholder: "Selecione o tipo de negócio",
            businessTypes: {
                regionalDistributor: "Distribuidor regional",
                childrensClothingStore: "Loja de roupas infantis",
                departmentStore: "Loja de departamentos",
                independentRetailer: "Varejista independente",
                onlineSeller: "Vendedor online"
            },
            whatsapp: "Número do WhatsApp",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "Interesse em Produtos",
            selectAll: "Selecione tudo que se aplica",
            gender: "Gênero",
            boy: "Menino",
            girl: "Menina",
            ageRange: "Faixa Etária",
            ageBaby: "0-3 anos",
            ageToddlers: "2-6 anos",
            ageKids: "6-14 anos",
            products: "Produtos",
            productType: "Tipo de Produto",
            selectGenderAge: "Primeiro selecione gênero e idade",
            selectProducts: "Selecione os artigos de roupa",
            noProducts: "Nenhum artigo disponível",
            productsSelected: "itens selecionados",
            submit: "Enviar via WhatsApp",
            successTitle: "Abrindo WhatsApp",
            successText: "Se o WhatsApp não abrir automaticamente,",
            successLink: "clique aqui para enviar sua consulta",
            selected: "selecionado",
            selectOneOrBoth: "selecione um ou ambos",
            selectOneOrMore: "selecione um ou mais",
            selectAllThatApply: "selecione tudo que se aplica",
            footer: "© 2026 Marhaba Fashion",
            optional: "Opcional",
            bulkNotice: "Apenas para compradores por atacado",
            messagePlaceholder: "Requisitos específicos? (Opcional)",
            businessOptional: "(Opcional)",
            searchCountry: "Buscar país..."
        },
        so: {
            formTitle: "Su'aasha Badeecada",
            formSubtitle: "La wadaag shuruudahaaga kooxdeenna ayaa kula soo xiriiri doonta",
            name: "Magaca",
            namePlaceholder: "Magacaaga",
            businessName: "Magaca ganacsiga",
            businessNamePlaceholder: "Magaca ganacsigaaga",
            business: "Nooca ganacsiga",
            businessPlaceholder: "Dooro nooca ganacsiga",
            businessTypes: {
                regionalDistributor: "Qaybiyaha gobolka",
                childrensClothingStore: "Dukaan dharka carruurta",
                departmentStore: "Dukaan weyn",
                independentRetailer: "Tafaariiqle madaxbanaan",
                onlineSeller: "Iibiyaha onlaynka"
            },
            whatsapp: "Lambarka WhatsApp",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "Xiisaha Badeecada",
            selectAll: "Dooro dhammaan kuwa khuseeya",
            gender: "Jinsiga",
            boy: "Wiil",
            girl: "Gabar",
            ageRange: "Da'da",
            ageBaby: "0-3 sano",
            ageToddlers: "2-6 sano",
            ageKids: "6-14 sano",
            products: "Badeecada",
            productType: "Nooca Badeecada",
            selectGenderAge: "Marka hore dooro jinsiga iyo da'da",
            selectProducts: "Dooro noocyada dharka",
            noProducts: "Ma jirto dhar",
            productsSelected: "la doortay",
            submit: "U dir WhatsApp",
            successTitle: "WhatsApp ayaa furmaya",
            successText: "Haddii WhatsApp si toos ah u furan waayo,",
            successLink: "halkan guji si aad u dirto su'aashaada",
            selected: "la doortay",
            selectOneOrBoth: "dooro mid ama labadaba",
            selectOneOrMore: "dooro mid ama in ka badan",
            selectAllThatApply: "dooro dhammaan kuwa khuseeya",
            footer: "© 2026 Marhaba Fashion",
            optional: "Ikhtiyaari",
            bulkNotice: "Iibsadayaasha badan oo keliya",
            messagePlaceholder: "Shuruudo gaar ah? (Ikhtiyaari)",
            businessOptional: "(Ikhtiyaari)"
        },
        tr: {
            formTitle: "Ürün Sorusu",
            formSubtitle: "Gereksinimlerinizi paylaşın, ekibimiz sizinle iletişime geçecek",
            name: "İsim",
            namePlaceholder: "İsminiz",
            businessName: "İşletme adı",
            businessNamePlaceholder: "İşletmenizin adı",
            business: "İşletme türü",
            businessPlaceholder: "İşletme türünü seçin",
            businessTypes: {
                regionalDistributor: "Bölgesel distribütör",
                childrensClothingStore: "Çocuk giyim mağazası",
                departmentStore: "Departman mağazası",
                independentRetailer: "Bağımsız perakendeci",
                onlineSeller: "Online satıcı"
            },
            whatsapp: "WhatsApp Numarası",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "Ürün İlgisi",
            selectAll: "Geçerli olanların hepsini seçin",
            gender: "Cinsiyet",
            boy: "Erkek",
            girl: "Kız",
            ageRange: "Yaş Aralığı",
            ageBaby: "0-3 yaş",
            ageToddlers: "2-6 yaş",
            ageKids: "6-14 yaş",
            products: "Ürünler",
            productType: "Ürün Türü",
            selectGenderAge: "Önce cinsiyet ve yaş seçin",
            selectProducts: "Giyim ürünlerini seçin",
            noProducts: "Giyim ürünü yok",
            productsSelected: "seçildi",
            submit: "WhatsApp ile Gönder",
            successTitle: "WhatsApp Açılıyor",
            successText: "WhatsApp otomatik açılmazsa,",
            successLink: "sorgunuzu göndermek için buraya tıklayın",
            selected: "seçildi",
            selectOneOrBoth: "birini veya ikisini de seçin",
            selectOneOrMore: "birini veya daha fazlasını seçin",
            selectAllThatApply: "geçerli olanların hepsini seçin",
            footer: "© 2026 Marhaba Fashion",
            optional: "İsteğe Bağlı",
            bulkNotice: "Sadece toptan alıcılar için",
            messagePlaceholder: "Özel gereksinimler? (İsteğe Bağlı)",
            businessOptional: "(İsteğe Bağlı)"
        },
        ur: {
            formTitle: "مصنوعات کی پوچھ گچھ",
            formSubtitle: "اپنی ضروریات بتائیں اور ہماری ٹیم آپ سے رابطہ کرے گی",
            name: "نام",
            namePlaceholder: "آپ کا نام",
            businessName: "کاروبار کا نام",
            businessNamePlaceholder: "آپ کے کاروبار کا نام",
            business: "کاروبار کی قسم",
            businessPlaceholder: "کاروبار کی قسم منتخب کریں",
            businessTypes: {
                regionalDistributor: "علاقائی تقسیم کار",
                childrensClothingStore: "بچوں کے کپڑوں کی دکان",
                departmentStore: "ڈیپارٹمنٹ اسٹور",
                independentRetailer: "آزاد خوردہ فروش",
                onlineSeller: "آن لائن فروخت کنندہ"
            },
            whatsapp: "واٹس ایپ نمبر",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "مصنوعات میں دلچسپی",
            selectAll: "تمام متعلقہ منتخب کریں",
            gender: "جنس",
            boy: "لڑکا",
            girl: "لڑکی",
            ageRange: "عمر کی حد",
            ageBaby: "۰-۳ سال",
            ageToddlers: "۲-۶ سال",
            ageKids: "۶-۱۴ سال",
            products: "مصنوعات",
            productType: "مصنوعات کی قسم",
            selectGenderAge: "پہلے جنس اور عمر منتخب کریں",
            selectProducts: "کپڑوں کی اقسام منتخب کریں",
            noProducts: "کوئی کپڑے دستیاب نہیں",
            productsSelected: "منتخب",
            submit: "واٹس ایپ سے بھیجیں",
            successTitle: "واٹس ایپ کھل رہا ہے",
            successText: "اگر واٹس ایپ خود بخود نہ کھلے،",
            successLink: "اپنی پوچھ گچھ بھیجنے کے لیے یہاں کلک کریں",
            selected: "منتخب",
            selectOneOrBoth: "ایک یا دونوں منتخب کریں",
            selectOneOrMore: "ایک یا زیادہ منتخب کریں",
            selectAllThatApply: "تمام متعلقہ منتخب کریں",
            footer: "© 2026 مرحبا فیشن",
            optional: "اختیاری",
            bulkNotice: "صرف تھوک خریداروں کے لیے",
            messagePlaceholder: "کوئی خاص ضروریات? (اختیاری)",
            businessOptional: "(اختیاری)",
            searchCountry: "جستجوی کشور..."
        },
        uz: {
            formTitle: "Mahsulot so'rovi",
            formSubtitle: "Talablaringizni ulashing va jamoamiz siz bilan bog'lanadi",
            name: "Ism",
            namePlaceholder: "Ismingiz",
            businessName: "Biznes nomi",
            businessNamePlaceholder: "Biznesingiz nomi",
            business: "Biznes turi",
            businessPlaceholder: "Biznes turini tanlang",
            businessTypes: {
                regionalDistributor: "Hududiy distribyutor",
                childrensClothingStore: "Bolalar kiyimlari do'koni",
                departmentStore: "Universal do'kon",
                independentRetailer: "Mustaqil chakana sotuvchi",
                onlineSeller: "Onlayn sotuvchi"
            },
            whatsapp: "WhatsApp raqami",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "Mahsulotga qiziqish",
            selectAll: "Tegishli barcha variantlarni tanlang",
            gender: "Jins",
            boy: "O'g'il bola",
            girl: "Qiz bola",
            ageRange: "Yosh oralig'i",
            ageBaby: "0-3 yosh",
            ageToddlers: "2-6 yosh",
            ageKids: "6-14 yosh",
            products: "Mahsulotlar",
            productType: "Mahsulot Turi",
            selectGenderAge: "Avval jins va yoshni tanlang",
            selectProducts: "Kiyim turlarini tanlang",
            noProducts: "Kiyim mavjud emas",
            productsSelected: "tanlandi",
            submit: "WhatsApp orqali yuborish",
            successTitle: "WhatsApp ochilmoqda",
            successText: "Agar WhatsApp avtomatik ochilmasa,",
            successLink: "so'rovingizni yuborish uchun bu yerni bosing",
            selected: "tanlandi",
            selectOneOrBoth: "birini yoki ikkalasini tanlang",
            selectOneOrMore: "birini yoki ko'proq tanlang",
            selectAllThatApply: "tegishli barcha variantlarni tanlang",
            footer: "© 2026 Marhaba Fashion",
            optional: "Ixtiyoriy",
            bulkNotice: "Faqat ulgurji xaridorlar uchun",
            messagePlaceholder: "Maxsus talablar? (Ixtiyoriy)",
            businessOptional: "(Ixtiyoriy)"
        },
        yo: {
            formTitle: "Ìbéèrè Ọjà",
            formSubtitle: "Pin àwọn ohun tí o nílò àti àwùjọ wa yóò kàn sí ọ",
            name: "Orúkọ",
            namePlaceholder: "Orúkọ rẹ",
            businessName: "Orúkọ iṣowo",
            businessNamePlaceholder: "Orúkọ iṣowo rẹ",
            business: "Irú iṣowo",
            businessPlaceholder: "Yan irú iṣowo",
            businessTypes: {
                regionalDistributor: "Olùpínpín àgbègbè",
                childrensClothingStore: "Ilé ìtajà aṣọ ọmọdé",
                departmentStore: "Ilé ìtajà ńlá",
                independentRetailer: "Olùtajà aládàní",
                onlineSeller: "Olùtajà orí ayélujára"
            },
            whatsapp: "Nọ́mbà WhatsApp",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "Ìfẹ́ Ọjà",
            selectAll: "Yan gbogbo èyí tó bá kan",
            gender: "Ìbálòpọ̀",
            boy: "Ọmọkùnrin",
            girl: "Ọmọbìnrin",
            ageRange: "Ìdiwọ̀n Ọjọ́-orí",
            ageBaby: "Ọdún 0-3",
            ageToddlers: "Ọdún 2-6",
            ageKids: "Ọdún 6-14",
            products: "Àwọn Ọjà",
            productType: "Irú Ọjà",
            selectGenderAge: "Yan ìbálòpọ̀ àti ọjọ́-orí lákọ̀ọ́kọ́",
            selectProducts: "Yan àwọn aṣọ",
            noProducts: "Kò sí aṣọ tó wà",
            productsSelected: "tí a yan",
            submit: "Fi WhatsApp ránṣẹ́",
            successTitle: "WhatsApp ń ṣí",
            successText: "Bí WhatsApp kò bá ṣí fúnra rẹ̀,",
            successLink: "tẹ ibí láti fi ìbéèrè rẹ ránṣẹ́",
            selected: "tí a yan",
            selectOneOrBoth: "yan ọ̀kan tàbí méjèèjì",
            selectOneOrMore: "yan ọ̀kan tàbí jù bẹ́ẹ̀ lọ",
            selectAllThatApply: "yan gbogbo èyí tó bá kan",
            footer: "© 2026 Marhaba Fashion",
            optional: "Àṣàyàn",
            bulkNotice: "Fún àwọn oníṣòwò ńlá nìkan",
            messagePlaceholder: "Àwọn ohun pàtàkì? (Àṣàyàn)",
            businessOptional: "(Àṣàyàn)"
        },
        zu: {
            formTitle: "Umbuzo Wemkhiqizo",
            formSubtitle: "Yabelana ngezidingo zakho futhi ithimba lethu lizokuxhumana nawe",
            name: "Igama",
            namePlaceholder: "Igama lakho",
            businessName: "Igama lebhizinisi",
            businessNamePlaceholder: "Igama lebhizinisi lakho",
            business: "Uhlobo lwebhizinisi",
            businessPlaceholder: "Khetha uhlobo lwebhizinisi",
            businessTypes: {
                regionalDistributor: "Umabhalane wesifunda",
                childrensClothingStore: "Isitolo sezingubo zabantwana",
                departmentStore: "Isitolo esikhulu",
                independentRetailer: "Umthengisi ozimele",
                onlineSeller: "Umthengisi we-inthanethi"
            },
            whatsapp: "Inombolo ye-WhatsApp",
            whatsappPlaceholder: "50 123 4567",
            productInterest: "Intshisekelo Yomkhiqizo",
            selectAll: "Khetha konke okusebenzayo",
            gender: "Ubulili",
            boy: "Umfana",
            girl: "Intombazane",
            ageRange: "Ibanga Leminyaka",
            ageBaby: "Iminyaka 0-3",
            ageToddlers: "Iminyaka 2-6",
            ageKids: "Iminyaka 6-14",
            products: "Imikhiqizo",
            productType: "Uhlobo Lwemikhiqizo",
            selectGenderAge: "Khetha ubulili neminyaka kuqala",
            selectProducts: "Khetha izinhlobo zezingubo",
            noProducts: "Azikho izingubo ezikhona",
            productsSelected: "ekhethiwe",
            submit: "Thumela nge-WhatsApp",
            successTitle: "I-WhatsApp iyavulwa",
            successText: "Uma i-WhatsApp ingavuleki ngokuzenzakalelayo,",
            successLink: "chofoza lapha ukuthumela umbuzo wakho",
            selected: "okukhethiwe",
            selectOneOrBoth: "khetha okukodwa noma kokubili",
            selectOneOrMore: "khetha okukodwa noma ngaphezulu",
            selectAllThatApply: "khetha konke okusebenzayo",
            footer: "© 2026 Marhaba Fashion",
            optional: "Okukhethwa nguwe",
            bulkNotice: "Abathengi abakhulu kuphela",
            messagePlaceholder: "Izidingo ezikhethekile? (Okukhethwa nguwe)",
            businessOptional: "(Okukhethwa nguwe)"
        }
    };

    let currentLang = 'en';

    // Country data for searchable picker
    const countries = [
        { code: "+971", flag: "🇦🇪", name: "United Arab Emirates", placeholder: "50 123 4567" },
        { code: "+93", flag: "🇦🇫", name: "Afghanistan", placeholder: "70 123 4567" },
        { code: "+355", flag: "🇦🇱", name: "Albania", placeholder: "69 123 4567" },
        { code: "+213", flag: "🇩🇿", name: "Algeria", placeholder: "551 23 4567" },
        { code: "+376", flag: "🇦🇩", name: "Andorra", placeholder: "312 345" },
        { code: "+244", flag: "🇦🇴", name: "Angola", placeholder: "923 123 456" },
        { code: "+1264", flag: "🇦🇮", name: "Anguilla", placeholder: "235 1234" },
        { code: "+1268", flag: "🇦🇬", name: "Antigua and Barbuda", placeholder: "464 1234" },
        { code: "+54", flag: "🇦🇷", name: "Argentina", placeholder: "11 1234 5678" },
        { code: "+374", flag: "🇦🇲", name: "Armenia", placeholder: "91 123456" },
        { code: "+297", flag: "🇦🇼", name: "Aruba", placeholder: "560 1234" },
        { code: "+61", flag: "🇦🇺", name: "Australia", placeholder: "412 345 678" },
        { code: "+43", flag: "🇦🇹", name: "Austria", placeholder: "664 123456" },
        { code: "+994", flag: "🇦🇿", name: "Azerbaijan", placeholder: "50 123 4567" },
        { code: "+1242", flag: "🇧🇸", name: "Bahamas", placeholder: "359 1234" },
        { code: "+973", flag: "🇧🇭", name: "Bahrain", placeholder: "3123 4567" },
        { code: "+880", flag: "🇧🇩", name: "Bangladesh", placeholder: "1812 345678" },
        { code: "+1246", flag: "🇧🇧", name: "Barbados", placeholder: "250 1234" },
        { code: "+375", flag: "🇧🇾", name: "Belarus", placeholder: "29 123 4567" },
        { code: "+32", flag: "🇧🇪", name: "Belgium", placeholder: "470 12 34 56" },
        { code: "+501", flag: "🇧🇿", name: "Belize", placeholder: "622 1234" },
        { code: "+229", flag: "🇧🇯", name: "Benin", placeholder: "90 12 3456" },
        { code: "+1441", flag: "🇧🇲", name: "Bermuda", placeholder: "370 1234" },
        { code: "+975", flag: "🇧🇹", name: "Bhutan", placeholder: "17 12 3456" },
        { code: "+591", flag: "🇧🇴", name: "Bolivia", placeholder: "7123 4567" },
        { code: "+387", flag: "🇧🇦", name: "Bosnia and Herzegovina", placeholder: "61 123 456" },
        { code: "+267", flag: "🇧🇼", name: "Botswana", placeholder: "71 123 456" },
        { code: "+55", flag: "🇧🇷", name: "Brazil", placeholder: "11 91234 5678" },
        { code: "+673", flag: "🇧🇳", name: "Brunei", placeholder: "712 3456" },
        { code: "+359", flag: "🇧🇬", name: "Bulgaria", placeholder: "88 123 4567" },
        { code: "+226", flag: "🇧🇫", name: "Burkina Faso", placeholder: "70 12 34 56" },
        { code: "+257", flag: "🇧🇮", name: "Burundi", placeholder: "79 12 3456" },
        { code: "+855", flag: "🇰🇭", name: "Cambodia", placeholder: "91 234 567" },
        { code: "+237", flag: "🇨🇲", name: "Cameroon", placeholder: "6 71 23 45 67" },
        { code: "+1", flag: "🇨🇦", name: "Canada", placeholder: "204 555 1234" },
        { code: "+238", flag: "🇨🇻", name: "Cape Verde", placeholder: "991 2345" },
        { code: "+1345", flag: "🇰🇾", name: "Cayman Islands", placeholder: "323 1234" },
        { code: "+236", flag: "🇨🇫", name: "Central African Republic", placeholder: "70 12 3456" },
        { code: "+235", flag: "🇹🇩", name: "Chad", placeholder: "63 12 34 56" },
        { code: "+56", flag: "🇨🇱", name: "Chile", placeholder: "9 1234 5678" },
        { code: "+86", flag: "🇨🇳", name: "China", placeholder: "131 2345 6789" },
        { code: "+57", flag: "🇨🇴", name: "Colombia", placeholder: "310 123 4567" },
        { code: "+269", flag: "🇰🇲", name: "Comoros", placeholder: "321 2345" },
        { code: "+243", flag: "🇨🇩", name: "Congo (DRC)", placeholder: "81 234 5678" },
        { code: "+242", flag: "🇨🇬", name: "Congo (Republic)", placeholder: "06 123 4567" },
        { code: "+506", flag: "🇨🇷", name: "Costa Rica", placeholder: "8312 3456" },
        { code: "+385", flag: "🇭🇷", name: "Croatia", placeholder: "91 234 5678" },
        { code: "+53", flag: "🇨🇺", name: "Cuba", placeholder: "5 123 4567" },
        { code: "+357", flag: "🇨🇾", name: "Cyprus", placeholder: "96 123456" },
        { code: "+420", flag: "🇨🇿", name: "Czech Republic", placeholder: "601 123 456" },
        { code: "+225", flag: "🇨🇮", name: "Côte d'Ivoire", placeholder: "07 12 34 56 78" },
        { code: "+45", flag: "🇩🇰", name: "Denmark", placeholder: "20 12 34 56" },
        { code: "+253", flag: "🇩🇯", name: "Djibouti", placeholder: "77 12 34 56" },
        { code: "+1767", flag: "🇩🇲", name: "Dominica", placeholder: "225 1234" },
        { code: "+1809", flag: "🇩🇴", name: "Dominican Republic", placeholder: "234 5678" },
        { code: "+593", flag: "🇪🇨", name: "Ecuador", placeholder: "99 123 4567" },
        { code: "+20", flag: "🇪🇬", name: "Egypt", placeholder: "10 1234 5678" },
        { code: "+503", flag: "🇸🇻", name: "El Salvador", placeholder: "7012 3456" },
        { code: "+240", flag: "🇬🇶", name: "Equatorial Guinea", placeholder: "222 123 456" },
        { code: "+291", flag: "🇪🇷", name: "Eritrea", placeholder: "7 123 456" },
        { code: "+372", flag: "🇪🇪", name: "Estonia", placeholder: "5123 4567" },
        { code: "+268", flag: "🇸🇿", name: "Eswatini", placeholder: "7612 3456" },
        { code: "+251", flag: "🇪🇹", name: "Ethiopia", placeholder: "91 123 4567" },
        { code: "+679", flag: "🇫🇯", name: "Fiji", placeholder: "701 2345" },
        { code: "+358", flag: "🇫🇮", name: "Finland", placeholder: "41 2345678" },
        { code: "+33", flag: "🇫🇷", name: "France", placeholder: "6 12 34 56 78" },
        { code: "+241", flag: "🇬🇦", name: "Gabon", placeholder: "06 12 34 56" },
        { code: "+220", flag: "🇬🇲", name: "Gambia", placeholder: "301 2345" },
        { code: "+995", flag: "🇬🇪", name: "Georgia", placeholder: "555 12 34 56" },
        { code: "+49", flag: "🇩🇪", name: "Germany", placeholder: "151 1234 5678" },
        { code: "+233", flag: "🇬🇭", name: "Ghana", placeholder: "24 123 4567" },
        { code: "+350", flag: "🇬🇮", name: "Gibraltar", placeholder: "5700 1234" },
        { code: "+30", flag: "🇬🇷", name: "Greece", placeholder: "691 234 5678" },
        { code: "+1473", flag: "🇬🇩", name: "Grenada", placeholder: "403 1234" },
        { code: "+502", flag: "🇬🇹", name: "Guatemala", placeholder: "5123 4567" },
        { code: "+224", flag: "🇬🇳", name: "Guinea", placeholder: "601 12 34 56" },
        { code: "+245", flag: "🇬🇼", name: "Guinea-Bissau", placeholder: "955 123 456" },
        { code: "+592", flag: "🇬🇾", name: "Guyana", placeholder: "609 1234" },
        { code: "+509", flag: "🇭🇹", name: "Haiti", placeholder: "34 12 3456" },
        { code: "+504", flag: "🇭🇳", name: "Honduras", placeholder: "9123 4567" },
        { code: "+852", flag: "🇭🇰", name: "Hong Kong", placeholder: "5123 4567" },
        { code: "+36", flag: "🇭🇺", name: "Hungary", placeholder: "20 123 4567" },
        { code: "+354", flag: "🇮🇸", name: "Iceland", placeholder: "611 1234" },
        { code: "+91", flag: "🇮🇳", name: "India", placeholder: "98765 43210" },
        { code: "+62", flag: "🇮🇩", name: "Indonesia", placeholder: "812 3456 7890" },
        { code: "+98", flag: "🇮🇷", name: "Iran", placeholder: "912 345 6789" },
        { code: "+964", flag: "🇮🇶", name: "Iraq", placeholder: "790 123 4567" },
        { code: "+353", flag: "🇮🇪", name: "Ireland", placeholder: "85 123 4567" },
        { code: "+972", flag: "🇮🇱", name: "Israel", placeholder: "50 123 4567" },
        { code: "+39", flag: "🇮🇹", name: "Italy", placeholder: "312 345 6789" },
        { code: "+1876", flag: "🇯🇲", name: "Jamaica", placeholder: "210 1234" },
        { code: "+81", flag: "🇯🇵", name: "Japan", placeholder: "90 1234 5678" },
        { code: "+962", flag: "🇯🇴", name: "Jordan", placeholder: "7 9012 3456" },
        { code: "+7", flag: "🇰🇿", name: "Kazakhstan", placeholder: "701 234 5678" },
        { code: "+254", flag: "🇰🇪", name: "Kenya", placeholder: "712 345678" },
        { code: "+686", flag: "🇰🇮", name: "Kiribati", placeholder: "72012345" },
        { code: "+965", flag: "🇰🇼", name: "Kuwait", placeholder: "5123 4567" },
        { code: "+996", flag: "🇰🇬", name: "Kyrgyzstan", placeholder: "700 123 456" },
        { code: "+856", flag: "🇱🇦", name: "Laos", placeholder: "20 12 345 678" },
        { code: "+371", flag: "🇱🇻", name: "Latvia", placeholder: "21 234 567" },
        { code: "+961", flag: "🇱🇧", name: "Lebanon", placeholder: "71 123 456" },
        { code: "+266", flag: "🇱🇸", name: "Lesotho", placeholder: "5012 3456" },
        { code: "+231", flag: "🇱🇷", name: "Liberia", placeholder: "770 123 456" },
        { code: "+218", flag: "🇱🇾", name: "Libya", placeholder: "91 234 5678" },
        { code: "+423", flag: "🇱🇮", name: "Liechtenstein", placeholder: "660 1234" },
        { code: "+370", flag: "🇱🇹", name: "Lithuania", placeholder: "612 34567" },
        { code: "+352", flag: "🇱🇺", name: "Luxembourg", placeholder: "628 123 456" },
        { code: "+853", flag: "🇲🇴", name: "Macau", placeholder: "6612 3456" },
        { code: "+261", flag: "🇲🇬", name: "Madagascar", placeholder: "32 12 345 67" },
        { code: "+265", flag: "🇲🇼", name: "Malawi", placeholder: "991 23 45 67" },
        { code: "+60", flag: "🇲🇾", name: "Malaysia", placeholder: "12 345 6789" },
        { code: "+960", flag: "🇲🇻", name: "Maldives", placeholder: "791 2345" },
        { code: "+223", flag: "🇲🇱", name: "Mali", placeholder: "70 12 34 56" },
        { code: "+356", flag: "🇲🇹", name: "Malta", placeholder: "9912 3456" },
        { code: "+692", flag: "🇲🇭", name: "Marshall Islands", placeholder: "235 1234" },
        { code: "+222", flag: "🇲🇷", name: "Mauritania", placeholder: "22 12 34 56" },
        { code: "+230", flag: "🇲🇺", name: "Mauritius", placeholder: "5251 2345" },
        { code: "+52", flag: "🇲🇽", name: "Mexico", placeholder: "55 1234 5678" },
        { code: "+691", flag: "🇫🇲", name: "Micronesia", placeholder: "350 1234" },
        { code: "+373", flag: "🇲🇩", name: "Moldova", placeholder: "621 12 345" },
        { code: "+377", flag: "🇲🇨", name: "Monaco", placeholder: "6 12 34 56 78" },
        { code: "+976", flag: "🇲🇳", name: "Mongolia", placeholder: "8812 3456" },
        { code: "+382", flag: "🇲🇪", name: "Montenegro", placeholder: "67 123 456" },
        { code: "+212", flag: "🇲🇦", name: "Morocco", placeholder: "612 345678" },
        { code: "+258", flag: "🇲🇿", name: "Mozambique", placeholder: "82 123 4567" },
        { code: "+95", flag: "🇲🇲", name: "Myanmar", placeholder: "9 123 4567" },
        { code: "+264", flag: "🇳🇦", name: "Namibia", placeholder: "81 123 4567" },
        { code: "+674", flag: "🇳🇷", name: "Nauru", placeholder: "555 1234" },
        { code: "+977", flag: "🇳🇵", name: "Nepal", placeholder: "984 1234567" },
        { code: "+31", flag: "🇳🇱", name: "Netherlands", placeholder: "6 12345678" },
        { code: "+64", flag: "🇳🇿", name: "New Zealand", placeholder: "21 123 4567" },
        { code: "+505", flag: "🇳🇮", name: "Nicaragua", placeholder: "8123 4567" },
        { code: "+227", flag: "🇳🇪", name: "Niger", placeholder: "93 12 34 56" },
        { code: "+234", flag: "🇳🇬", name: "Nigeria", placeholder: "803 123 4567" },
        { code: "+850", flag: "🇰🇵", name: "North Korea", placeholder: "191 234 5678" },
        { code: "+389", flag: "🇲🇰", name: "North Macedonia", placeholder: "72 123 456" },
        { code: "+47", flag: "🇳🇴", name: "Norway", placeholder: "406 12 345" },
        { code: "+968", flag: "🇴🇲", name: "Oman", placeholder: "9212 3456" },
        { code: "+92", flag: "🇵🇰", name: "Pakistan", placeholder: "300 1234567" },
        { code: "+680", flag: "🇵🇼", name: "Palau", placeholder: "620 1234" },
        { code: "+970", flag: "🇵🇸", name: "Palestine", placeholder: "59 123 4567" },
        { code: "+507", flag: "🇵🇦", name: "Panama", placeholder: "6123 4567" },
        { code: "+675", flag: "🇵🇬", name: "Papua New Guinea", placeholder: "7012 3456" },
        { code: "+595", flag: "🇵🇾", name: "Paraguay", placeholder: "961 123456" },
        { code: "+51", flag: "🇵🇪", name: "Peru", placeholder: "912 345 678" },
        { code: "+63", flag: "🇵🇭", name: "Philippines", placeholder: "917 123 4567" },
        { code: "+48", flag: "🇵🇱", name: "Poland", placeholder: "512 345 678" },
        { code: "+351", flag: "🇵🇹", name: "Portugal", placeholder: "912 345 678" },
        { code: "+1787", flag: "🇵🇷", name: "Puerto Rico", placeholder: "234 5678" },
        { code: "+974", flag: "🇶🇦", name: "Qatar", placeholder: "5512 3456" },
        { code: "+40", flag: "🇷🇴", name: "Romania", placeholder: "712 345 678" },
        { code: "+7", flag: "🇷🇺", name: "Russia", placeholder: "912 345 6789" },
        { code: "+250", flag: "🇷🇼", name: "Rwanda", placeholder: "78 123 4567" },
        { code: "+1869", flag: "🇰🇳", name: "Saint Kitts and Nevis", placeholder: "765 1234" },
        { code: "+1758", flag: "🇱🇨", name: "Saint Lucia", placeholder: "284 1234" },
        { code: "+1784", flag: "🇻🇨", name: "Saint Vincent", placeholder: "430 1234" },
        { code: "+685", flag: "🇼🇸", name: "Samoa", placeholder: "72 12345" },
        { code: "+378", flag: "🇸🇲", name: "San Marino", placeholder: "66 12 34 56" },
        { code: "+239", flag: "🇸🇹", name: "São Tomé and Príncipe", placeholder: "981 2345" },
        { code: "+966", flag: "🇸🇦", name: "Saudi Arabia", placeholder: "50 123 4567" },
        { code: "+221", flag: "🇸🇳", name: "Senegal", placeholder: "77 123 45 67" },
        { code: "+381", flag: "🇷🇸", name: "Serbia", placeholder: "60 123 4567" },
        { code: "+248", flag: "🇸🇨", name: "Seychelles", placeholder: "2 510 123" },
        { code: "+232", flag: "🇸🇱", name: "Sierra Leone", placeholder: "25 123456" },
        { code: "+65", flag: "🇸🇬", name: "Singapore", placeholder: "9123 4567" },
        { code: "+421", flag: "🇸🇰", name: "Slovakia", placeholder: "912 345 678" },
        { code: "+386", flag: "🇸🇮", name: "Slovenia", placeholder: "31 234 567" },
        { code: "+677", flag: "🇸🇧", name: "Solomon Islands", placeholder: "74 12345" },
        { code: "+252", flag: "🇸🇴", name: "Somalia", placeholder: "61 234 5678" },
        { code: "+27", flag: "🇿🇦", name: "South Africa", placeholder: "71 234 5678" },
        { code: "+82", flag: "🇰🇷", name: "South Korea", placeholder: "10 1234 5678" },
        { code: "+211", flag: "🇸🇸", name: "South Sudan", placeholder: "977 123 456" },
        { code: "+34", flag: "🇪🇸", name: "Spain", placeholder: "612 34 56 78" },
        { code: "+94", flag: "🇱🇰", name: "Sri Lanka", placeholder: "71 234 5678" },
        { code: "+249", flag: "🇸🇩", name: "Sudan", placeholder: "91 234 5678" },
        { code: "+597", flag: "🇸🇷", name: "Suriname", placeholder: "741 2345" },
        { code: "+46", flag: "🇸🇪", name: "Sweden", placeholder: "70 123 45 67" },
        { code: "+41", flag: "🇨🇭", name: "Switzerland", placeholder: "78 123 45 67" },
        { code: "+963", flag: "🇸🇾", name: "Syria", placeholder: "944 567 890" },
        { code: "+886", flag: "🇹🇼", name: "Taiwan", placeholder: "912 345 678" },
        { code: "+992", flag: "🇹🇯", name: "Tajikistan", placeholder: "93 123 4567" },
        { code: "+255", flag: "🇹🇿", name: "Tanzania", placeholder: "712 345 678" },
        { code: "+66", flag: "🇹🇭", name: "Thailand", placeholder: "81 234 5678" },
        { code: "+670", flag: "🇹🇱", name: "Timor-Leste", placeholder: "7712 3456" },
        { code: "+228", flag: "🇹🇬", name: "Togo", placeholder: "90 12 34 56" },
        { code: "+676", flag: "🇹🇴", name: "Tonga", placeholder: "77 12345" },
        { code: "+1868", flag: "🇹🇹", name: "Trinidad and Tobago", placeholder: "291 1234" },
        { code: "+216", flag: "🇹🇳", name: "Tunisia", placeholder: "20 123 456" },
        { code: "+90", flag: "🇹🇷", name: "Turkey", placeholder: "532 123 4567" },
        { code: "+993", flag: "🇹🇲", name: "Turkmenistan", placeholder: "66 123456" },
        { code: "+1649", flag: "🇹🇨", name: "Turks and Caicos", placeholder: "231 1234" },
        { code: "+688", flag: "🇹🇻", name: "Tuvalu", placeholder: "90 1234" },
        { code: "+256", flag: "🇺🇬", name: "Uganda", placeholder: "772 123456" },
        { code: "+380", flag: "🇺🇦", name: "Ukraine", placeholder: "50 123 4567" },
        { code: "+44", flag: "🇬🇧", name: "United Kingdom", placeholder: "7911 123456" },
        { code: "+1", flag: "🇺🇸", name: "United States", placeholder: "202 555 1234" },
        { code: "+598", flag: "🇺🇾", name: "Uruguay", placeholder: "94 123 456" },
        { code: "+998", flag: "🇺🇿", name: "Uzbekistan", placeholder: "90 123 4567" },
        { code: "+678", flag: "🇻🇺", name: "Vanuatu", placeholder: "54 12345" },
        { code: "+379", flag: "🇻🇦", name: "Vatican City", placeholder: "6 698 12345" },
        { code: "+58", flag: "🇻🇪", name: "Venezuela", placeholder: "412 123 4567" },
        { code: "+84", flag: "🇻🇳", name: "Vietnam", placeholder: "91 234 56 78" },
        { code: "+967", flag: "🇾🇪", name: "Yemen", placeholder: "712 345 678" },
        { code: "+260", flag: "🇿🇲", name: "Zambia", placeholder: "95 5123456" },
        { code: "+263", flag: "🇿🇼", name: "Zimbabwe", placeholder: "71 234 5678" }
    ];

    let selectedCountry = countries[0]; // UAE default
    let countryPickerOpen = false;

    // Initialize country picker
    function initCountryPicker() {
        renderCountryList(countries);
    }

    // Toggle country picker dropdown
    function toggleCountryPicker() {
        countryPickerOpen = !countryPickerOpen;
        const dropdown = document.getElementById('countryPickerDropdown');
        const trigger = document.getElementById('countryPickerTrigger');

        if (countryPickerOpen) {
            dropdown.classList.add('open');
            trigger.classList.add('active');
            document.getElementById('countrySearch').focus();
            document.getElementById('countrySearch').value = '';
            renderCountryList(countries);
        } else {
            dropdown.classList.remove('open');
            trigger.classList.remove('active');
        }
    }

    // Close picker when clicking outside
    document.addEventListener('click', function (e) {
        const picker = document.getElementById('countryPicker');
        if (picker && !picker.contains(e.target) && countryPickerOpen) {
            toggleCountryPicker();
        }
    });

    // Filter countries based on search
    function filterCountries(query) {
        const filtered = countries.filter(c =>
            c.name.toLowerCase().includes(query.toLowerCase()) ||
            c.code.includes(query)
        );
        renderCountryList(filtered);
    }

    // Render country list
    function renderCountryList(countryList) {
        const listEl = document.getElementById('countryList');

        if (countryList.length === 0) {
            listEl.innerHTML = '<div class="no-results">No countries found</div>';
            return;
        }

        listEl.innerHTML = countryList.map(c => `
                <div class="country-option ${c.code === selectedCountry.code ? 'selected' : ''}" 
                     onclick="selectCountry('${c.code}')">
                    <span class="flag">${c.flag}</span>
                    <span class="name">${c.name}</span>
                    <span class="dial-code">${c.code}</span>
                </div>
            `).join('');
    }

    // Select a country
    function selectCountry(code) {
        selectedCountry = countries.find(c => c.code === code);

        // Update display
        document.getElementById('selectedFlag').textContent = selectedCountry.flag;
        document.getElementById('selectedCode').textContent = selectedCountry.code;
        document.getElementById('countryCode').value = selectedCountry.code;
        document.getElementById('whatsapp').placeholder = selectedCountry.placeholder;

        // Close dropdown
        toggleCountryPicker();
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', initCountryPicker);

    // Business type placeholder color handling
    const businessTypeSelect = document.getElementById('businessType');
    businessTypeSelect.classList.add('placeholder');
    businessTypeSelect.addEventListener('change', function () {
        if (this.value === '') {
            this.classList.add('placeholder');
        } else {
            this.classList.remove('placeholder');
        }
    });

    // Change language function
    function changeLanguage(lang) {
        currentLang = lang;
        const t = translations[lang] || translations['en']; // Fallback to English
        const isRTL = ['ar', 'fa', 'he', 'ur', 'ps'].includes(lang);

        // Set document direction
        document.documentElement.dir = isRTL ? 'rtl' : 'ltr';

        // Update all text elements
        document.getElementById('formTitle').textContent = t.formTitle;
        document.getElementById('formSubtitle').textContent = t.formSubtitle;
        document.getElementById('bulkNotice').textContent = t.bulkNotice;

        document.querySelector('label[for="name"]').textContent = t.name;
        document.getElementById('name').placeholder = t.namePlaceholder;

        document.querySelector('label[for="businessName"]').textContent = t.businessName || 'Business Name';
        document.getElementById('businessName').placeholder = t.businessNamePlaceholder || 'Your business name';

        document.querySelector('label[for="businessType"]').innerHTML = t.business + ' <span class="optional-label">' + t.businessOptional + '</span>';
        // Update business type dropdown options
        const businessSelect = document.getElementById('businessType');
        businessSelect.options[0].text = t.businessPlaceholder;
        if (t.businessTypes) {
            businessSelect.options[1].text = t.businessTypes.regionalDistributor || 'Regional Distributor';
            businessSelect.options[2].text = t.businessTypes.childrensClothingStore || "Children's Clothing Store";
            businessSelect.options[3].text = t.businessTypes.departmentStore || 'Department Store';
            businessSelect.options[4].text = t.businessTypes.independentRetailer || 'Independent Retailer';
            businessSelect.options[5].text = t.businessTypes.onlineSeller || 'Online Seller';
        }

        document.querySelector('label[for="whatsapp"]').textContent = t.whatsapp;
        document.getElementById('whatsapp').placeholder = t.whatsappPlaceholder;

        document.querySelector('.divider span').textContent = t.productInterest;
        document.querySelector('.section-hint').textContent = t.selectAll;

        // Message placeholder
        document.getElementById('message').placeholder = t.messagePlaceholder;

        // Gender
        const genderLabel = document.querySelector('#genderGroup').parentElement.querySelector('.group-label');
        genderLabel.innerHTML = t.gender + ' <span class="selection-count" id="genderCount"></span>';
        document.querySelector('label[for="gender-boy"]').textContent = t.boy;
        document.querySelector('label[for="gender-girl"]').textContent = t.girl;

        // Age Range
        const ageLabel = document.querySelector('#ageGroup').parentElement.querySelector('.group-label');
        ageLabel.innerHTML = t.ageRange + ' <span class="selection-count" id="ageCount"></span>';

        // Age range labels
        document.querySelector('label[for="age-baby"]').textContent = t.ageBaby || '0-3Y';
        document.querySelector('label[for="age-toddlers"]').textContent = t.ageToddlers || '2-6Y';
        document.querySelector('label[for="age-kids"]').textContent = t.ageKids || '6-14Y';

        // Product Type label
        document.getElementById('productTypeLabel').innerHTML = (t.productType || 'Product Type') + ' <span class="optional-label">' + (t.businessOptional || '(Optional)') + '</span>';

        // Update placeholder
        updatePlaceholderText();

        // Submit button
        document.getElementById('submitBtn').textContent = t.submit;

        // Success message
        document.querySelector('.success-message h2').textContent = t.successTitle;
        document.querySelector('.success-message p').innerHTML = t.successText + '<br><a href="#" id="whatsappLink" target="_blank">' + t.successLink + '</a>';

        // Footer
        document.querySelector('footer p').innerHTML = t.footer + ' · <a href="https://marhabafashion.com">marhabafashion.com</a>';

        // Country search placeholder
        if (document.getElementById('countrySearch')) {
            document.getElementById('countrySearch').placeholder = t.searchCountry || 'Search country...';
        }

        // Update counts
        updateGenderCount();
        updateAgeCount();
    }

    // Update placeholder with current language
    function updatePlaceholderText() {
        const t = translations[currentLang] || translations['en'];
        if (productTrigger.classList.contains('disabled')) {
            if (availableProducts.length === 0 && getSelectedValues('gender').length > 0 && getSelectedValues('age').length > 0) {
                productPlaceholder.textContent = t.noProducts;
            } else {
                productPlaceholder.textContent = t.selectGenderAge;
            }
        } else if (selectedProducts.length === 0) {
            productPlaceholder.textContent = t.selectProducts;
        } else if (selectedProducts.length === 1) {
            productPlaceholder.textContent = getProductName(selectedProducts[0]);
        } else {
            productPlaceholder.textContent = selectedProducts.length + ' ' + t.productsSelected;
        }
    }

    // Product Data
    const productData = {
        boy: {
            baby: ["Bodysuit Sets", "Bodysuits", "Co-ord Sets", "Dungaree Sets", "Loungewear Sets", "Pyjama Sets", "Rompers & Sleepsuits", "Shirt & Shorts Sets", "Shirts", "Trousers & Jeans", "Tshirt & Shorts Sets"],
            toddlers: ["Co-ord Sets", "Loungewear Sets", "Pyjama Sets", "Shirt & Shorts Sets", "Shirts", "Shorts & Bermudas", "Trousers & Jeans", "Tshirt & Shorts Sets"],
            kids: ["Co-ord Sets", "Loungewear Sets", "Shirt & Shorts Sets", "Shirts", "Shorts & Bermudas", "Trousers & Jeans", "Tshirt & Shorts Sets"]
        },
        girl: {
            baby: ["Bodysuit Sets", "Bodysuits", "Dungaree Sets", "Frock 2pc Sets", "Frocks & Dresses", "Loungewear Sets", "Pyjama Sets", "Rompers & Sleepsuits", "Shirt & Shorts Sets", "Top & Leggings Sets", "Top & Shorts Sets"],
            toddlers: ["Co-ord Sets", "Frocks & Dresses", "Leggings", "Loungewear Sets", "Palazzo Sets", "Pyjama Sets", "Top & Leggings Sets", "Top & Shorts Sets"],
            kids: ["Frocks & Dresses", "Leggings", "Palazzo Sets"]
        }
    };

    // Product Translations for 26 languages
    const productTranslations = {
        en: {
            "Bodysuit Sets": "Bodysuit Sets", "Bodysuits": "Bodysuits", "Co-ord Sets": "Co-ord Sets", "Dungaree Sets": "Dungaree Sets", "Loungewear Sets": "Loungewear Sets", "Pyjama Sets": "Pyjama Sets", "Rompers & Sleepsuits": "Rompers & Sleepsuits", "Shirt & Shorts Sets": "Shirt & Shorts Sets", "Shirts": "Shirts", "Trousers & Jeans": "Trousers & Jeans", "Tshirt & Shorts Sets": "Tshirt & Shorts Sets", "Shorts & Bermudas": "Shorts & Bermudas", "Frock 2pc Sets": "Frock 2pc Sets", "Frocks & Dresses": "Frocks & Dresses", "Top & Leggings Sets": "Top & Leggings Sets", "Top & Shorts Sets": "Top & Shorts Sets", "Leggings": "Leggings", "Palazzo Sets": "Palazzo Sets"
        },
        ar: {
            "Bodysuit Sets": "أطقم بودي سوت", "Bodysuits": "بودي سوت", "Co-ord Sets": "أطقم متناسقة", "Dungaree Sets": "أطقم سالوبيت", "Loungewear Sets": "أطقم ملابس منزلية", "Pyjama Sets": "أطقم بيجاما", "Rompers & Sleepsuits": "رومبر وملابس نوم", "Shirt & Shorts Sets": "أطقم قميص وشورت", "Shirts": "قمصان", "Trousers & Jeans": "بناطيل وجينز", "Tshirt & Shorts Sets": "أطقم تيشيرت وشورت", "Shorts & Bermudas": "شورتات وبرمودا", "Frock 2pc Sets": "أطقم فستان قطعتين", "Frocks & Dresses": "فساتين", "Top & Leggings Sets": "أطقم بلوزة وليقنز", "Top & Shorts Sets": "أطقم بلوزة وشورت", "Leggings": "ليقنز", "Palazzo Sets": "أطقم بلازو"
        },
        fa: {
            "Bodysuit Sets": "ست بادی سوت", "Bodysuits": "بادی سوت", "Co-ord Sets": "ست هماهنگ", "Dungaree Sets": "ست سرهمی", "Loungewear Sets": "ست لباس راحتی", "Pyjama Sets": "ست پیژامه", "Rompers & Sleepsuits": "رامپر و لباس خواب", "Shirt & Shorts Sets": "ست پیراهن و شلوارک", "Shirts": "پیراهن", "Trousers & Jeans": "شلوار و جین", "Tshirt & Shorts Sets": "ست تیشرت و شلوارک", "Shorts & Bermudas": "شلوارک و برمودا", "Frock 2pc Sets": "ست لباس دو تکه", "Frocks & Dresses": "پیراهن و لباس", "Top & Leggings Sets": "ست بلوز و ساپورت", "Top & Shorts Sets": "ست بلوز و شلوارک", "Leggings": "ساپورت", "Palazzo Sets": "ست پالازو"
        },
        fr: {
            "Bodysuit Sets": "Ensembles Body", "Bodysuits": "Bodies", "Co-ord Sets": "Ensembles Coordonnés", "Dungaree Sets": "Ensembles Salopette", "Loungewear Sets": "Ensembles Détente", "Pyjama Sets": "Ensembles Pyjama", "Rompers & Sleepsuits": "Barboteuses et Grenouillères", "Shirt & Shorts Sets": "Ensembles Chemise et Short", "Shirts": "Chemises", "Trousers & Jeans": "Pantalons et Jeans", "Tshirt & Shorts Sets": "Ensembles T-shirt et Short", "Shorts & Bermudas": "Shorts et Bermudas", "Frock 2pc Sets": "Ensembles Robe 2 pièces", "Frocks & Dresses": "Robes", "Top & Leggings Sets": "Ensembles Haut et Leggings", "Top & Shorts Sets": "Ensembles Haut et Short", "Leggings": "Leggings", "Palazzo Sets": "Ensembles Palazzo"
        },
        ru: {
            "Bodysuit Sets": "Комплекты боди", "Bodysuits": "Боди", "Co-ord Sets": "Комплекты", "Dungaree Sets": "Комплекты комбинезонов", "Loungewear Sets": "Домашние комплекты", "Pyjama Sets": "Пижамные комплекты", "Rompers & Sleepsuits": "Ромперы и слипы", "Shirt & Shorts Sets": "Комплекты рубашка+шорты", "Shirts": "Рубашки", "Trousers & Jeans": "Брюки и джинсы", "Tshirt & Shorts Sets": "Комплекты футболка+шорты", "Shorts & Bermudas": "Шорты и бермуды", "Frock 2pc Sets": "Платья из 2 частей", "Frocks & Dresses": "Платья", "Top & Leggings Sets": "Комплекты топ+леггинсы", "Top & Shorts Sets": "Комплекты топ+шорты", "Leggings": "Леггинсы", "Palazzo Sets": "Комплекты палаццо"
        },
        es: {
            "Bodysuit Sets": "Conjuntos de Body", "Bodysuits": "Bodies", "Co-ord Sets": "Conjuntos Coordinados", "Dungaree Sets": "Conjuntos de Peto", "Loungewear Sets": "Conjuntos de Ropa Cómoda", "Pyjama Sets": "Conjuntos de Pijama", "Rompers & Sleepsuits": "Peleles y Pijamas Enteros", "Shirt & Shorts Sets": "Conjuntos Camisa y Pantalón Corto", "Shirts": "Camisas", "Trousers & Jeans": "Pantalones y Vaqueros", "Tshirt & Shorts Sets": "Conjuntos Camiseta y Pantalón Corto", "Shorts & Bermudas": "Pantalones Cortos y Bermudas", "Frock 2pc Sets": "Conjuntos Vestido 2 Piezas", "Frocks & Dresses": "Vestidos", "Top & Leggings Sets": "Conjuntos Top y Leggings", "Top & Shorts Sets": "Conjuntos Top y Pantalón Corto", "Leggings": "Leggings", "Palazzo Sets": "Conjuntos Palazzo"
        },
        sw: {
            "Bodysuit Sets": "Seti za Bodysuit", "Bodysuits": "Bodysuit", "Co-ord Sets": "Seti Zinazolingana", "Dungaree Sets": "Seti za Dungaree", "Loungewear Sets": "Seti za Nguo za Nyumbani", "Pyjama Sets": "Seti za Pijama", "Rompers & Sleepsuits": "Rompa na Nguo za Kulala", "Shirt & Shorts Sets": "Seti za Shati na Suruali Fupi", "Shirts": "Mashati", "Trousers & Jeans": "Suruali na Jinsi", "Tshirt & Shorts Sets": "Seti za Fulana na Suruali Fupi", "Shorts & Bermudas": "Suruali Fupi na Bermuda", "Frock 2pc Sets": "Seti za Gauni Vipande 2", "Frocks & Dresses": "Mavazi", "Top & Leggings Sets": "Seti za Juu na Leginzi", "Top & Shorts Sets": "Seti za Juu na Suruali Fupi", "Leggings": "Leginzi", "Palazzo Sets": "Seti za Palazzo"
        },
        af: {
            "Bodysuit Sets": "Lyfpakstelle", "Bodysuits": "Lyfpakke", "Co-ord Sets": "Gekoördineerde Stelle", "Dungaree Sets": "Oorpakstelle", "Loungewear Sets": "Ontspankleresterlie", "Pyjama Sets": "Pajamastelle", "Rompers & Sleepsuits": "Rompertjies en Slaappakke", "Shirt & Shorts Sets": "Hemp en Kortbroekstelle", "Shirts": "Hemde", "Trousers & Jeans": "Broeke en Jeans", "Tshirt & Shorts Sets": "T-hemp en Kortbroekstelle", "Shorts & Bermudas": "Kortbroeke en Bermudas", "Frock 2pc Sets": "Rok 2-stuk Stelle", "Frocks & Dresses": "Rokke", "Top & Leggings Sets": "Bostuk en Leggingstelle", "Top & Shorts Sets": "Bostuk en Kortbroekstelle", "Leggings": "Leggings", "Palazzo Sets": "Palazzostelle"
        },
        sq: {
            "Bodysuit Sets": "Sete Kostumi Trupi", "Bodysuits": "Kostume Trupi", "Co-ord Sets": "Sete të Koordinuara", "Dungaree Sets": "Sete Kombinezonash", "Loungewear Sets": "Sete Veshje Shtëpie", "Pyjama Sets": "Sete Pizhame", "Rompers & Sleepsuits": "Romper dhe Kostume Gjumi", "Shirt & Shorts Sets": "Sete Këmishë dhe Pantallona të Shkurtra", "Shirts": "Këmisha", "Trousers & Jeans": "Pantallona dhe Xhinse", "Tshirt & Shorts Sets": "Sete Bluzë dhe Pantallona të Shkurtra", "Shorts & Bermudas": "Pantallona të Shkurtra dhe Bermuda", "Frock 2pc Sets": "Sete Fustanesh 2 Pjesë", "Frocks & Dresses": "Fustane", "Top & Leggings Sets": "Sete Bluzë dhe Tajice", "Top & Shorts Sets": "Sete Bluzë dhe Pantallona të Shkurtra", "Leggings": "Tajice", "Palazzo Sets": "Sete Palazzo"
        },
        am: {
            "Bodysuit Sets": "የቦዲሱት ስብስቦች", "Bodysuits": "ቦዲሱቶች", "Co-ord Sets": "ተመሳሳይ ስብስቦች", "Dungaree Sets": "የዳንጋሪ ስብስቦች", "Loungewear Sets": "የቤት ልብስ ስብስቦች", "Pyjama Sets": "የፒጃማ ስብስቦች", "Rompers & Sleepsuits": "ሮምፐሮች እና የእንቅልፍ ልብሶች", "Shirt & Shorts Sets": "ሸሚዝ እና ሾርት ስብስቦች", "Shirts": "ሸሚዞች", "Trousers & Jeans": "ሱሪዎች እና ጂንሶች", "Tshirt & Shorts Sets": "ቲሸርት እና ሾርት ስብስቦች", "Shorts & Bermudas": "ሾርቶች እና በርሙዳዎች", "Frock 2pc Sets": "የቀሚስ 2 ቁራጭ ስብስቦች", "Frocks & Dresses": "ቀሚሶች", "Top & Leggings Sets": "የላይኛው እና ሌጊንግስ ስብስቦች", "Top & Shorts Sets": "የላይኛው እና ሾርት ስብስቦች", "Leggings": "ሌጊንግስ", "Palazzo Sets": "ፓላዞ ስብስቦች"
        },
        hy: {
            "Bodysuit Sets": "Բdelays Սdelays", "Bodysuits": "Delays", "Co-ord Sets": "Հdelays Սdelays", "Dungaree Sets": "Дdelays Сdelays", "Loungewear Sets": "Տdelays Սdelays", "Pyjama Sets": "Գdelays Սdelays", "Rompers & Sleepsuits": "Delays & Delays", "Shirt & Shorts Sets": "Delays & Delays", "Shirts": "Delays", "Trousers & Jeans": "Delays & Delays", "Tshirt & Shorts Sets": "Delays & Delays", "Shorts & Bermudas": "Delays & Delays", "Frock 2pc Sets": "Delays 2 Delays", "Frocks & Dresses": "Delays", "Top & Leggings Sets": "Delays & Delays", "Top & Shorts Sets": "Delays & Delays", "Leggings": "Delays", "Palazzo Sets": "Delays Delays"
        },
        az: {
            "Bodysuit Sets": "Bodi Dəstləri", "Bodysuits": "Bodilər", "Co-ord Sets": "Uyğun Dəstlər", "Dungaree Sets": "Kombinezon Dəstləri", "Loungewear Sets": "Ev Geyimi Dəstləri", "Pyjama Sets": "Pijama Dəstləri", "Rompers & Sleepsuits": "Tulumlar və Yuxu Paltarları", "Shirt & Shorts Sets": "Köynək və Şort Dəstləri", "Shirts": "Köynəklər", "Trousers & Jeans": "Şalvarlar və Cinslər", "Tshirt & Shorts Sets": "Futbolka və Şort Dəstləri", "Shorts & Bermudas": "Şortlar və Bermudalar", "Frock 2pc Sets": "Don 2 Parça Dəstlər", "Frocks & Dresses": "Donlar", "Top & Leggings Sets": "Üst və Tayt Dəstləri", "Top & Shorts Sets": "Üst və Şort Dəstləri", "Leggings": "Taytlar", "Palazzo Sets": "Palazzo Dəstləri"
        },
        gu: {
            "Bodysuit Sets": "બોડીસૂટ સેટ", "Bodysuits": "બોડીસૂટ", "Co-ord Sets": "કો-ઓર્ડ સેટ", "Dungaree Sets": "ડંગરી સેટ", "Loungewear Sets": "લાઉન્જવેર સેટ", "Pyjama Sets": "પાયજામા સેટ", "Rompers & Sleepsuits": "રોમ્પર અને સ્લીપસૂટ", "Shirt & Shorts Sets": "શર્ટ અને શોર્ટ્સ સેટ", "Shirts": "શર્ટ", "Trousers & Jeans": "ટ્રાઉઝર અને જીન્સ", "Tshirt & Shorts Sets": "ટીશર્ટ અને શોર્ટ્સ સેટ", "Shorts & Bermudas": "શોર્ટ્સ અને બર્મુડા", "Frock 2pc Sets": "ફ્રોક 2 પીસ સેટ", "Frocks & Dresses": "ફ્રોક અને ડ્રેસ", "Top & Leggings Sets": "ટોપ અને લેગિંગ્સ સેટ", "Top & Shorts Sets": "ટોપ અને શોર્ટ્સ સેટ", "Leggings": "લેગિંગ્સ", "Palazzo Sets": "પલાઝો સેટ"
        },
        ha: {
            "Bodysuit Sets": "Saitin Bodysuit", "Bodysuits": "Bodysuit", "Co-ord Sets": "Saitin Daidaita", "Dungaree Sets": "Saitin Dungaree", "Loungewear Sets": "Saitin Kayan Hutu", "Pyjama Sets": "Saitin Pajama", "Rompers & Sleepsuits": "Rompa da Kayan Barci", "Shirt & Shorts Sets": "Saitin Riga da Wando Gajere", "Shirts": "Riguna", "Trousers & Jeans": "Wanduna da Jinsi", "Tshirt & Shorts Sets": "Saitin Tshirt da Wando Gajere", "Shorts & Bermudas": "Wanduna Gajere da Bermuda", "Frock 2pc Sets": "Saitin Riga Guda 2", "Frocks & Dresses": "Riguna", "Top & Leggings Sets": "Saitin Sama da Leggings", "Top & Shorts Sets": "Saitin Sama da Wando Gajere", "Leggings": "Leggings", "Palazzo Sets": "Saitin Palazzo"
        },
        hi: {
            "Bodysuit Sets": "बॉडीसूट सेट", "Bodysuits": "बॉडीसूट", "Co-ord Sets": "को-ऑर्ड सेट", "Dungaree Sets": "डंगरी सेट", "Loungewear Sets": "लाउंजवियर सेट", "Pyjama Sets": "पायजामा सेट", "Rompers & Sleepsuits": "रोम्पर और स्लीपसूट", "Shirt & Shorts Sets": "शर्ट और शॉर्ट्स सेट", "Shirts": "शर्ट", "Trousers & Jeans": "ट्राउजर और जींस", "Tshirt & Shorts Sets": "टीशर्ट और शॉर्ट्स सेट", "Shorts & Bermudas": "शॉर्ट्स और बरमूडा", "Frock 2pc Sets": "फ्रॉक 2 पीस सेट", "Frocks & Dresses": "फ्रॉक और ड्रेस", "Top & Leggings Sets": "टॉप और लेगिंग्स सेट", "Top & Shorts Sets": "टॉप और शॉर्ट्स सेट", "Leggings": "लेगिंग्स", "Palazzo Sets": "पलाज़ो सेट"
        },
        kk: {
            "Bodysuit Sets": "Боди жиынтықтары", "Bodysuits": "Бодилер", "Co-ord Sets": "Сәйкес жиынтықтар", "Dungaree Sets": "Комбинезон жиынтықтары", "Loungewear Sets": "Үй киімі жиынтықтары", "Pyjama Sets": "Пижама жиынтықтары", "Rompers & Sleepsuits": "Ромперлер мен ұйқы киімдері", "Shirt & Shorts Sets": "Жейде мен шорт жиынтықтары", "Shirts": "Жейделер", "Trousers & Jeans": "Шалбарлар мен джинсы", "Tshirt & Shorts Sets": "Футболка мен шорт жиынтықтары", "Shorts & Bermudas": "Шорттар мен бермудалар", "Frock 2pc Sets": "Көйлек 2 бөлік жиынтықтары", "Frocks & Dresses": "Көйлектер", "Top & Leggings Sets": "Үстіңгі және лосиндер жиынтықтары", "Top & Shorts Sets": "Үстіңгі мен шорт жиынтықтары", "Leggings": "Лосиндер", "Palazzo Sets": "Палаццо жиынтықтары"
        },
        ku: {
            "Bodysuit Sets": "Setên Bodysuit", "Bodysuits": "Bodysuit", "Co-ord Sets": "Setên Hevaheng", "Dungaree Sets": "Setên Dungaree", "Loungewear Sets": "Setên Cilên Malê", "Pyjama Sets": "Setên Pîjama", "Rompers & Sleepsuits": "Romper û Cilên Xewê", "Shirt & Shorts Sets": "Setên Kiras û Pantolên Kurt", "Shirts": "Kiras", "Trousers & Jeans": "Pantol û Cins", "Tshirt & Shorts Sets": "Setên Tshirt û Pantolên Kurt", "Shorts & Bermudas": "Pantolên Kurt û Bermuda", "Frock 2pc Sets": "Setên Cilê 2 Perçe", "Frocks & Dresses": "Cil", "Top & Leggings Sets": "Setên Jorîn û Legîn", "Top & Shorts Sets": "Setên Jorîn û Pantolên Kurt", "Leggings": "Legîn", "Palazzo Sets": "Setên Palazzo"
        },
        mn: {
            "Bodysuit Sets": "Бодисүйт багц", "Bodysuits": "Бодисүйт", "Co-ord Sets": "Иж бүрдэл", "Dungaree Sets": "Комбинезон багц", "Loungewear Sets": "Гэрийн хувцас багц", "Pyjama Sets": "Пижама багц", "Rompers & Sleepsuits": "Ромпер ба унтлагын хувцас", "Shirt & Shorts Sets": "Цамц ба богино өмд багц", "Shirts": "Цамц", "Trousers & Jeans": "Өмд ба жинс", "Tshirt & Shorts Sets": "Футболк ба богино өмд багц", "Shorts & Bermudas": "Богино өмд ба бермуда", "Frock 2pc Sets": "Даашинз 2 хэсэг багц", "Frocks & Dresses": "Даашинз", "Top & Leggings Sets": "Топ ба леггинс багц", "Top & Shorts Sets": "Топ ба богино өмд багц", "Leggings": "Леггинс", "Palazzo Sets": "Палаццо багц"
        },
        ps: {
            "Bodysuit Sets": "د بډي سوټ سیټونه", "Bodysuits": "بډي سوټ", "Co-ord Sets": "مساوي سیټونه", "Dungaree Sets": "د ډنګري سیټونه", "Loungewear Sets": "د کور جامو سیټونه", "Pyjama Sets": "د پاجامې سیټونه", "Rompers & Sleepsuits": "رومپر او د خوب جامې", "Shirt & Shorts Sets": "بوش او نیکر سیټونه", "Shirts": "بوش", "Trousers & Jeans": "پتلون او جینز", "Tshirt & Shorts Sets": "ټي شرټ او نیکر سیټونه", "Shorts & Bermudas": "نیکر او برمودا", "Frock 2pc Sets": "کمیس 2 ټوټه سیټونه", "Frocks & Dresses": "کمیسونه", "Top & Leggings Sets": "پورتنۍ او لیګنګز سیټونه", "Top & Shorts Sets": "پورتنۍ او نیکر سیټونه", "Leggings": "لیګنګز", "Palazzo Sets": "پلازو سیټونه"
        },
        pt: {
            "Bodysuit Sets": "Conjuntos de Body", "Bodysuits": "Bodies", "Co-ord Sets": "Conjuntos Coordenados", "Dungaree Sets": "Conjuntos de Jardineira", "Loungewear Sets": "Conjuntos de Roupa Confortável", "Pyjama Sets": "Conjuntos de Pijama", "Rompers & Sleepsuits": "Macacões e Pijamas Inteiros", "Shirt & Shorts Sets": "Conjuntos Camisa e Calção", "Shirts": "Camisas", "Trousers & Jeans": "Calças e Jeans", "Tshirt & Shorts Sets": "Conjuntos Camiseta e Calção", "Shorts & Bermudas": "Calções e Bermudas", "Frock 2pc Sets": "Conjuntos Vestido 2 Peças", "Frocks & Dresses": "Vestidos", "Top & Leggings Sets": "Conjuntos Blusa e Leggings", "Top & Shorts Sets": "Conjuntos Blusa e Calção", "Leggings": "Leggings", "Palazzo Sets": "Conjuntos Palazzo"
        },
        so: {
            "Bodysuit Sets": "Setiyada Bodysuit", "Bodysuits": "Bodysuit", "Co-ord Sets": "Setiyada Isku Eg", "Dungaree Sets": "Setiyada Dungaree", "Loungewear Sets": "Setiyada Dharka Guriga", "Pyjama Sets": "Setiyada Bijaamo", "Rompers & Sleepsuits": "Romper iyo Dharka Hurdo", "Shirt & Shorts Sets": "Setiyada Shaadh iyo Surwaal Gaab", "Shirts": "Shaadh", "Trousers & Jeans": "Surwaal iyo Jiin", "Tshirt & Shorts Sets": "Setiyada Funaanado iyo Surwaal Gaab", "Shorts & Bermudas": "Surwaal Gaab iyo Bermuda", "Frock 2pc Sets": "Setiyada Dharaar 2 Qayb", "Frocks & Dresses": "Dharaar", "Top & Leggings Sets": "Setiyada Koor iyo Leegings", "Top & Shorts Sets": "Setiyada Koor iyo Surwaal Gaab", "Leggings": "Leegings", "Palazzo Sets": "Setiyada Palazzo"
        },
        tr: {
            "Bodysuit Sets": "Badi Setleri", "Bodysuits": "Badiler", "Co-ord Sets": "Takım Setleri", "Dungaree Sets": "Salopet Setleri", "Loungewear Sets": "Ev Giyim Setleri", "Pyjama Sets": "Pijama Setleri", "Rompers & Sleepsuits": "Tulumlar ve Uyku Tulumları", "Shirt & Shorts Sets": "Gömlek ve Şort Setleri", "Shirts": "Gömlekler", "Trousers & Jeans": "Pantolonlar ve Kotlar", "Tshirt & Shorts Sets": "Tişört ve Şort Setleri", "Shorts & Bermudas": "Şortlar ve Bermudalar", "Frock 2pc Sets": "Elbise 2 Parça Setler", "Frocks & Dresses": "Elbiseler", "Top & Leggings Sets": "Üst ve Tayt Setleri", "Top & Shorts Sets": "Üst ve Şort Setleri", "Leggings": "Taytlar", "Palazzo Sets": "Palazzo Setleri"
        },
        ur: {
            "Bodysuit Sets": "باڈی سوٹ سیٹ", "Bodysuits": "باڈی سوٹ", "Co-ord Sets": "میچنگ سیٹ", "Dungaree Sets": "ڈنگری سیٹ", "Loungewear Sets": "گھریلو لباس سیٹ", "Pyjama Sets": "پاجامہ سیٹ", "Rompers & Sleepsuits": "رومپر اور نیند کے کپڑے", "Shirt & Shorts Sets": "قمیض اور شارٹس سیٹ", "Shirts": "قمیصیں", "Trousers & Jeans": "پتلون اور جینز", "Tshirt & Shorts Sets": "ٹی شرٹ اور شارٹس سیٹ", "Shorts & Bermudas": "شارٹس اور برمودا", "Frock 2pc Sets": "فراک 2 پیس سیٹ", "Frocks & Dresses": "فراک", "Top & Leggings Sets": "ٹاپ اور لیگنگز سیٹ", "Top & Shorts Sets": "ٹاپ اور شارٹس سیٹ", "Leggings": "لیگنگز", "Palazzo Sets": "پلازو سیٹ"
        },
        uz: {
            "Bodysuit Sets": "Bodisyut to'plamlari", "Bodysuits": "Bodisyutlar", "Co-ord Sets": "Mos to'plamlar", "Dungaree Sets": "Kombinezon to'plamlari", "Loungewear Sets": "Uy kiyimi to'plamlari", "Pyjama Sets": "Pijama to'plamlari", "Rompers & Sleepsuits": "Romperlar va uyqu kiyimlari", "Shirt & Shorts Sets": "Ko'ylak va shim to'plamlari", "Shirts": "Ko'ylaklar", "Trousers & Jeans": "Shimlar va djinslar", "Tshirt & Shorts Sets": "Futbolka va shim to'plamlari", "Shorts & Bermudas": "Shimlar va bermudalar", "Frock 2pc Sets": "Ko'ylak 2 qism to'plamlari", "Frocks & Dresses": "Ko'ylaklar", "Top & Leggings Sets": "Ustki va legins to'plamlari", "Top & Shorts Sets": "Ustki va shim to'plamlari", "Leggings": "Leginslar", "Palazzo Sets": "Palazzo to'plamlari"
        },
        yo: {
            "Bodysuit Sets": "Àwọn Ẹ̀rọ Aṣọ Ara", "Bodysuits": "Aṣọ Ara", "Co-ord Sets": "Àwọn Ẹ̀rọ Tó Bára Mu", "Dungaree Sets": "Àwọn Ẹ̀rọ Dungaree", "Loungewear Sets": "Àwọn Ẹ̀rọ Aṣọ Ilé", "Pyjama Sets": "Àwọn Ẹ̀rọ Pajama", "Rompers & Sleepsuits": "Rompa àti Aṣọ Oorun", "Shirt & Shorts Sets": "Àwọn Ẹ̀rọ Ṣẹẹti àti Sokoto Kúrú", "Shirts": "Àwọn Ṣẹẹti", "Trousers & Jeans": "Sokoto àti Jínì", "Tshirt & Shorts Sets": "Àwọn Ẹ̀rọ T-ṣẹẹti àti Sokoto Kúrú", "Shorts & Bermudas": "Sokoto Kúrú àti Bermuda", "Frock 2pc Sets": "Àwọn Ẹ̀rọ Aṣọ Mẹ́ta 2", "Frocks & Dresses": "Àwọn Aṣọ", "Top & Leggings Sets": "Àwọn Ẹ̀rọ Oke àti Leggings", "Top & Shorts Sets": "Àwọn Ẹ̀rọ Oke àti Sokoto Kúrú", "Leggings": "Leggings", "Palazzo Sets": "Àwọn Ẹ̀rọ Palazzo"
        },
        zu: {
            "Bodysuit Sets": "Amaseti e-Bodysuit", "Bodysuits": "Ama-Bodysuit", "Co-ord Sets": "Amaseti Ahambisanayo", "Dungaree Sets": "Amaseti e-Dungaree", "Loungewear Sets": "Amaseti Ezingubo Zasekhaya", "Pyjama Sets": "Amaseti Amaphijama", "Rompers & Sleepsuits": "Ama-Romper Nezingubo Zokulala", "Shirt & Shorts Sets": "Amaseti Amahembe Namabhulukwe Amafushane", "Shirts": "Amahembe", "Trousers & Jeans": "Amabhulukwe Nama-Jeans", "Tshirt & Shorts Sets": "Amaseti Ama-T-shirt Namabhulukwe Amafushane", "Shorts & Bermudas": "Amabhulukwe Amafushane Nama-Bermuda", "Frock 2pc Sets": "Amaseti Ezingubo Izingxenye Ezimbili", "Frocks & Dresses": "Izingubo", "Top & Leggings Sets": "Amaseti Okuphezulu Nama-Leggings", "Top & Shorts Sets": "Amaseti Okuphezulu Namabhulukwe Amafushane", "Leggings": "Ama-Leggings", "Palazzo Sets": "Amaseti e-Palazzo"
        }
    };

    // Function to get translated product name
    function getProductName(productKey) {
        const lang = currentLang || 'en';
        if (productTranslations[lang] && productTranslations[lang][productKey]) {
            return productTranslations[lang][productKey];
        }
        return productKey; // Fallback to English key
    }

    // DOM Elements
    const genderCheckboxes = document.querySelectorAll('input[name="gender"]');
    const ageCheckboxes = document.querySelectorAll('input[name="age"]');
    const productTrigger = document.getElementById('productTrigger');
    const productDropdown = document.getElementById('productDropdown');
    const productPlaceholder = document.getElementById('productPlaceholder');
    const genderCount = document.getElementById('genderCount');
    const ageCount = document.getElementById('ageCount');
    const form = document.getElementById('inquiryForm');
    const successMessage = document.getElementById('successMessage');

    // Track selected products and dropdown state
    let selectedProducts = [];
    let isDropdownOpen = false;
    let availableProducts = [];

    // Get selected values from checkbox group
    function getSelectedValues(name) {
        return Array.from(document.querySelectorAll(`input[name="${name}"]:checked`))
            .map(cb => cb.value);
    }

    // Update selection count display - show specific instruction initially, then count
    function updateGenderCount() {
        const count = getSelectedValues('gender').length;
        const countEl = document.getElementById('genderCount');
        const t = translations[currentLang] || translations['en'];
        if (countEl) {
            if (count === 0) {
                countEl.textContent = `(${t.selectOneOrBoth})`;
                countEl.classList.remove('has-selection');
            } else {
                countEl.textContent = `(${count} ${t.selected})`;
                countEl.classList.add('has-selection');
            }
        }
    }

    function updateAgeCount() {
        const count = getSelectedValues('age').length;
        const countEl = document.getElementById('ageCount');
        const t = translations[currentLang] || translations['en'];
        if (countEl) {
            if (count === 0) {
                countEl.textContent = `(${t.selectOneOrMore})`;
                countEl.classList.remove('has-selection');
            } else {
                countEl.textContent = `(${count} ${t.selected})`;
                countEl.classList.add('has-selection');
            }
        }
    }

    // Toggle dropdown open/close
    function toggleDropdown(event) {
        if (productTrigger.classList.contains('disabled')) return;

        isDropdownOpen = !isDropdownOpen;
        productDropdown.classList.toggle('open', isDropdownOpen);
        productTrigger.classList.toggle('active', isDropdownOpen);
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function (e) {
        if (e.target.closest('.multi-select-dropdown') || e.target.closest('.multi-select-trigger')) {
            return;
        }
        isDropdownOpen = false;
        productDropdown.classList.remove('open');
        productTrigger.classList.remove('active');
    });

    // Update age checkboxes based on gender selection
    function updateAgeOptions() {
        const selectedGenders = getSelectedValues('gender');

        if (selectedGenders.length > 0) {
            ageCheckboxes.forEach(cb => cb.disabled = false);
        } else {
            ageCheckboxes.forEach(cb => {
                cb.disabled = true;
                cb.checked = false;
            });
        }

        updateGenderCount();
        updateAgeCount();
        updateProductDropdown();
    }

    // Update product dropdown based on gender and age selection
    function updateProductDropdown() {
        const selectedGenders = getSelectedValues('gender');
        const selectedAges = getSelectedValues('age');

        // Reset selected products when filters change
        selectedProducts = [];

        updateAgeCount();

        if (selectedGenders.length === 0 || selectedAges.length === 0) {
            productDropdown.innerHTML = '';
            const t = translations[currentLang] || translations['en'];
            productPlaceholder.textContent = t.selectGenderAge;
            productTrigger.classList.add('disabled');
            availableProducts = [];
            return;
        }

        // Collect all unique categories with their age groups
        const productAgeMap = {};

        selectedGenders.forEach(gender => {
            selectedAges.forEach(age => {
                if (productData[gender] && productData[gender][age]) {
                    productData[gender][age].forEach(product => {
                        if (!productAgeMap[product]) {
                            productAgeMap[product] = new Set();
                        }
                        productAgeMap[product].add(age);
                    });
                }
            });
        });

        // Store the mapping globally for use in rendering
        window.productAgeMap = productAgeMap;

        availableProducts = Object.keys(productAgeMap).sort();

        if (availableProducts.length === 0) {
            productDropdown.innerHTML = '';
            const t = translations[currentLang] || translations['en'];
            productPlaceholder.textContent = t.noProducts;
            productTrigger.classList.add('disabled');
            return;
        }

        // Enable dropdown
        productTrigger.classList.remove('disabled');
        const t = translations[currentLang] || translations['en'];
        productPlaceholder.textContent = t.selectProducts;

        // Build dropdown options
        renderDropdownOptions();
    }

    // Get age label for display
    function getAgeLabel(age) {
        const t = translations[currentLang] || translations['en'];
        const ageLabels = {
            baby: t.ageBaby || '0-3Y',
            toddlers: t.ageToddlers || '2-6Y',
            kids: t.ageKids || '6-14Y'
        };
        return ageLabels[age] || age;
    }

    // Get product display name with age labels
    function getProductDisplayName(product) {
        const productName = getProductName(product);
        const ages = window.productAgeMap && window.productAgeMap[product]
            ? Array.from(window.productAgeMap[product])
            : [];

        if (ages.length === 0) {
            return productName;
        }

        // Sort ages in order: baby, toddlers, kids
        const ageOrder = ['baby', 'toddlers', 'kids'];
        ages.sort((a, b) => ageOrder.indexOf(a) - ageOrder.indexOf(b));

        const ageLabelsStr = ages.map(age => getAgeLabel(age)).join(', ');
        return `${productName} <span class="age-label">(${ageLabelsStr})</span>`;
    }

    // Render dropdown options
    function renderDropdownOptions() {
        const selectedCount = selectedProducts.length;
        const t = translations[currentLang] || translations['en'];
        const headerHtml = `
                <div class="dropdown-header">
                    <span>${selectedCount} ${t.selected}</span>
                    ${selectedCount > 0 ? `<button type="button" class="clear-all-btn" onclick="clearAllProducts(event)">${t.selectAllThatApply === t.selectAllThatApply ? 'Clear all' : 'Clear'}</button>` : ''}
                </div>
            `;

        const optionsHtml = availableProducts.map(product => `
                <div class="multi-select-option ${selectedProducts.includes(product) ? 'selected' : ''}" 
                     data-product="${product}">
                    <span class="check"></span>
                    <span>${getProductDisplayName(product)}</span>
                </div>
            `).join('');

        productDropdown.innerHTML = headerHtml + '<div class="dropdown-options">' + optionsHtml + '</div>';

        // Add click handlers that don't close dropdown
        productDropdown.querySelectorAll('.multi-select-option').forEach(option => {
            option.addEventListener('click', function (e) {
                e.stopPropagation();
                const product = this.getAttribute('data-product');
                toggleProduct(product);
            });
        });

        updatePlaceholder();
    }

    // Clear all selected products
    function clearAllProducts(event) {
        event.stopPropagation();
        selectedProducts = [];
        renderDropdownOptions();
    }

    // Toggle product selection - update only the changed elements
    function toggleProduct(product) {
        if (selectedProducts.includes(product)) {
            selectedProducts = selectedProducts.filter(p => p !== product);
        } else {
            selectedProducts.push(product);
        }

        // Update only the clicked option's class
        const option = productDropdown.querySelector(`[data-product="${product}"]`);
        if (option) {
            option.classList.toggle('selected', selectedProducts.includes(product));
        }

        // Update header count
        updateDropdownHeader();
        updatePlaceholder();
    }

    // Update just the dropdown header
    function updateDropdownHeader() {
        const headerSpan = productDropdown.querySelector('.dropdown-header span');
        const clearBtn = productDropdown.querySelector('.clear-all-btn');
        const selectedCount = selectedProducts.length;

        if (headerSpan) {
            headerSpan.textContent = selectedCount + ' selected';
        }

        // Show/hide clear button
        if (selectedCount > 0 && !clearBtn) {
            const header = productDropdown.querySelector('.dropdown-header');
            if (header) {
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'clear-all-btn';
                btn.textContent = 'Clear all';
                btn.onclick = clearAllProducts;
                header.appendChild(btn);
            }
        } else if (selectedCount === 0 && clearBtn) {
            clearBtn.remove();
        }
    }

    // Update placeholder text
    function updatePlaceholder() {
        updatePlaceholderText();
        if (selectedProducts.length > 0) {
            productTrigger.classList.add('has-selection');
        } else {
            productTrigger.classList.remove('has-selection');
        }
    }

    // Event Listeners
    genderCheckboxes.forEach(cb => {
        cb.addEventListener('change', updateAgeOptions);
    });

    ageCheckboxes.forEach(cb => {
        cb.addEventListener('change', updateProductDropdown);
    });

    // Form submission
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const selectedGenders = getSelectedValues('gender');
        const selectedAges = getSelectedValues('age');

        // Validation
        if (selectedGenders.length === 0) {
            alert('Please select at least one gender');
            return;
        }

        if (selectedAges.length === 0) {
            alert('Please select at least one age range');
            return;
        }

        // Collect form data
        const name = document.getElementById('name').value;

        // Age labels (just the numbers)
        const ageLabels = {
            baby: '0-3Y',
            toddlers: '2-6Y',
            kids: '6-14Y'
        };

        // Language names in English for message
        const languageNames = {
            en: 'English',
            ar: 'Arabic',
            fa: 'Farsi',
            fr: 'French',
            ru: 'Russian',
            es: 'Spanish',
            sw: 'Swahili',
            af: 'Afrikaans',
            sq: 'Albanian',
            am: 'Amharic',
            hy: 'Armenian',
            az: 'Azerbaijani',
            gu: 'Gujarati',
            ha: 'Hausa',
            hi: 'Hindi',
            kk: 'Kazakh',
            ku: 'Kurdish',
            mn: 'Mongolian',
            ps: 'Pashto',
            pt: 'Portuguese',
            so: 'Somali',
            tr: 'Turkish',
            ur: 'Urdu',
            uz: 'Uzbek',
            yo: 'Yoruba',
            zu: 'Zulu'
        };

        // Build product type section
        let productTypeSection = '';
        if (selectedProducts.length > 0) {
            const productsList = selectedProducts.map(p => `- ${p}`).join('\n');
            productTypeSection = `
Product Type:
${productsList}`;
        }

        // Build message/notes section
        const messageText = document.getElementById('message').value.trim();
        let notesSection = '';
        if (messageText) {
            notesSection = `

Notes:
${messageText}`;
        }

        // Get business name (required)
        const businessName = document.getElementById('businessName').value;

        // Build business type section (optional)
        const businessType = document.getElementById('businessType').value;
        let businessTypeSection = '';
        if (businessType) {
            businessTypeSection = `
Business Type: ${businessType}`;
        }

        // Build message (always in English for Marhaba team)
        let genderTextPlain = '';
        if (selectedGenders.length === 2) {
            genderTextPlain = "Boys, Girls";
        } else if (selectedGenders[0] === 'boy') {
            genderTextPlain = "Boys";
        } else {
            genderTextPlain = "Girls";
        }

        const agesTextPlain = selectedAges.map(age => ageLabels[age]).join(', ');
        const langName = languageNames[currentLang] || 'English';

        const message = `Name: ${name}
Business: ${businessName}${businessTypeSection}

Interested in wholesale
clothing for:

Gender: ${genderTextPlain}
Age: ${agesTextPlain}
${productTypeSection}${notesSection}
Language: ${langName}`;

        // Encode message for URL
        const encodedMessage = encodeURIComponent(message);

        // Marhaba WhatsApp number (without +)
        const marhabaNumber = '971569233052';

        // Open WhatsApp
        const whatsappURL = `https://wa.me/${marhabaNumber}?text=${encodedMessage}`;


        // Show success message with WhatsApp link
        form.style.display = 'none';
        successMessage.classList.add('show');

        // Update success message with clickable link as fallback
        document.getElementById('whatsappLink').href = whatsappURL;

        // Try to open WhatsApp
        window.location.href = whatsappURL;
    });

    // Initialize counts on page load
    updateGenderCount();
    updateAgeCount();
</script>