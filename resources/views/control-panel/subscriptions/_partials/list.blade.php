<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th style="text-align: center">Ascendant</th>
        <th style="text-align: center">Subscriptions</th>
        <th style="text-align: center">UnSubscriptions</th>
    </tr>
    </thead>
    <tbody>
    {{--@if(!empty($subscriptions))--}}
    @foreach($ascendants as $ascendant)
        <tr>
            <td>{!! $ascendant->id !!}</td>
            <td>{!! $ascendant->name !!}</td>
            <td style="text-align: center">{!! $ascendant->subscriptions->where('status','REGISTERED')->count()!!}</td>
            <td style="text-align: center">{!! $ascendant->subscriptions->where('status','UNREGISTERED')->count()!!}</td>
        </tr>
    @endforeach
    <tr class="active">
        <td></td>
        <th style="text-align: center">Total</th>
        <th style="text-align: center">{{\App\Subscription::where('status', 'REGISTERED')->count()}}</th>
        <th style="text-align: center">{{\App\Subscription::where('status', 'UNREGISTERED')->count()}}</th>
    </tr>

    {{--@endif--}}
    </tbody>
</table>