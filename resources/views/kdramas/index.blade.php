<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Kdramas</title>
    <style>
        body {
            background-color: yellow;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
            width: 900px;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <h1><center>Kdramas List</center></h1>
    <div>
        @if(session()->has('success'))
            <div div style="text-align: center; font-weight: bold; margin-top: 10px; font-size: 20px;">
                {{session('success')}}
            </div>
        @endif
    </div>
    <div>
        <div>
            <h2><a href="{{route('kdrama.create')}}"><center>Add a Kdrama here</center></a></h2>
        </div>
        <br>
        <table class="center">
            <tr>
                <th><center>ID</center></th>
                <th><center>Title</center></th>
                <th><center>Production</center></th>
                <th><center>Number of Episodes</center></th>
                <th><center>Start Date</center></th>
                <th><center>End Date</center></th>
                <th><center>Actions</center></th>
            </tr>
            @foreach($kdramas as $kdrama)
                <tr>
                    <td><center>{{$kdrama->id}}</center></td>
                    <td><center>{{$kdrama->title}}</center></td>
                    <td><center>{{$kdrama->production}}</center></td>
                    <td><center>{{$kdrama->episodes}}</center></td>
                    <td><center>{{$kdrama->start}}</center></td>
                    <td><center>{{$kdrama->end}}</center></td>
                    <td><center>
                        <form method="post" action="{{route('kdrama.edit', ['kdrama' => $kdrama])}}" style="display: inline-block;">
                            @csrf
                            @method('get')
                            <input type="submit" value="Edit" />
                        </form>
                        <!-- Gunakan fungsi confirm agar ada peringatan setelah menekan tombolnya, jadi datanya tidak langsung terhapus -->
                        <form method="post" action="{{route('kdrama.destroy', ['kdrama' => $kdrama])}}" style="display: inline-block;" onsubmit="return confirm('Confirm to delete this Kdrama?');">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" />
                        </form>
                    </center></td>
                </tr>
            @endforeach
        </table>
    </div>
    <h3><center>Note that the number of episodes for each Korean drama are excluding special episodes.</center></h3>
</body>
</html>