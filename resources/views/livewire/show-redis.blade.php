<div>
@foreach ($logs as $date=>$log)
    <p>{{ $date }} : {{ $log }}</p>
@endforeach
</div>
