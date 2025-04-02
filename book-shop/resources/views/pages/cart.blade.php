<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your cart</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center max-h-screen mt-[5rem]">
    <div class="w-full max-w-6xl p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold mb-4 text-center">Cart</h2>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-blue-500 text-white">
                    <th class="p-2 border">#</th>
                    <th class="p-2 border">Title</th>
                    <th class="p-2 border">Price</th>
                    <th class="p-2 border">Amount</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($books as $index => $book)
                <tr class="border hover:bg-gray-100">
                    <td class="p-2 border text-center">{{ $index+1 }}</td>
                    <td class="p-2 border">{{ $book->bk_title }}</td>
                    <td class="p-2 border text-right">{{ number_format($book->bk_price, 2) }}$</td>
                    <td class="p-2 border text-center">{{ $cart[$book->bk_id] }}</td>
                    <td class="p-2 border text-center">
                        <div class="flex justify-center items-center space-x-2">
                            <a href="{{ route('edit', $book->bk_id) }}" class="inline-block">
                                <button class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">Edit</button>
                            </a>
                            <form id="delete-form" action="{{ route('delete', $book->bk_id) }}" method="POST" class="inline-block" onclick="confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $book->bk_id }}">
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-blue-500 text-white">
                    <th class="p-2 border">Total</th>
                    <th class="p-2 border">{{ $books->sum(fn($book) => $book->bk_price * $cart[$book->bk_id]) * 35 }} Bath</th>
                </tr>
            </thead>
        </table>

        <!-- Add Book Button -->
        <form action="{{ url('/cart/checked') }}" method="POST">
            @csrf
            <div class="flex justify-center mt-4">
                <button type="submit" class="w-[250px] px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Check out</button>
            </div>
        </form>

    </div>

    <script>
        function confirmDelete() {
            if (confirm('Are you sure you want to delete this book?')) {
                document.getElementById('delete-form').submit();
            }
        }
    </script>
</body>
</html>