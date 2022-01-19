@extends('rooms.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Prikaz sobe</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('rooms.index') }}"> Nazad</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Zgrada:</strong>
                {{ $room->building }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Broj sobe:</strong>
                {{ $room->room_number }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Broj kreveta:</strong>
                {{ $room->number_of_beds }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Klima:</strong>
                @if($room->ac == 1)
                    DA
                @else
                    NE
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Balkon:</strong>
                @if($room->balcony == 1)
                    DA
                @else
                    NE
                @endif
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Frižider:</strong>
                @if($room->fridge == 1)
                    DA
                @else
                    NE
                @endif
            </div>
        </div>


    </div>
@endsection