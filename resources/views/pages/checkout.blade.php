@extends('layouts.checkout')
@section('title', 'Checkout')


@section('content')
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Paket Travel
                                </li>
                                <li class="breadcrumb-item " aria-current="page">
                                    Details
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Checkout
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            @if ($errors->any())
                                <div class="alert aler-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ error }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            @endif

                            <h1>Who is Going</h1>
                            <p>
                                Trip to {{ $item->travel_package->title }} , {{ $item->travel_package->location }}
                            </p>
                            <div class="attendee">
                                <table class="table table-responsive-sm text-center">
                                    <thead>
                                        <tr>
                                            <td>Picture</td>
                                            <td>Name</td>
                                            <td>Nationality</td>
                                            <td>VISA</td>
                                            <td>Passport</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($item->details as $detail)
                                            <tr>
                                                <td>
                                                    <img src="https://ui-avatars.com/api/?name={{ $detail -> username }}" height="60"
                                                        alt="" class="rounded-circle">
                                                </td>
                                                <td class="align-middle">{{ $detail -> username }}</td>
                                                <td class="align-middle">{{ $detail -> nationality }}</td>
                                                <td class="align-middle">{{ $detail -> is_visa ? '30 Days' : 'N/A' }}</td>
                                                <td class="align-middle">

                                                {{ \Carbon\Carbon::createFromDate($detail->doe_pasport) 
                                                > \Carbon\Carbon::now() ? 'Active' : 'Inactive' }}
                                                
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{ route('checkout-remove', $detail -> id) }}">
                                                        <img src="{{ url('frontend/images/ic_remove.png') }}"
                                                            alt="">
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                No Visitor
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="member mt-3">
                                <h2>Add Member</h2>
                                <form class="form-inline" method="POST" action="{{ route('checkout-create', $item->id) }}">
                                    @csrf
                                    <label for="username" class="sr-only">Name</label>
                                    <input type="text" name="username" class="form-control mb-2 mr-sm-2"
                                        id="inputUsername" placeholder="Username">

                                    <label for="nationality" class="sr-only">Nationality</label>
                                    <input type="text" name="nationality" style="width: 50px" class="form-control mb-2 mr-sm-2"
                                        id="inputUsername" placeholder="Nationality" required>
                                        

                                    <label for="is_visa" class="sr-only">Visa</label>
                                    <select name="is_visa" id="is_visa"  class="custom-select mb-2 mr-sm-2" required>
                                        <option value="" selected>VISA</option>
                                        <option value="1">30 DAYS</option>
                                        <option value="0">N/A</option>
                                    </select>

                                    <label for="doe_passport" class="sr-only"> DOE Passport</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input type="text" class="form-control datepicker" name="doe_passport"
                                            id="doePassport" placeholder="DOE Passport">
                                    </div>

                                    <button type="submit" class="btn btn-add-now mb-2 px-4"> Add Now</button>
                                </form>

                                <h3 class="mt-2 mb-0">Note<h3>
                                        <p class="disclaimer mb-0">
                                            Please select registered Nomads nember only.
                                        </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Checkout Informations </h2>
                            <table class="trip-informations">
                                <tr>
                                    <th width="50%"> Members</th>
                                    <td width="50%" class="text-right"> {{ $item->details->count() }} Persons </td>
                                </tr>
                                <tr>
                                    <th width="50%">Additional Visa</th>
                                    <td width="50%" class="text-right"> $ {{ $item->additional_visa }},00</td>
                                </tr>
                                <tr>
                                    <th width="50%"> Trip Price</th>
                                    <td width="50%" class="text-right">$ {{ $item->travel_package->price }},00 / person</td>
                                </tr>
                                <tr>
                                    <th width="50%">Sub Total</th>
                                    <td width="50%" class="text-right">$ {{ $item->transaction_total }},00 </td>
                                </tr>
                                <tr>
                                    <th width="50%">Total (+Unique)</th>
                                    <td width="50%" class="text-right text-total">
                                        <span class="text-blue"> $ {{ $item->transaction_total }},</span>
                                        <span class="text-orange"> {{ mt_rand(0,99) }} </span>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <h2> Payment Instructions</h2>
                            <p class="payment-instructions">
                                Please complete your payment before to
                                continue the wonderful trip
                            </p>
                            <div class="bank">
                                <div class="bank-item pb-3">
                                    <img src="{{ url('frontend/images/ic_bank.png') }}" alt="" class="bank-image">
                                    <div class="description">
                                        <h3>PT Nomads ID</h3>
                                        <p>
                                            0881 8829 8800
                                            <br>
                                            Bank Central Asia
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="bank-item pb-3">
                                    <img src="{{ url('frontend/images/ic_bank.png') }}" alt="" class="bank-image">
                                    <div class="description">
                                        <h3>PT Nomads ID</h3>
                                        <p>
                                            0891 222 8800
                                            <br>
                                            Bank HSBC
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="join-container">
                            <a href="{{ route('checkout-success', $item->id) }}" class="btn btn-block btn-join-now mt-3 py-2">I Have Made
                                Payment</a>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('detail',$item->travel_package->slug) }}" class="text-muted">
                                Cancel Booking
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('frontend/combined/css/gijgo.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('frontend/combined/js/gijgo.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap4',
                icons: {
                    rightIcon: '<img src="{{ url('frontend/images/ic_doe.png') }}" />'
                }
            })

        })
    </script>
@endpush
