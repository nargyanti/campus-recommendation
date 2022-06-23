<table class="table">
    <thead>
        <tr>            
        <th scope="col">No</th>
        <th scope="col">User ID</th>
        @foreach ($criterias as $criteria)             
            <th scope="col">{{$criteria->name}}</th>
        @endforeach
        </tr>
    </thead>
    <tbody>     
        @foreach ($rankings as $ranking)
            @if($ranking->option == $option)
            <tr class="{{ ($ranking->utbk_score->user_id == Auth::user()->id) ? "table-active" : "" }}">
                <td>{{$ranking->ranking}}</td>
                <td>{{$ranking->utbk_score->user_id}}</td>
                @foreach ($criterias as $criteria)
                    @php $subject = $criteria->name @endphp
                    <td>{{$ranking->utbk_score->$subject}}</td>
                @endforeach          
            </tr>          
            @endif
        @endforeach                                
    </tbody>
</table>         