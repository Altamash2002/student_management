<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        @if(session('msg'))
        <div id="alert" style="margin-left:20px; margin-right:20px; display: flex; align-items: center; justify-content: space-between; background-color: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 10px 15px; border-radius: 5px; margin-bottom: 15px;">
            <p style="margin: 0; font-size: 14px; font-weight: bold;">{{ session('msg') }}</p>
            <button
                type="button"
                style="background: none; border: none; font-size: 16px; color: #155724; cursor: pointer;"
                onclick="document.getElementById('alert').remove()"
            >
                ✖
            </button>
        </div>
        @endif
        <div class="bg-white shadow-lg rounded-lg w-96 p-6">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Add New Student</h2>
            </div>
    
            <div class="form-container">
                <form action="/add" method="post" class="space-y-4">
                    @csrf
                    <div>
                        <input 
                            type="number" 
                            name="roll_no" 
                            placeholder="Enter Student's Roll Number" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-gray-800"
                            value="{{old('roll_no')}}"
                        >
                        @error('roll_no')
                            <div style="color: red;">{{$message}}</div>
                        @enderror
                    </div>
    
                    <div>
                        <input 
                            type="text" 
                            name="name" 
                            placeholder="Enter Full Name" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-gray-800"
                            value="{{old('name')}}"
                        >
                        @error('name')
                            <div style="color: red;">{{$message}}</div>
                        @enderror
                    </div>
    
                    <div>
                        <input 
                            type="text" 
                            name="city" 
                            placeholder="Enter City" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-gray-800"
                            value="{{old('city')}}"
                        >
                        @error('city')
                            <div style="color: red;">{{$message}}</div>
                        @enderror
                    </div>
    
                    <div>
                        <textarea 
                            name="detail" 
                            placeholder="Enter Description" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-gray-800"
                            rows="4"
                        >{{old('detail')}}</textarea>
                        @error('detail')
                            <div style="color: red;">{{$message}}</div>
                        @enderror
                    </div>
    
                    <div>
                        <button 
                            type="submit" 
                            class="w-full bg-gray-800 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300"
                        >
                            Save
                        </button>
                    </div>
                    <div style="text-align:center;">
                        <a style='text-align:center;' href="/dashboard">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</body>
</html>