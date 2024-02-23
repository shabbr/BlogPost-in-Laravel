<!DOCTYPE html>
<html>
<head>
    <style>
        /* Style the table */
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }

        /* Add some padding and a border around the table cells */
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        /* Style the table header */
        th {
            background-color: #f2f2f2;
        }

        /* Add some hover effect on table rows */
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head><body>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
     
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("All Posts Data") }}
                </div>
            </div>
        </div>
    </div>
    

    

    <body>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Title</th>
            <th>Post</th>
          @can('IsAdmin')
          <th>Actions</th>
          @endcan  
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $val)
        <tr>
            
            <td> {{ $val->id}} </td>
            <td> {{$val->user->name}} </td>
    <td> {{$val->title}} </td>
  
    <td> {{$val->body}} </td>
    @can('IsAdmin') 
     <td> <a href="{{route('edit',[$val->id])}}">Update</a> <a href=" {{route('delete',['id' => $val->id ])}} ">Delete</a> </td>
            @endcan     
          </tr>
        @endforeach
        </x-app-layout>
    </body>
    </html>




