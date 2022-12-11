<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

        .insert{
            margin-left:40%;
            padding-top: 40px;
            padding-bottom: 40px;
        }
        .inser{

            background-color: #1C1C1E;
            color: white;
            border-radius: 10px;
            height: 30px;
            width: 100px;

        }
        .inser:hover{
            background-color:white;
            color: #1C1C1E;
        }
        .center{

            border-collapse: collapse;

    margin: 20px 450px;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        .delete{
            border-radius: 10px;
            background-color: 	#1C1C1E;
            color:white;
            height: 25px;
            width: 100px;


        }
        .delete:hover{
            background-color: red;
        }
        .update{
            border-radius: 10px;
            background-color: 	#1C1C1E;
            color:white;
            height: 25px;
            width: 100px;
        }
        .update:hover{
            background-color: white;
            color: #1C1C1E;
        }
        .sync{
            margin-left:40%;
            padding-top: 40px;
        }
        .sync_but{
            background-color: #0047AB;
            color: white;
            border-radius: 10px;
            height: 30px;
            width: 100px;
        }
        .sync_but:hover{
            background-color: blue;
        }
    </style>
</head>
<body>

<form method="get" action="{{url('inserts')}}" class="insert">
    <button type="submit" class="inser">insert data</button>
</form>
@foreach ($data as $x )
<table class="center">
    <tr>
        <td style="width:30% ">{{$x->data()['Fruit']}}</td>
        @csrf

    <td>
        @csrf
        <form method="get" action="{{url('delete',['id'=>$x->id()])}}">
            <button type="submit" class="delete">delete </button>
        </form>
        </td>
        <td>
            @csrf
            <form method="get" action="{{url('updat',['id'=>$x->id()])}}">
                <button type="submit" class="update">update </button>
            </form>
            </td>
    </tr>
</table>
@endforeach
<form method="get" action="{{url('sendmail')}}" class="sync">
    <button type="submit" class="sync_but">Sync</button>
</form>

</body>
