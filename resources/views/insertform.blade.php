<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<form method="post" action="{{url('insert')}}">
    @csrf
    <input value="" name="stat">
    <button type="submit">insert data</button>
</form>
