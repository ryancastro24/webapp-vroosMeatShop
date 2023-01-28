<div>


  

   <form action="" class="bg-white p-10 rounded-xl shadow-lg" wire:submit.prevent="addAnnouncement">
    @csrf
    <div class="flex gap-10 mb-6">
    <input type="text" class="w-80 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"placeholder="Enter header" wire:model="headerData">
    <input type="text" class="w-80 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm "placeholder="Enter sub-header" wire:model="sub_headerData">
    <select wire:model="user_idData" name="" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="">
        @foreach ($masterusersopt as $masteruserval )
            <option value="{{ $masteruserval->id }}">{{ $masteruserval->masterusers_name }}</option>
        @endforeach
    </select>
    </div>
    <textarea class="w-full h-28 rounded-md resize-none border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" name="" id="" cols="30" rows="10" placeholder="Enter text" wire:model="desData">
    </textarea>

    <img src="{{ $image }}" alt="" class="w-40 mt-10">
    <div class="mt-10 flex justify-between">

    
    <input id="image" type="file" wire:change="$emit('fileChoosen')">
    <button class="px-5 py-2 bg-red-600 text-white border-none rounded outline-none font-bold text-lg" type="submit"> Add <i class="fa-solid fa-plus"></i></button>
    </div>
   </form>
   <div>
    @if (session()->has('message'))
        <div class="flex items-center p-9 bg-green-400 text-white" x-data x-init="setTimeout(() => {
            $el.remove()
          },2000);">
            {{ session('message') }}
        </div>
    @endif


    @if (session()->has('rmmessage'))
        <div class="flex items-center p-9 bg-green-400 text-white" x-data x-init="setTimeout(() => {
            $el.remove()
          },2000);">
            {{ session('rmmessage') }}
        </div>
    @endif


</div>


@forelse ($announcementData  as  $value)
<div class="w-full p-10 bg-blue-500 my-10 rounded-xl text-white relative" wire:key="{{ $value->id }}">
    <h1 class="text-5xl font-bold">{{ $value->header }}</h1>
    <h2 class="text-2xl mb-10">{{ $value->sub_header }}</h2>
    <p>{{ $value->description }}</p>
    
    <div class="absolute right-10 top-5 flex justify-center items-center gap-5">
    <button wire:click="removeAnnouncement({{ $value->id }})"><i class="duration-500 fa-solid fa-xmark  hover:text-slate-800 text-2xl"></i></button>
    <button><i class="duration-500 fa-solid fa-pen-to-square hover:text-slate-800  text-xl"></i></button>
    </div>
    </div> 
@empty
<div class="w-full bg-slate-200 h-20 mt-10 flex justify-center items-center text-lg rounded-md">
    <h1 class="opacity-75">No Data Available</h1>
</div>
@endforelse


   {{ $announcementData->links() }}
   
</div>

<script>
 
 
 Livewire.on('fileChoosen', () => {


              let inputField = document.getElementById('image');
              let file = inputField.files[0];
              let reader = new FileReader();
  
              reader.onloadend = () =>{
                Livewire.emit('fileUpload',reader.result)
              }
  
              reader.readAsDataURL(file);
              
          })

</script>