<x-app-layout>
    <section class="w-full top-doctor bg-gray-200 py-9">
        <div class="container mx-auto">
            <div class="grid grid-cols-2">
                <div class="mx-3">
                    <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                        <img src=" {{$doctor->profile_photo_url}}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="w-full h-[750px] object-center object-cover group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-2xl text-gray-700">
                        {{$doctor->name}}
                    </h3>
                    <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        {{$doctor->specialty}}
                    </p>
                </div>
                <div class="grid grid-rows-2 gap-4">
                    @forelse($schedules as $schedule)
                    <div class="group">
                        <div class="py-5 text-center w-full aspect-w-1 aspect-h-1 bg-gray-300 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                            <h2 class="text-3xl">{{$schedule->Clinc->area}}</h2>
                            <h2 class="text-lg">{{$schedule->Clinc->address}}</h2>
                            <h2 class="text-2xl text-red-600 font-black">{{$schedule->day}}</h2>
                            <ul class="flex justify-center">
                                <li>من :{{$schedule->from}}</li>
                                <li>إلى : {{$schedule->to}}</li>
                            </ul>
                            <form action="" method="post">
                                <button type="submit" class="btn-second mt-5">حجز</button>
                            </form>
                        </div>

                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</x-app-layout>