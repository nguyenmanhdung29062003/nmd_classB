<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            margin-top: 30px;
        }

        th,
        td {
            padding: 12px 16px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e6e6e6;
        }

        .name {
            font-weight: bold;
            color: #333;
        }

        .description {
            font-size: 14px;
            color: #666;
        }

        #add {
            padding: 12px 16px;
            background-color: #060f06;
            color: white;
            margin: 20px 0px;
            border-radius: 5px;
            text-decoration: none;
        }


        .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-bar {
            width: 400px;
            position: relative;
        }

        .search-bar input[type=text] {
            width: 100%;
            padding: 12px 40px 12px 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .search-bar button {
            position: absolute;
            top: 0;
            right: -90px;
            padding: 14px 40px;
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
        }

        .search-bar button:hover {
            background-color: #45a049;
        }

        #notFound{
            color: red;
            font-size: 20px;
            font-weight: bolder;
        }

    </style>


    <div class="search-container">
        <form class="search-bar" action="{{ route('category.find') }}" method="GET">
            @csrf
            <input type="text" placeholder="Tìm kiếm..." name="input">
            <button type="submit">Tìm</button>
        </form>
    </div>

    <a href=" {{ route('category.createForm') }} " id="add">Add Category</a>

    @if ($item->isEmpty())
        <p id="notFound">Không tìm thấy kết quả nào.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($item as $category)
                    <tr>
                        <td><span class="name">{{ $category->name }}</span></td>
                        <td>
                            <p class="description">{{ $category->describe }}</p>
                        </td>
                        <td><a href="{{ route('category.edit', $category->id) }}" id="edit">edit</a></td>
                        <td><a href="{{ route('category.delete', $category->id) }}" id="edit">delete</a></td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    @endif


</body>

</html>
