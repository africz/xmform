@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>XM Form Task</h1>
    </div>
    <div class="row">
        <form action="/submit" method="post">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                Please fix the following errors
            </div>
            @endif
            <div class="form-group">
                <label for="company_symbol">Company Symbol</label>
                <input type="text" class="form-control @error('company_symbol') is-invalid @enderror" id="company_symbol" name="company_symbol" placeholder="Company Symbol" value="{{ old('company_symbol') }}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group date" data-provide="datepicker">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" placeholder="Start Date" value="{{ old('start_date') }}">
                @error('start_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="end_date">Start Date</label>
                <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" placeholder="Start Date" value="{{ old('end_date') }}">
                @error('end_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection