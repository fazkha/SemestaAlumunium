@section('title', __('404'))

<x-error-layout>
    <div class="flex items-center justify-center min-h-screen bg-black bg-fixed bg-cover bg-bottom error-bg">
        <div class="text-white text-center">
            <a href="{{ url('admin/dashboard') }}"
                class="bg-indigo-800 px-5 py-3 text-sm shadow-sm font-medium tracking-wider text-gray-50 rounded-full hover:shadow-lg">
                @lang('messages.gotodashboard')
            </a>
        </div>
    </div>

    @push('styles')
        <style>
            .error-bg {
                background-image: url("/images/bg-error-500.jpg");
            }

            .tracking-tighter-less {
                letter-spacing: -0.75rem;
            }

            .text-shadow {
                text-shadow: -8px 0 0 rgb(102 123 242);
            }
        </style>
    @endpush
</x-error-layout>
