<li @if($firstItem) class="pt-2" @endif>
    <a href="{{ $url }}" target="_blank" class="hover:text-colors-cool-gray-300">
        @if($icon!== null)  <span class="fab {{ $icon }} fa-lg w-6 text-center"></span>@endif
        <span class="text-left">{{ $title }}</span>
    </a>
</li>
