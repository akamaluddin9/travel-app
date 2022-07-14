@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Transaction {{ $item->title }}</h1>
        </div>

        {{-- Error Handling --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Submission Form --}}
        <div class="card-shadow">
            <div class="card-body">
                <form action="{{ route('transaction.update',  $item-> id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="transaction_status"> Status </label>
                    <select name="transaction_status" required class = "form-control" >
                        <option value="{{ $item->transaction_status }}">
                        Please Do Not Select ({{ $item->transaction_status }})
                        <option value="PENDING">Pending</option>
                        <option value="SUCCESS">Success</option>
                        <option value="CANCEL">Cancel</option>
                        <option value="FAILED">Failed</option>

                        </option>
                    </select>
                </div>
               
                <button type="Submit" class="btn btn-primary btn-block"> Update </button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
