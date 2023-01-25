<div>


   <form action="" class="bg-white p-10 rounded-xl shadow-lg" wire:submit.prevent="addAnnouncement">
    <div class="flex gap-10 mb-6">
    <input type="text" class=" w-80 rounded px-3 "placeholder="header" wire:model="headerData">
    <input type="text" class=" w-80 rounded px-3 "placeholder="sub-header" wire:model="sub_headerData">
    <input type="number" class=" w-32 rounded px-3 "placeholder="user_id" wire:model="user_idData">
    </div>
    <textarea class="w-full h-28 rounded-md resize-none" name="" id="" cols="30" rows="10" placeholder="enter text" wire:model="desData">
    </textarea>
    <div class="mt-10">
    <input type="file" wire:model="imageData">
    <button class="w-20 h-9 bg-red-600 text-white border-none rounded outline-none" type="submit">Add</button>
    </div>
   </form>

   @foreach ($announcementData as $value )
   
   <div class="w-full p-10 bg-blue-400 my-10 rounded-xl">
    <h1 class="text-4xl font-bold">{{ $value->header }}</h1>
    <h2 class="text-2xl mb-10">{{ $value->sub_header }}</h2>
    <p>{{ $value->description }}</p>
   </div>
       
   @endforeach
   {{ $announcementData->links() }}
   
</div>
