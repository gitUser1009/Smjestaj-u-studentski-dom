@extends('rooms.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Prikaz soba</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('rooms.create') }}"> Kreiraj sobu</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Zgrada</th>
            <th>Broj sobe</th>
            <th>Broj kreveta</th>
            <th>Klima</th>
            <th>Balkon</th>
            <th>Frižider</th>
            <th width="280px">Uređivanje soba</th>
        </tr>
        @foreach ($rooms as $room)
        <tr>
            <td>{{ $room->id }}</td>
            <td>{{ $room->building }}</td>
            <td>{{ $room->room_number }}</td>
            <td>{{ $room->number_of_beds }}</td>
            <td>@if($room->ac == 1) DA @else NE @endif</td>
            <td>@if($room->balcony == 1) DA @else NE @endif</td>
            <td>@if($room->fridge == 1) DA @else NE @endif</td>
            <td>
                <form action="{{ route('rooms.destroy',$room->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('rooms.show',$room->id) }}">Prikaži</a>
                    <a class="btn btn-primary" href="{{ route('rooms.edit',$room->id) }}">Ažuriraj</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Izbriši</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    {{ $rooms->links() }}

@endsection