@extends('layouts.app')
@section('title')
    Booking Finished
@endsection
@section('content')
    <div class="flex flex-col items-center w-full min-h-screen">
        <div class="flex flex-col max-w-[856px] rounded-6 p-8 gap-8 bg-white my-auto">
            <div class="flex flex-col gap-6">
                <img src="{{ asset('assets/images/icons/receipt-2.svg') }}" class="w-[72px] h-[72px] flex shrink-0 mx-auto"
                    alt="icon">
                <h1 class="font-bold text-[32px] leading-[48px] text-center">Booking Succes, well done 🙌🏻</h1>
            </div>
            <div class="flex flex-col gap-6">
                <div class="flex justify-between w-full rounded-full border border-[#E6E7EB] p-3 pl-8">
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('assets/images/icons/receipt.svg') }}" class="w-8 h-8 flex shrink-0"
                            alt="icon">
                        <p class="font-medium text-lg leading-[27px] text-aktiv-grey">Booking ID:</p>
                        <p class="font-bold text-lg leading-[27px]">
                            {{ $bookingTransaction->booking_trx_id }}
                        </p>
                    </div>
                    <a href="{{ route('front.check_booking') }}"
                        class="flex items-center shrink-0 gap-2 rounded-full py-4 px-8 bg-aktiv-orange">
                        <img src="{{ asset('assets/images/icons/search-normal.svg') }}" class="w-8 h-8 flex shrink-0"
                            alt="icon">
                        <span class="font-semibold text-lg leading-[27px] text-white text-nowrap">View My Booking</span>
                    </a>
                </div>
                <p class="font-medium leading-[25.6px] text-center text-aktiv-grey">Your workshop booking is confirmed.
                    We will check the payment and send the receipt to your email address</p>
            </div>
        </div>
        <a href="{{ route('front.index') }}" class="font-semibold mb-[52px] mt-4">Back to Homepage</a>
    </div>
@endsection
