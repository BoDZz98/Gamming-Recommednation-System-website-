@extends('layouts.profile')
@section('content2')

<p class="text-2xl tracking-wide text-purple-500 font-extrabold p-7 ">Wishlist :</p>
<div class="px-16 lg:px-40">
    @livewire('popular-games')
</div>


@endsection