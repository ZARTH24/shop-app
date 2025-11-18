@extends('layouts.app')

@section('content')
<h1>Paket Membership</h1>

@foreach($memberships as $membership)
    <div>
        <h3>{{ $membership->name }}</h3>
        <p>Harga: Rp{{ number_format($membership->price, 0, ',', '.') }}</p>
        <p>Durasi: {{ $membership->duration_days }} hari</p>

        @if(Auth::user()->memberships->contains($membership->id))
            <button disabled>Sudah Berlangganan</button>
        @else
            <form action="{{ route('memberships.subscribe', $membership->id) }}" method="POST">
                @csrf
                <button type="submit">Subscribe</button>
            </form>
        @endif
    </div>
@endforeach

@endsection
