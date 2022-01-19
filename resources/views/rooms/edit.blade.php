@extends('rooms.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Uređivanje sobe</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('rooms.index') }}"> Nazad</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">
                    <strong>Zgrada:</strong>
                    <input type="text" name="building" value="{{ $room->building }}" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <strong>Broj sobe:</strong>
                    <input type="text" name="room_number" value="{{ $room->room_number }}" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <strong>Broj kreveta:</strong>
                    <input type="text" name="number_of_beds" value="{{ $room->number_of_beds }}" class="form-control" placeholder="">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group form-check">
                        <strong>Klima:</strong>
                        <input type="checkbox" name="ac" class="form-check-input" @if($room->ac == 1) checked @endif>
                      </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group form-check">
                        <strong>Balkon:</strong>
                        <input type="checkbox" name="balcony" class="form-check-input" @if($room->balcony == 1) checked @endif>
                      </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group form-check">
                        <strong>Frižider:</strong>
                        <input type="checkbox" name="fridge" class="form-check-input" @if($room->fridge == 1) checked @endif>
                      </div>
                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Ažuriraj</button>
            </div>
        </div>

    </form>
@endsection