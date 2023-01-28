
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Access Control') }}
        </h2>
    </x-slot>

    <div class="w-full px-20  py-12 h-full py-100">
    

    <table class="w-full border-5 overflow-hidden shadow-lg rounded-xl">
        <tr class="">
            <th class="border text-center bg-slate-500 text-white py-2">User ID</th>
            <th class="border text-center bg-slate-500 text-white py-2">Name</th>
            <th class="border text-center bg-slate-500 text-white py-2">Email</th>
            <th class="border text-center bg-slate-500 text-white py-2">Position</th>
            <th class="border text-center bg-slate-500 text-white py-2">Delete</th>
            <th class="border text-center bg-slate-500 text-white py-2">Update</th>
        </tr>

        @foreach ($data as $val )
            <tr class="">
                <td class="border text-center py-2">{{ $val->my_id }}</td>
                <td class="border text-center py-2">{{ $val->name }}</td>
                <td class="border text-center py-2">{{ $val->email }}</td>
                <td class="border text-center py-2">{{ $val->masterusers_name }}</td>
                <td class="border text-center py-2"><button class="bg-red-500 text-white font-bold border-none outline-none px-5 py-2 rounded shadow-md"><i class="fa-solid fa-user-xmark"></i></button></td>
                <td class="border text-center py-2"><button class="bg-blue-500 text-white font-bold border-none outline-none px-5 py-2 rounded shadow-md"><i class="fa-solid fa-user-pen"></i></button></td>
            </tr>
        @endforeach
    </table>
    </div>
   
</x-app-layout>