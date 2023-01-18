@if (session()->has('success'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
    class="fixed top-0 left-1/2 transform -translate-x-1/2 max-w-max bg-laravel text-white lg:px-48 px-3 py-3">
    <p>{{session('success')}}</p>
</div>
@endif