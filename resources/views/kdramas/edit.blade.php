<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kdrama</title>
    <style>
        body {
            background-color: yellow;
        }

        form {
            width: 50%;
            margin: auto;
            padding: 20px;
            background-color: yellow;
        }

        input[type="text"] {
            width: 80%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid gray;
        }

        input[type="number"] {
            width: 80%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid gray;
        }

        input[type="date"] {
            width: 80%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid gray;
        }

        input[type="submit"] {
            width: 50%;
            padding: 10px;
            font-size: 16px;
            background-color: darkblue;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: darkblue;
        }
    </style>
</head>
<body>
    <h1><center>Edit a Kdrama</center></h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{($error)}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('kdrama.update', ['kdrama' => $kdrama])}}">
        <!-- placeholder adalah tulisan yang muncul ketika form yang harus diisi dalam keadaan kosong -->
        @csrf
        @method('put')
        <div><center>
            <label>Title</label><br>
            <input type="text" name="title" placeholder="Title" value="{{$kdrama->title}}" />
        </center></div>
        <br>
        <div><center>
            <label>Production</label><br>
            <input type="text" name="production" placeholder="Production" value="{{$kdrama->production}}" />
        </center></div>
        <br>
        <div><center>
            <label>Number of Episodes</label><br>
            <input type="number" name="episodes" placeholder="Episodes" value="{{$kdrama->episodes}}" />
        </center></div>
        <br>
        <div><center>
            <label>Start Date</label><br>
            <input type="date" name="start" placeholder="Start" value="{{$kdrama->start}}" />
        </center></div>
        <br>
        <div><center>
            <label>End Date</label><br>
            <input type="date" name="end" placeholder="End" value="{{$kdrama->end}}" />
        </center></div>
        <br>
        <div><center>
            <input type="submit" value="Update Kdrama" />
        </center></div>
    </form>
    <h2><a href="{{route('kdrama.index')}}"><center>Back to Kdramas list</center></a></h2>
</body>
</html>
