@extends('layouts.app')
@section('title')
    Payment Confirmation
@endsection

@section('content')
    <div class="h-[112px]">
        <x-nav />
    </div>
    <div id="background" class="relative w-full">
        <div class="absolute w-full h-[300px] bg-[linear-gradient(0deg,#4EB6F5_0%,#5B8CE9_100%)] -z-10"></div>
    </div>
    <section id="Content" class="w-full max-w-[1280px] mx-auto px-[52px] mt-16 mb-[100px]">
        <div class="flex flex-col gap-16">
            <div class="flex flex-col items-center gap-1">
                <p class="font-bold text-[32px] leading-[48px] capitalize text-white">Booking Workshop</p>
                <div class="flex items-center gap-2 text-white">
                    <a class="last:font-semibold">Homepage</a>
                    <span>></span>
                    <a class="last:font-semibold">Workshop Details</a>
                    <span>></span>
                    <a class="last:font-semibold">Booking Workshop</a>
                    <span>></span>
                    <a class="last:font-semibold">Confirmation Payment</a>
                </div>
            </div>
            <main class="flex gap-8">
                <section id="Sidebar" class="group flex flex-col w-[420px] h-fit rounded-3xl p-8 bg-white">
                    <div class="flex flex-col gap-4">
                        <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Workshop Details</h2>
                        <div class="thumbnail-container relative h-[240px] rounded-xl bg-[#D9D9D9] overflow-hidden">
                            <img src="{{ Storage::url($workshop->thumbnail) }}" class="w-full h-full object-cover"
                                alt="Workshop thumbnail">
                        </div>
                        <div class="card-detail flex flex-col gap-2">
                            <div class="flex items-center gap-3">
                                <div class="flex items-center gap-1">
                                    <img src="{{ asset('assets/images/icons/calendar-2.svg') }}"
                                        class="w-6 h-6 flex shrink-0" alt="workshop kick off date icon">
                                    <span class="font-medium text-aktiv-grey">
                                        {{ $workshop->started_at->format('D, d M Y') }}
                                    </span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <img src="{{ asset('assets/images/icons/timer.svg') }}" class="w-6 h-6 flex shrink-0"
                                        alt="workshop time icon">
                                    <span class="font-medium text-aktiv-grey">
                                        {{ $workshop->time_at->format('h:i A') }} - Finish
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-Neue-Plak-bold text-xl">
                                {{ $workshop->name }}
                            </h3>
                        </div>
                    </div>
                    <div id="closes-section"
                        class="accordion flex flex-col gap-8 transition-all duration-300 mt-8 group-has-[:checked]:mt-0 group-has-[:checked]:!h-0 overflow-hidden">
                        <div class="flex flex-col gap-4">
                            <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Instructor Details</h2>
                            <div class="flex items-center gap-3 rounded-xl border border-[#E6E7EB] p-4">
                                <div class="flex w-16 h-16 shrink-0 rounded-full overflow-hidden bg-[#D9D9D9]">
                                    <img src="{{ Storage::url($workshop->instructor->avatar) }}"
                                        class="w-full h-full object-cover" alt="instructor photo">
                                </div>
                                <div class="flex flex-col gap-[2px] flex-1">
                                    <p class="font-semibold text-lg leading-[27px]">
                                        {{ $workshop->instructor->name }}
                                    </p>
                                    <p class="font-medium text-aktiv-grey">
                                        {{ $workshop->instructor->occupation }}
                                    </p>
                                </div>
                                <img src="{{ asset('assets/images/icons/verify.svg') }}"
                                    class="flex w-[62px] h-[62px] shrink-0" alt="icon">
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">This workshop will teach</h2>
                            <div class="flex flex-col gap-6">
                                @forelse ($workshop->benefits as $itemWorkshopBenefits)
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('assets/images/icons/tick-circle.svg') }}"
                                            class="w-6 h-6 flex shrink-0" alt="tick icon">
                                        <p class="font-semibold text-lg leading-[27px]">{{ $itemWorkshopBenefits->name }}
                                        </p>
                                    </div>
                                @empty
                                    <div class="flex items-center gap-2">
                                        <p class="font-semibold text-lg leading-[27px]">Tidak ada benefit</p>
                                    </div>
                                @endforelse

                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Location Details</h2>
                            <div class="flex flex-col gap-4 rounded-xl border border-[#E6E7EB] p-5 pb-[21px]">
                                <div class="flex w-full h-[180px] rounded-xl overflow-hidden">
                                    <img src="{{ Storage::url($workshop->venue_thumbnail) }}"
                                        class="w-full h-full object-cover" alt="location">
                                </div>
                                <div class="flex flex-col gap-3">
                                    <p class="font-medium leading-[25.6px] text-aktiv-grey">
                                        {{ $workshop->address }}
                                    </p>
                                    <a target="_blank" href="https://www.google.com/maps/search/{{ $workshop->address }}/"
                                        class="font-semibold text-aktiv-orange">View in Google Maps</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label class="group mt-8">
                        <input type="checkbox" class="hidden">
                        <p
                            class="before:content-['Show_Less'] group-has-[:checked]:before:content-['Show_More'] before:font-semibold before:text-lg before:leading-[27px] flex items-center justify-center gap-[6px]">
                            <img src="{{ asset('assets/images/icons/arrow-up.svg') }}"
                                class="w-6 h-6 group-has-[:checked]:rotate-180 transition-all duration-300"
                                alt="Show more or show less icon">
                        </p>
                    </label>
                </section>
                <form id="Form" method="POST" enctype="multipart/form-data"
                    action="{{ route('front.payment_store') }}" class="flex flex-col w-[724px] gap-8">
                    @csrf
                    <div class="flex flex-col rounded-3xl p-8 gap-8 bg-white">
                        <div class="flex flex-col gap-4">
                            <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Payments Details</h2>
                            <div class="flex flex-col rounded-xl border border-[#E6E7EB] p-5 gap-4">
                                <div class="flex items-center justify-between">
                                    <p class="font-medium text-aktiv-grey">Quantity</p>
                                    <p class="font-semibold text-lg leading-[27px] text-right">
                                        {{ $orderData['quantity'] }}
                                    </p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <p class="font-medium text-aktiv-grey">Price</p>
                                    <p class="font-semibold text-lg leading-[27px] text-right">
                                        Rp{{ number_format($orderData['sub_total_amount'], 2, ',', '.') }}
                                    </p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <p class="font-medium text-aktiv-grey">PPN 12%</p>
                                    <p class="font-semibold text-lg leading-[27px] text-right">
                                        Rp{{ number_format($orderData['total_tax'], 2, ',', '.') }}
                                    </p>
                                </div>
                                <hr class="border-[#E6E7EB]">
                                <div class="flex items-center justify-between">
                                    <p class="font-medium text-aktiv-grey">Total Price</p>
                                    <p class="font-semibold text-lg leading-[27px] text-right text-aktiv-red">
                                        Rp{{ number_format($orderData['total_amount'], 2, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Your Bank Account</h2>
                            <div class="flex flex-col gap-6">
                                <label class="flex flex-col gap-4">
                                    <p class="font-medium text-aktiv-grey">Select Bank Type</p>
                                    <div
                                        class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden">
                                        <img src="{{ asset('assets/images/icons/bank.svg') }}"
                                            class="w-6 h-6 flex shrink-0 group-focus-within:hidden group-has-[:valid]:hidden"
                                            alt="icon">
                                        <img src="{{ asset('assets/images/icons/bank-black.svg') }}"
                                            class="w-6 h-6 shrink-0 hidden group-focus-within:flex group-has-[:valid]:flex"
                                            alt="icon">
                                        <input type="text" name="customer_bank_name" id="bankname"
                                            class="appearance-none bg-transparent w-full outline-none text-lg leading-[27px] font-semibold placeholder:font-medium placeholder:text-aktiv-grey"
                                            placeholder="What is the name of the bank you use?" required>
                                    </div>
                                </label>
                                <label class="flex flex-col gap-4">
                                    <p class="font-medium text-aktiv-grey">Full Name</p>
                                    <div
                                        class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden">
                                        <img src="{{ asset('assets/images/icons/profile-circle.svg') }}"
                                            class="w-6 h-6 flex shrink-0 group-focus-within:hidden group-has-[:valid]:hidden"
                                            alt="icon">
                                        <img src="{{ asset('assets/images/icons/profile-circle-black.svg') }}"
                                            class="w-6 h-6 shrink-0 hidden group-focus-within:flex group-has-[:valid]:flex"
                                            alt="icon">
                                        <input type="text" name="customer_bank_account" id="fullname"
                                            class="appearance-none bg-transparent w-full outline-none text-lg leading-[27px] font-semibold placeholder:font-medium placeholder:text-aktiv-grey"
                                            placeholder="Under whose name is this bank account?" required>
                                    </div>
                                </label>
                                <label class="flex flex-col gap-4">
                                    <p class="font-medium text-aktiv-grey">Bank account number</p>
                                    <div
                                        class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden">
                                        <img src="{{ asset('assets/images/icons/card-edit.svg') }}"
                                            class="w-6 h-6 flex shrink-0 group-focus-within:hidden group-has-[:valid]:hidden"
                                            alt="icon">
                                        <img src="{{ asset('assets/images/icons/card-edit-black.svg') }}"
                                            class="w-6 h-6 shrink-0 hidden group-focus-within:flex group-has-[:valid]:flex"
                                            alt="icon">
                                        <input type="text" name="customer_bank_number" id="banknumber"
                                            class="appearance-none bg-transparent w-full outline-none text-lg leading-[27px] font-semibold placeholder:font-medium placeholder:text-aktiv-grey"
                                            placeholder="What is the bank account number?" required>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Transfer Details</h2>
                            <div class="flex flex-col rounded-xl border border-[#E6E7EB]">
                                <p class="text-center py-7 px-8 w-full font-semibold text-lg leading-[27px]">Transfer Bank
                                </p>
                                <hr class="border-[#E6E7EB]">
                                <div class="flex flex-col py-5 px-8 gap-8">
                                    <div class="flex items-center justify-between gap-8">
                                        <div class="flex w-[78px] h-[53px] shrink-0 overflow-hidden">
                                            <img src="{{ asset('assets/images/logos/bca.svg') }}" class="object-contain"
                                                alt="bank logo">
                                        </div>
                                        <div class="flex flex-col gap-[2px] w-full">
                                            <p class="font-medium text-aktiv-grey">BCA Activ Bank</p>
                                            <p class="font-semibold text-lg leading-[27px]" id="norekBCA">1935 0009 1200
                                            </p>
                                        </div>
                                        <button type="button"
                                            class="align-middle font-semibold text-lg leading-[27px] text-aktiv-orange">Copy</button>
                                    </div>
                                    <div class="flex items-center justify-between gap-8">
                                        <div class="flex w-[78px] h-[53px] shrink-0 overflow-hidden">
                                            <img src="{{ asset('assets/images/logos/bni.svg') }}" class="object-contain"
                                                alt="bank logo">
                                        </div>
                                        <div class="flex flex-col gap-[2px] w-full">
                                            <p class="font-medium text-aktiv-grey">BNI Activ Bank</p>
                                            <p class="font-semibold text-lg leading-[27px]" id="norekBNI">1200 1935 0009
                                            </p>
                                        </div>
                                        <button type="button"
                                            class="align-middle font-semibold text-lg leading-[27px] text-aktiv-orange">Copy</button>
                                    </div>
                                    <div class="flex items-center justify-between gap-8">
                                        <div class="flex w-[78px] h-[53px] shrink-0 overflow-hidden">
                                            <img src="{{ asset('assets/images/logos/bri.svg') }}" class="object-contain"
                                                alt="bank logo">
                                        </div>
                                        <div class="flex flex-col gap-[2px] w-full">
                                            <p class="font-medium text-aktiv-grey">BRI Activ Bank</p>
                                            <p class="font-semibold text-lg leading-[27px]" id="norekBRI">0009 1200 1935
                                            </p>
                                        </div>
                                        <button type="button"
                                            class="align-middle font-semibold text-lg leading-[27px] text-aktiv-orange">Copy</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Upload Proof of payment</h2>
                            <label class="flex flex-col gap-4">
                                <div class="group flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden">
                                    <div
                                        class="flex items-center w-full gap-2 text-aktiv-grey group-has-[:valid]:text-aktiv-black transition-all duration-300">
                                        <img src="{{ asset('assets/images/icons/gallery.svg') }}"
                                            class="w-6 h-6 flex shrink-0 group-focus-within:hidden group-has-[:valid]:hidden"
                                            alt="icon">
                                        <img src="{{ asset('assets/images/icons/gallery-black.svg') }}"
                                            class="w-6 h-6 shrink-0 hidden group-focus-within:flex group-has-[:valid]:flex"
                                            alt="icon">
                                        <p id="Upload-btn"
                                            class="font-medium text-lg leading-[27px] group-has-[:valid]:font-semibold">
                                            Upload file</p>
                                    </div>
                                    <p class="font-semibold text-lg leading-[27px] text-aktiv-black text-nowrap">Browse
                                        file</p>
                                    <input type="file" name="proof" id="Proof"
                                        class="peer absolute -z-10 opacity-0 w-[10px]" required>
                                </div>
                            </label>
                        </div>
                        <button type="submit"
                            class="w-full rounded-xl h-16 px-6 text-center bg-aktiv-orange font-semibold text-lg leading-[27px] text-white">Continue
                            to Checkout</button>
                    </div>
                </form>
            </main>
        </div>
    </section>
@endsection

@push('after-scripts')
    <script>
        var APP_URL = '{{ env('APP_URL') }}';
    </script>
    <script src="{{ asset('js/accordion.js') }}"></script>
    <script src="{{ asset('js/booking.js') }}"></script>
    <script src="{{ asset('js/upload-file.js') }}"></script>
@endpush
