<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form action="{{ route('sendData') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" id="id" value="{{ Auth::user()->id }}">
                <input type="text" name="productName" id="productName" placeholder="Product Name">
                <input type="text" name="productPrize" id="productPrize" placeholder="Product Prize">
                <input type="date" name="productDateExpected" id="productDateExpected">
                <x-primary-button type="submit">
                    Submit
                </x-primary-button>
            </form>

  
             
          
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
               

                
                    
                    <table class="w-full  border-2">
                        <tr class="border-2">
                        
                            <th class="border=2 bg-slate-500 text-white">Order Name</th>
                            <th class="border=2 bg-slate-200">Order Prize</th>
                            <th class="border=2 bg-slate-500 text-white">Date  Ordered</th>
                            <th class="border=2 bg-slate-200">Expected Arrival</th>
                         
                    @foreach ($data as $val )
                        @if (Auth::user()->id == $val->user_id)
                            
                        <tr class="text-center">
                            <td class="border-2">{{ $val->productName }}</td>
                            <td class="border-2">{{ $val->productPrize }}</td>
                            <td class="border-2">{{ $val->created_at }}</td>
                            <td class="border-2">{{ $val->productDateExpected }}</td>
                        </tr>


                        @endif

                        @endforeach
                    </table>
               

            
            </div>
        </div>
    </div>
</x-app-layout>
