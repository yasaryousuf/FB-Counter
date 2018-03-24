@extends('user.master')
@section('title')
Invoice
@endsection
@section('style')

@endsection
@section('body')
<table>
    @foreach ($invoices as $invoice)
        <tr>
            <td>{{ $invoice->date()->toFormattedDateString() }}</td>
            <td>{{ $invoice->total() }}</td>
            <td><a href="/user/invoice/{{ $invoice->id }}">Download</a></td>
        </tr>
    @endforeach
</table>
@endsection

@section('script')

@endsection