<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <form action="{{ route('update', $book->bk_id) }}" method="POST" class="bg-white p-8 rounded-lg shadow-md w-[640px]">
            @csrf
            @method("PUT")
            <h2 class="text-2xl font-bold text-center mb-6">Register</h2>
            
            <!-- Row 1: Title, Author -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="title" class="block text-gray-700 font-medium">Title</label>
                    <input type="text" name="title" id="title" value="{{ $book->bk_title }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label for="author" class="block text-gray-700 font-medium">Author</label>
                    <input type="text" name="author" id="author" value="{{ $book->bk_author }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
            </div>
    
            <!-- Row 2: Publisher, Genre -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="publisher" class="block text-gray-700 font-medium">Publisher</label>
                    <input type="text" name="publisher" id="publisher" value="{{ $book->bk_publisher }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label for="genre" class="block text-gray-700 font-medium">Genre</label>
                    <input type="text" name="genre" id="genre" value="{{ $book->bk_genre }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
            </div>
    
            <!-- Row 3: Price, Stock, Published Year -->
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="price" class="block text-gray-700 font-medium">Price</label>
                    <input type="number" name="price" id="price" value="{{ $book->bk_price }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label for="stock" class="block text-gray-700 font-medium">Stock</label>
                    <input type="number" name="stock" id="stock" value="{{ $book->bk_stock }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label for="published_year" class="block text-gray-700 font-medium">Published Year</label>
                    <input type="text" name="published_year" value="{{ $book->bk_published_year }}" id="published_year" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
            </div>
    
            <!-- Row 4: Description -->
            <div class="grid grid-cols-1 gap-4 mb-4">
                <div>
                    <label for="description" class="block text-gray-700 font-medium">Description</label>
                    <textarea name="description" id="description" class="w-full h-[100px] px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">{{ $book->bk_description }}</textarea>
                </div>
            </div>
    
            <div class="grid grid-cols-2 gap-4 mb-4">
                <!-- Submit Button -->
                <button type="submit" class="w-[250px] mx-auto bg-green-500 text-white py-2 rounded-lg hover:bg-green-600 transition">Confirm</button>
    
                <!-- Cancel Button as Link -->
                <a href="{{ url('/storage') }}" class="w-[250px] mx-auto block text-center bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition">Cancel</a>
            </div>    
        </form>
    </div>    
</body>
</html>