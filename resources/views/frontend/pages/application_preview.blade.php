<head>
    <title>𝑺𝑯𝑨𝑯𝑹𝑰𝑨𝑹 𝑾𝑶𝑹𝑳𝑫𝑾𝑰𝑫𝑬 𝑽𝑬𝑵𝑻𝑼𝑹𝑬𝑺</title>
    <link href="{{url('logo.png')}}" rel="icon">
</head>
<style>
    :root {
        --line: #e9ecef;
        --muted: #6c757d;
        --shade: #f8f9fa;
        --title: #212529;
        --brand: #0d6efd;
    }

    .app-wrap {
        max-width: 820px;
        margin: 24px auto;
        background: #fff;
        border: 1px solid var(--line);
        box-shadow: 0 6px 20px rgba(0, 0, 0, .06);
        border-radius: 10px;
        overflow: hidden;
    }

    .app-header {
        display: flex;
        gap: 16px;
        align-items: center;
        padding: 5px 18px;
        background: #fff;
    }

    .brand {
        display: flex;
        gap: 12px;
        align-items: center;
        flex: 1;
    }

    .brand img {
        width: 54px;
        height: 54px;
        object-fit: contain;
        border-radius: 6px;
        border: 1px solid var(--line);
    }

    .brand h1 {
        font-size: 22px;
        margin: 0;
        color: var(--title);
        font-weight: 700;
    }

    .brand small {
        color: var(--muted);
        display: block;
        margin-top: 2px;
    }

    .meta {
        font-size: 12px;
        color: var(--muted);
    }

    .profile {
        width: 64px;
        height: 64px;
        border: 1px solid var(--line);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
    }

    .profile .circle {
        width: 36px;
        height: 36px;
        border-radius: 999px;
        border: 2px solid var(--title);
        position: relative;
    }

    .profile .circle::after {
        /* tiny “shoulders” */
        content: "";
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        bottom: -11px;
        width: 46px;
        height: 22px;
        border: 2px solid var(--title);
        border-top: none;
        border-radius: 0 0 40px 40px;
    }

    .app-title {
        padding: 18px 18px 8px;
        text-align: center;
    }

    .app-title a {
        color: var(--brand);
        font-weight: 600;
        text-decoration: none;
        font-size: 18px;
    }

    .section {
        margin: 18px;
        border: 1px solid var(--line);
        border-radius: 8px;
        overflow: hidden;
        background: #fff;
    }

    .section h3 {
        margin: 0;
        text-align: center;
        padding: 10px 14px;
        font-size: 16px;
        color: var(--title);
        border-bottom: 1px solid var(--line);
        background: var(--shade);
        font-weight: 700;
    }

    .rowline {
        display: flex;
        gap: 0;
        border-bottom: 1px solid var(--line);
    }

    .rowline:last-child {
        border-bottom: none;
    }

    .rowline .label {
        width: 170px;
        min-width: 170px;
        padding: 10px 12px;
        font-size: 13px;
        color: #1f2937;
        background: #fff;
    }

    .rowline .value {
        flex: 1;
        padding: 10px 12px;
        font-size: 13px;
        color: #111827;
        background: #fff;
        border-left: 1px solid var(--line);
    }

    .muted {
        color: var(--muted);
    }

    .footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        padding: 14px 18px;
        border-top: 1px solid var(--line);
        background: #fff;
    }

    .btn {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        border: 1px solid transparent;
    }

    .btn-primary {
        background: var(--brand);
        color: #fff;
    }

    .btn-light {
        background: #fff;
        color: #111827;
        border-color: var(--line);
    }

    .copyright {
        text-align: center;
        font-size: 11px;
        color: var(--muted);
        padding: 10px 0 16px;
    }

    /* Print */
    @media print {

        .btn,
        .footer {
            display: none !important;
        }

        .app-wrap {
            box-shadow: none;
            border: none;
        }

        body {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
    }
</style>

<div class="app-wrap">
    @include('sweetalert::alert')

    {{-- Header --}}
    <div class="app-header">
        <div class="brand">
            <img style="width: 80px; height: 80px; background-color:black" src="{{ url('logo.png') }}" alt="Logo">
            <div>
                <h1>𝑺𝑯𝑨𝑯𝑹𝑰𝑨𝑹 𝑾𝑶𝑹𝑳𝑫𝑾𝑰𝑫𝑬 𝑽𝑬𝑵𝑻𝑼𝑹𝑬𝑺</h1>
            </div>
        </div>
    </div>
    {{-- Header --}}
    <div class="app-header"
        style="display:flex; justify-content:space-between; align-items:center;">

        <!-- Left -->
        <div class="meta">
            <div><strong>Date Submitted:</strong></div>
            <div>{{ now()->format('d M Y') }}</div>
        </div>

        <!-- Center -->
        <div class="app-title" style="text-align:center; flex:1;">
            <h3>Application for Job</h3>
        </div>

        <!-- Right -->
        <div class="profile" style="text-align:right;">
            @if(!empty($application['avatar']))
            <img src="{{ asset($application['avatar']) }}"
                alt="Avatar"
                style="height:100px; width:100px; object-fit:cover; border-radius:50%;">
            @else
            <span>-</span>
            @endif
        </div>
    </div>

    {{-- Title --}}
    <div style="border-bottom: 1px solid var(--line);"></div>

    {{-- Candidate Information --}}
    <div class="section">
        <h3>Candidate Information</h3>

        <div class="rowline">
            <div class="label">Name:</div>
            <div class="value">{{ $application['name'] ?? '-' }}</div>
        </div>

        <div class="rowline">
            <div class="label">Phone:</div>
            <div class="value">{{ $application['phone'] ?? '-' }}</div>
        </div>

        <div class="rowline">
            <div class="label">Email:</div>
            <div class="value">{{ $application['email'] ?? '-' }}</div>
        </div>

        <div class="rowline">
            <div class="label">Gender:</div>
            <div class="value">{{ $application['gender'] ?? '-' }}</div>
        </div>

        <div class="rowline">
            <div class="label">Date of Birth:</div>
            <div class="value">{{ $application['dob'] ?? '-' }}</div>
        </div>

        <div class="rowline">
            <div class="label">Address:</div>
            <div class="value">{{ $application['address'] ?? '-' }}</div>
        </div>
    </div>

    <div style="border-bottom: 1px solid var(--line);"></div>

    {{-- Other Information --}}
    <div class="section">
        <h3>Other Information</h3>
        <div class="rowline">
            <div class="label">Job Category:</div>
            <div class="value">{{ $application['jobCategory_name'] ?? '-' }}</div>
        </div>
    </div>

    <div style="border-bottom: 1px solid var(--line);"></div>

    {{-- Additional Information --}}
    <div class="section">
        <h3>Additional Information</h3>

        <div class="rowline">
            <div class="label">Passport No:</div>
            <div class="value">{{ $application['passport_no'] ?? '-' }}</div>
        </div>

        <div class="rowline">
            <div class="label">Nationality:</div>
            <div class="value">{{ $application['nationality'] ?? '-' }}</div>
        </div>

        <div class="rowline">
            <div class="label">Current Country:</div>
            <div class="value">{{ $application['current_country'] ?? '-' }}</div>
        </div>

        <div class="rowline">
            <div class="label">Experience Year:</div>
            <div class="value">{{ $application['experienceYear'] ?? '-' }}</div>
        </div>

        <div class="rowline">
            <div class="label">Work Related Video Link:</div>
            <div class="value">{{ $application['videoLink'] ?? '-' }}</div>
        </div>

        <div class="rowline">
            <div class="label">English Course:</div>
            <div class="value">{{ $application['englishCourse'] ?? '-' }}</div>
        </div>

        <div class="rowline">
            <div class="label">Upload CV:</div>
            <div class="value">
                @if(!empty($application['cv']))
                <a href="{{ asset($application['cv']) }}" target="_blank">View CV</a>
                @else
                <span>-</span>
                @endif
            </div>
        </div>

    </div>

    {{-- Footer buttons --}}
    <div class="footer">
        <div class="left">
            <a href="" class="btn btn-light">Go back to edit</a>
        </div>
        <form action="{{route('application.submit')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="center">
                <button type="submit" class="btn btn-primary">Apply</button>
            </div>
        </form>
        <div class="right">
            <a href="" class="btn btn-light">Back to login</a>
        </div>
    </div>

</div>

<!-- <div class="copyright">
    &copy; {{ now()->year }} {{ $application->company_name ?? 'BritFly Jobs' }}. Version 1.0.0.
</div> -->