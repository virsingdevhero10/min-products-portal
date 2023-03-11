

<!DOCTYPE html>
<html>
<head>
    <title>PDF</title>
</head>
<body>
   <h1 style="color:red">{{$data['title']}}</h1>
    <p>{{$data['date']}}</p>
    <table width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Images</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$productArr->product_name}}</td>
                <td>{{ Str::limit($productArr->description, 50)}}</td>
                <td>{{$productArr->price}}</td>
                <td>
                    @foreach ($productArr->product_images as $key => $img)
                    <img src="{{ public_path('product_images/' . $img->name) }}" width="100" height="100"> 
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>