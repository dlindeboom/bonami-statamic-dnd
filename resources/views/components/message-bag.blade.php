@php
    /** @var \Illuminate\Support\ViewErrorBag $errors */
@endphp

@if($errors->any() || session('success'))
    <div class="pt-4">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <x-alerts.error :message="$error" />
            @endforeach
        @endif

        @if(session('success'))
            <x-alerts.info :message="session('success')" />
        @endif
    </div>
@endif
