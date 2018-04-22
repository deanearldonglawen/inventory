@extends('layouts.app')
@section('styles')

    <style>
        @import "https://fonts.googleapis.com/css?family=Montserrat:300,400,700";
        .rwd-table {
            margin: 1em 0;
            min-width: 300px;
        }
        .rwd-table tr {
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
        }
        .rwd-table th {
            display: none;
        }
        .rwd-table td {
            display: block;
        }
        .rwd-table td:first-child {
            padding-top: .5em;
        }
        .rwd-table td:last-child {
            padding-bottom: .5em;
        }
        .rwd-table td:before {
            content: attr(data-th) ": ";
            font-weight: bold;
            width: 6.5em;
            display: inline-block;
        }
        @media (min-width: 480px) {
            .rwd-table td:before {
                display: none;
            }
        }
        .rwd-table th, .rwd-table td {
            text-align: left;
        }
        @media (min-width: 480px) {
            .rwd-table th, .rwd-table td {
                display: table-cell;
                padding: .25em .5em;
            }
            .rwd-table th:first-child, .rwd-table td:first-child {
                padding-left: 0;
            }
            .rwd-table th:last-child, .rwd-table td:last-child {
                padding-right: 0;
            }
        }

        h1 {
            font-weight: normal;
            letter-spacing: -1px;
            color: #34495E;
        }

        .rwd-table {
            background: #34495E;
            color: #fff;
            border-radius: .4em;
            overflow: hidden;
        }
        .rwd-table tr {
            border-color: #46637f;
        }
        .rwd-table th, .rwd-table td {
            margin: .5em 1em;
        }
        @media (min-width: 480px) {
            .rwd-table th, .rwd-table td {
                padding: 1em !important;
            }
        }
        .rwd-table th, .rwd-table td:before {
            color: #dd5;
        }
        .red_blink {
            background-color: indianred;
            animation: blinker 1s linear infinite;
        }

        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }

    </style>
    @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">Items</div>
                    <div class="card-body">
                        <a href="{{ url('/items/create') }}" class="btn btn-success btn-sm" title="Add New Item">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="rwd-table col-md-12">
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Unit Of Measure</th>
                                        <th>Current Stock</th>
                                        <th>Order Period</th>
                                        <th>Selling Price</th>
                                        <th>Remarks</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    @if($item->opening <= $item->safety_stock)
                                    <tr class="red_blink">
                                        <td>{{ $item->item_name }}</td>
                                        <td>{{ $item->unit_of_measure }}</td>
                                        <td>{{  $item->opening . ' ' . $item->unit_of_measure }}</td>
                                        <td>{{ $item->order_period }}</td>
                                        <td>Php {{ $item->sale }}</td>
                                        <td>{{ $item->remarks }}</td>
                                        <td>
                                            <a href="{{ url('/items/' . $item->id) }}" title="View Item"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/items/' . $item->id . '/edit') }}" title="Edit Item"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/items' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Item" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @else
                                        <tr>
                                            <td>{{ $item->item_name }}</td>
                                            <td>{{ $item->unit_of_measure }}</td>
                                            <td>{{ $item->opening . ' ' . $item->unit_of_measure }}</td>
                                            <td>{{ $item->order_period }}</td>
                                            <td>Php {{ $item->sale }}</td>
                                            <td>{{ $item->remarks }}</td>
                                            <td>
                                                <a href="{{ url('/items/' . $item->id) }}" title="View Item"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                <a href="{{ url('/items/' . $item->id . '/edit') }}" title="Edit Item"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                                <form method="POST" action="{{ url('/items' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Item" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $items->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
