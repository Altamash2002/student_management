<x-app-layout>
    <div class="py-12">
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


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="search" style="text-align: center; margin-bottom: 20px; padding: 0px 5px;">
                <form action="" method="get" class="search-form">
                    <div class="search-input-container" style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                        <input 
                            type="text" 
                            name="search" 
                            value="{{@$search}}" 
                            placeholder="Search Name..." 
                            class="search-input"
                        >
                        <button type="submit" class="search-btn">Search</button>
                    </div>
                </form>
            </div>
            <!-- Add New Student Button -->
            <div class="add" style="margin-bottom: 20px; text-align: right; padding: 0px 5px;">
                <a href="/add-student" class="add-btn">Add New Student</a>
            </div>

            <div class="bg-white shadow-lg rounded-lg">
                <div class="p-6">
                    <div class="table-container">
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th>Roll No.</th>
                                    <th>Name</th>
                                    <th>City</th>
                                    <th style="min-width: 200px;">Details</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{ $student->roll_no }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->city }}</td>
                                        <td>{{ $student->detail }}</td>
                                        <td class="text-center"><a href="{{'/student/edit/'.$student->roll_no}}">✏️</a></td>
                                        <td class="text-center"><a href="{{'/student/delete/'.$student->roll_no}}">✖</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add custom styles -->
    <style>
        /* Add New Student Button Styling */
        .add-btn {
            display: inline-block;
            background-color: #4caf50;
            color: white;
            text-decoration: none;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        /* Hover effect for the button */
        .add-btn:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        /* Table container for responsiveness */
        .table-container {
            overflow-x: auto;
        }

        /* Base table styling */
        .responsive-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
            font-size: 14px;
        }

        /* Header styling */
        .responsive-table thead th {
            background-color: #333;
            color: white;
            text-align: left;
            padding: 12px;
            border: 1px solid black;
        }

        /* Body cell styling */
        .responsive-table tbody td {
            padding: 10px;
            border: 1px solid black;
            text-align: left;
        }

        .responsive-table tbody td a{
            text-decoration: none;
        }

        /* Zebra stripes for rows */
        .responsive-table tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .responsive-table tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        /* Hover effect for rows */
        .responsive-table tbody tr:hover {
            background-color: #e2e8f0;
        }

        /* Center align specific columns */
        .text-center {
            text-align: center;
        }

        /* search form styling */
        .search-form {
            display: inline-block;
            width: 100%;
        }

        /* Container for the search input and button */
        .search-input-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        /* Search input field */
        .search-input {
            padding: 10px;
            font-size: 14px;
            width: 300px;  /* Adjust width to your preference */
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        /* Search input focus effect */
        .search-input:focus {
            border-color: #4caf50;
        }

        /* Search button styling */
        .search-btn {
            padding: 10px 20px;
            font-size: 14px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        /* Hover effect for the button */
        .search-btn:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

    </style>
</x-app-layout>
