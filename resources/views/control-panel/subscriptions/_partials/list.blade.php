<table class="table table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Ascendant</th>
        <th>Subscriptions</th>
        <th>Controls</th>
    </tr>
    </thead>
    <tbody>
    {{--@if(!empty($subscriptions))--}}
    @foreach($ascendants as $ascendant)
        <tr>
            <td>{!! $ascendant->id !!}</td>
            <td>{!! $ascendant->name !!}</td>
            <td>{!! $ascendant->subscription->count()!!}</td>

        </tr>
    @endforeach
    {{--@endif--}}
    </tbody>
</table>