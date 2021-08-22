<div class="card border-0 rounded-0 shadow-none mb-0">
    <div class="card-body border-0" style="min-height: calc(100vh - 143px);">

        <div class="mb-4">
            <span class="h5 fw-bold">Download your data</span>
            <div class="mt-0 small text-muted">
                Export your account data.
            </div>
        </div>

        <div class="mb-4">
            <h5 class="mb-2">Export your account</h5>
            <div class="mb-2 text-secondary">
                Most of the personal data that Btekno has about you is accessible through the Btekno app (e.g.
                tasks, comments, questions, answers, patron details, and user account). If you would like to get a
                consolidated copy of this data, you can download it by clicking the "Export Now" button.
            </div>
            <div class="mb-2 text-secondary">
                As the downloadable file you will receive will contain your profile information, you should keep it
                secure and be careful when storing, sending, or uploading it to any other services.
            </div>
            <div class="mb-3 text-secondary">
                If you have any questions or concerns about the personal data contained in your downloadable file,
                please <a href="https://btekno.id/contact" target="_blank">contact us</a>.
            </div>
            <a class="btn btn-success text-white" href="{{ route('member.settings.export.account') }}"
                target="_blank">
                <x-heroicon-o-download class="heroicon" />
                Export account now
            </a>
        </div>
        <hr />
        <div class="mt-4">
            <h5 class="mb-2">Export your logs</h5>
            <div class="mb-2 text-secondary">
                You can download and review the security log for your user account to better understand actions
                you've performed and actions others have performed that involve you.
            </div>
            <a class="btn btn-success text-white" href="{{ route('member.settings.export.logs') }}"
                target="_blank">
                <x-heroicon-o-download class="heroicon" />
                Export logs now
            </a>
        </div>
    </div>
</div>