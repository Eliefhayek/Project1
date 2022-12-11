<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
@if($order)
<form method="post" action="{{url('updating')}}">
@csrf
<input value={{$order->data()['Fruit']}} name="fruit">
<input type="hidden" value="{{$order->id()}}" name="id">
<button type="submit">update</button>
</form>
@endif
