<div>
    <div class="row m-0 p-3">
        <div class="col-md-4">
            <div class="mt-2">
                <span class="h5 fw-bold">Download your data</span>
                <div class="text-muted lh-sm mt-1">
                    Export your account data.
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="mt-2">
                <h5 class="mb-2">Export your account</h5>
                <div class="mb-2 lh-sm text-secondary">
                    Most of the personal data that {{ env('APP_NAME') }} has about you is accessible through the {{ env('APP_NAME') }} app (e.g.
                    tasks, comments, questions, answers, patron details, and user account). If you would like to get a
                    consolidated copy of this data, you can download it by clicking the "Export Now" button.
                </div>
                <div class="mb-2 lh-sm text-secondary">
                    As the downloadable file you will receive will contain your profile information, you should keep it
                    secure and be careful when storing, sending, or uploading it to any other services.
                </div>
                <div class="mb-4 lh-sm text-secondary">
                    If you have any questions or concerns about the personal data contained in your downloadable file,
                    please <a href="{{ env('APP_URL') }}/contact" target="_blank">contact us</a>.
                </div>

                <a class="btn btn-outline-success mb-3" href="{{ route('member.settings.export.account') }}" target="_blank">
                    <x-heroicon-o-download class="heroicon-icon" />
                    Export Account
                </a>
            </div>
            <hr/>
            <div>
                <h5 class="mb-2">Export your logs</h5>
                <div class="mb-4 lh-sm text-secondary">
                    You can download and review the security log for your user account to better understand actions
                    you've performed and actions others have performed that involve you.
                </div>
                <a class="btn btn-outline-success" href="{{ route('member.settings.export.logs') }}" target="_blank">
                    <x-heroicon-o-download class="heroicon-icon" />
                    Export Logs
                </a>
            </div>
        </div>
    </div>
</div>
