@extends('frontend.master')

@section('content')
    <main class="max-w-3xl mx-auto px-5 sm:px-8 pt-12 pb-16">
        <span class="section-ribbon">Privacy</span>
        <div class="prose-content mt-4">
            <h1>Privacy Policy</h1>
            <p style="color:var(--muted); font-size:.85rem">Last updated: April 2026</p>

            <p>
                This survey is anonymous. Your responses help create safer pathways into tech.
                Data will only be used in aggregate.
            </p>

            <h2>1. What we collect</h2>
            <ul>
                <li>The answers you choose to submit through the survey form.</li>
                <li>A timestamp of when the response was submitted.</li>
                <li>Coarse country/region only when you tell us &mdash; we don't infer it from your IP.</li>
            </ul>
            <p>We do <strong>not</strong> collect: your name, email, phone number, IP address, device fingerprint, or any
                account identifiers.</p>

            <h2>2. What we don't do</h2>
            <ul>
                <li>We don't sell your data. Ever.</li>
                <li>We don't share individual responses with employers, governments, or third parties.</li>
                <li>We don't use third-party advertising or analytics trackers on this site.</li>
            </ul>

            <h2>3. Local storage on your device</h2>
            <p>
                To let you pause and resume the survey, your in-progress answers are saved in your browser's
                <strong>localStorage</strong> &mdash; never on our servers. You can clear them any time using the
                &ldquo;Reset&rdquo; button on the survey page, or by clearing your browser's site data.
            </p>

            <h2>4. How we publish findings</h2>
            <p>
                Findings are published as aggregated statistics (for example, &ldquo;64% of respondents reported
                misgendering at work&rdquo;). Free-text responses may be quoted only when:
            </p>
            <ul>
                <li>The quote contains nothing identifying about the respondent.</li>
                <li>It's not combined with other quotes in a way that could re-identify the same person.</li>
            </ul>

            <h2>5. Sensitive identity data</h2>
            <p>
                We treat all identity questions as sensitive personal data. They are optional, with
                &ldquo;Prefer not to say&rdquo; on every one. Aggregated results from small subgroups
                (fewer than 25 respondents) are merged into broader categories before publication, to prevent
                re-identification.
            </p>

            <h2>6. Children</h2>
            <p>
                The &ldquo;Under 18&rdquo; option exists because young people experience these dynamics too.
                If you're under 13, please don't submit a response.
            </p>

            <h2>7. Your rights</h2>
            <p>
                Because we don't store identifying information, we have no way to find your specific response in our
                dataset.
                That's by design &mdash; it protects you. If you want a response removed, please clear your browser's local
                storage
                before submitting; once submitted, anonymous responses can't be traced back.
            </p>

            <h2>8. Changes to this policy</h2>
            <p>
                We'll post any material changes here with an updated date. We'll never retroactively change
                how we treat data you've already submitted.
            </p>

            <h2>9. Contact</h2>
            <p>Questions: <a href="mailto:privacy@outintech-survey.org">privacy@outintech-survey.org</a></p>
        </div>
    </main>
@endsection
