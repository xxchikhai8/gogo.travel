@extends('layouts.enterprise')
@section('content')
@section('title', 'Plane List')
<div class="mb-3">
    <table>
        <tr>
            <th>Plane ID</th>
            <th>Type of Airplane</th>
            <th>Config</th>
        </tr>
        @foreach ($planes as $plane)
            <tr>
                <td>{{$plane->planeID}}</td>
                <td>{{$plane->planeType}}</td>
                <td></td>
            </tr>
        @endforeach
    </table>
</div>
@endsection

