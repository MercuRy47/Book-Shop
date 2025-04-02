<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Storage</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center max-h-screen mt-[5rem]">
    <div class="w-full max-w-6xl p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold mb-4 text-center">List of books</h2>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-blue-500 text-white">
                    <th class="p-2 border">#</th>
                    <th class="p-2 border">Image</th>
                    <th class="p-2 border">ID</th>
                    <th class="p-2 border">Title</th>
                    <th class="p-2 border">Author</th>
                    <th class="p-2 border">Publisher</th>
                    <th class="p-2 border">Genre</th>
                    <th class="p-2 border">Price</th>
                    <th class="p-2 border">Stock</th>
                    <th class="p-2 border">Published Year</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($books as $index => $book)
                <tr class="border hover:bg-gray-100">
                    <td class="p-2 border text-center">{{ $index+1 }}</td>
                    <td class="p-2 border text-center"><img src="{{ $book->bk_image_url }}" alt="" class="rounded-[50px] w-[65px] h-[65px]"></td>
                    <td class="p-2 border text-center">{{ $book->bk_id }}</td>
                    <td class="p-2 border">{{ $book->bk_title }}</td>
                    <td class="p-2 border">{{ $book->bk_author }}</td>
                    <td class="p-2 border">{{ $book->bk_publisher }}</td>
                    <td class="p-2 border">{{ $book->bk_genre }}</td>
                    <td class="p-2 border text-right">{{ number_format($book->bk_price, 2) }}$</td>
                    <td class="p-2 border text-center">{{ $book->bk_stock }}</td>
                    <td class="p-2 border text-center">{{ $book->bk_published_year }}</td>
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
        <div class="d-flex justify-content-center pt-3">
            {{ $books->links() }}
        </div>

        <!-- Add Book Button -->
        <div class="flex justify-center mt-4">
            <a href="{{ url('/add') }}">
                <button class="w-[250px] px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Add Book</button>
            </a>
        </div>
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