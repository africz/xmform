@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>History of {{$xmheader['symbol']}} {{ $xmheader['start_date'] }} from to {{ $xmheader['end_date'] }}</h1>
    </div>
    <div class="row">

        <div class="flex-center position-ref full-height" id="app">
            <div class="container">
                <?php //dd($xmbody->prices);
                ?>
                <table class="table">
                    <tr><td>Date</td><td>Open</td><td>High</td><td>Close</td><td>Volume</td></tr>
                    @foreach($xmbody->prices as $row)
                    <tr>
                        <td>
                            {{ $row->date }}
                        </td>
                        <td>
                            {{ $row->open }}
                        </td>
                        <td>
                            {{ $row->high }}
                        </td>
                        <td>
                            {{ $row->close }}
                        </td>
                        <td>
                            {{ $row->volume }}
                        </td>



                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </div>
</div>
@endsection