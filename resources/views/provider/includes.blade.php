@push('scripts')
@if (file_exists(public_path('front/js/report.js')))
    <script src="{{ asset('front/js/report.js') }}"></script>
@endif
@endpush