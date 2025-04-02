<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="flex items-center justify-center bg-gray-100 min-h-screen">
    <div class="w-full max-w-[1350px] p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold text-center mb-6">Book Shop</h1>
        <h3 class="text-xl text-center mb-6"><strong>Your cart:</strong> {{ count(session('cart', [])) }}</h3>
        <div class="grid grid-cols-3 gap-6 p-6">
            @foreach ($books as $book)
            <div class="card border border-gray-300 rounded-lg p-4 text-center flex flex-col items-center shadow-md">
                <img src="{{ asset($book->bk_image_url) }}" alt="{{ $book->bk_title }}" class="w-32 h-40 object-cover mb-4 rounded">
                <p class="font-bold text-lg">{{ $book->bk_title }}</p>
                <p class="text-gray-700"><strong>Author:</strong> {{ $book->bk_author }}</p>
                <p class="text-gray-700"><strong>Publisher:</strong> {{ $book->bk_publisher }}</p>
                <p class="text-gray-700"><strong>Genre:</strong> {{ $book->bk_genre }}</p>
                <p class="text-gray-700"><strong>Price:</strong> {{ number_format($book->bk_price, 2) }}$</p>
                <p class="text-gray-700"><strong>Stock:</strong> {{ $book->bk_stock }}</p>
                <div class="mt-4 flex space-x-2">
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition"><a href="{{ route('addToCart', $book->bk_id) }}">Add to Cart</a></button>
                    <a href="{{ route('book.details', $book->bk_id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition">Learn More</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center pt-3">
            {{ $books->links() }}
        </div>         
    </div>
</body>
</html>