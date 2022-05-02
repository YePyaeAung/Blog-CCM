<x-layout>
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
    @auth
        <p class="d-flex justify-content-end me-5 mt-2 text-secondary">Login with >>> {{auth()->user()->name}}</p>   
    @endauth
    <x-hero/>
    <x-blog-section :blogs="$blogs"/>
</x-layout>