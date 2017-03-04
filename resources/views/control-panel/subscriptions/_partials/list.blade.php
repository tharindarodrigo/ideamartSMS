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
            <td style="text-align: center">{!! $ascendant->subscriptions->where('status','SUBSCRIBED')->count()!!}</td>
            <td style="text-align: center">{!! $ascendant->subscriptions->where('status','UNSUBSCRIBED')->count()!!}</td>
        </tr>
    @endforeach
    <tr class="active">
        <td></td>
        <th style="text-align: center">Total</th>
        <th style="text-align: center">{{\App\Subscription::where('status', 'SUBSCRIBED')->count('id')}}</th>
        <th style="text-align: center">{{\App\Subscription::where('status', 'UNSUBSCRIBED')->count('id')}}</th>
    </tr>

    {{--@endif--}}
    </tbody>
</table>