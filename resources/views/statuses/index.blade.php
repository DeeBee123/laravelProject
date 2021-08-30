@extends('layouts.app')
@section('content')

{{-- <form class="form-inline" action="{{route('father.index')}}" method="GET">
    <select  name="title" id="" class="form-control">
        <option value="Mr" >Mr</option>
        <option value="Mrs">Mrs</option>
        <option value="Miss">Miss</option>

    </select>
    <button type="submit" class="btn btn-dark" style="margin-left: 7px">Filter</button>
</form> --}}
{{-- <div class="card-body">
    <label>Pasirinkite šalį klientų filtravimui:</label>
    <form class="form-inline" action="{{ route('customers.index') }}" method="GET">
        <select name="country_id" id="" class="form-control">
            <option value="" selected>Visos</option>
            @foreach ($countries as $country)
            <option value="{{ $country->id }}"
                @if($country->id == app('request')->input('country_id'))
                    selected="selected"
                @endif>{{ $country->title }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Filtruoti</button>
    </form>
</div> --}}
    <div class="card-body table-responsive-sm">
        <table class="table table-hover table-light">
            <tr>

                <th>Name</th>

            </tr>
            @foreach ($statuses as $status)
                <tr>
                    <td>{{ $status->name }}</td>

                    <td>
                        <form action={{ route('status.destroy', $status->id) }} method="POST">
                            <a href="{{ route('status.edit', $status->id) }}" class="btn btn-info">Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">

                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('status.create') }}" class="btn btn-dark">Add</a>
        </div>
    </div>
@endsection
