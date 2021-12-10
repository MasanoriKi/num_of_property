@extends('common.layout')

@section('content')

    <div class="count pt-1 pb-3">
        @foreach($data  as $item)
            @foreach($item  as $d)
            <div class="d-flex pt-1">
                <div class="row">
                    <div class="col pre">
                        {{$d->city}}
                    </div>
                </div>
                <div class="row">
                    <div class="col cou">
                        {{$d->count}}
                    </div>
                </div>
            </div>
            @endforeach
        @endforeach
    </div>

@endsection