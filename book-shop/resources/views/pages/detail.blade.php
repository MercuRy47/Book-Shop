<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$book->bk_title}}</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="flex items-center justify-center bg-gray-100 min-h-screen">
    <div class="w-full max-w-[960px] p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold text-center mb-6">{{ $book->bk_title }}</h1>
        <div class="card border border-gray-300 rounded-lg p-4 flex items-center space-x-4 shadow-md">
            <!-- รูปภาพอยู่ทางซ้าย -->
            <img src="{{ asset($book->bk_image_url) }}" alt="{{ $book->bk_title }}" class="w-70 h-100 object-cover rounded">
            
            <!-- ข้อความอยู่ทางขวา -->
            <div class="flex flex-col space-y-2 text-left">
                <p class="text-gray-700"><strong>Description:</strong> {{ $book->bk_description }}</p>
                <p class="text-gray-700"><strong>Author:</strong> {{ $book->bk_author }}</p>
                <p class="text-gray-700"><strong>Publisher:</strong> {{ $book->bk_publisher }}</p>
                <p class="text-gray-700"><strong>Genre:</strong> {{ $book->bk_genre }}</p>
                <p class="text-gray-700"><strong>Price:</strong> {{ number_format($book->bk_price, 2) }}$</p>
                <p class="text-gray-700"><strong>Stock:</strong> {{ $book->bk_stock }}</p>
            </div>
        </div>
    </div>
</body>

</html>