@push('scripts')
@if (file_exists(public_path('assets/js/report.js')))
    <script src="{{ asset('assets/js/report.js') }}"></script>
@endif
@endpush