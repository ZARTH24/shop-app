@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-4">Membership Seumur Hidup</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(auth()->user()->is_member)
        <div class="alert alert-success">
            Kamu sudah member! Hidup kamu udah naik kasta.
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <p>
                    Bayar sekali → Nikmati fitur premium selamanya.  
                    Tanpa expired, tanpa ribet, tanpa drama.
                </p>

                <!-- Tombol menuju "bayar" -->
                <form action="{{ route('membership.activate') }}" method="POST">
                    @csrf
                    <button class="btn btn-primary">
                        Lakukan Pembayaran & Aktifkan Membership
                    </button>
                </form>

            </div>
        </div>
    @endif

</div>
@endsection
