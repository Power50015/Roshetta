<x-app-layout>
    @if (Session::has('success'))
    <div class="bg-green-500 rounded text-white text-center py-3 text-lg">{{ Session::get('success') }}</div>
    @endif
    <form action="{{route('doctor.search')}}" method="post" class="container mx-auto my-5">
        @csrf
        <div class="p-4 flex flex-col items-center justify-center ">
            <div class="flex w-full items-center">
                <label for="specialty" class="w-2/6 ">التخصص</label>
                <select name="specialty" id="specialty" class="w-full rounded">
                    <option value="">الكل</option>
                    <option value="امراض باطنه">امراض باطنه</option>
                    <option value="اسنان">اسنان</option>
                    <option value="عظام">عظام</option>
                    <option value="علاج طبيعى">علاج طبيعى</option>
                </select>
            </div>
            <div class="flex w-full items-center mt-4">
                <label for="area" class="w-2/6">المنطقه</label>
                <select name="area" id="area" class="w-full rounded">
                    <option value="">الكل</option>
                    <option value="القاهرة">القاهرة</option>
                    <option value="الجيزه">الجيزه</option>
                    <option value="اسكندريه">اسكندريه</option>
                </select>
            </div>

            <button type="submit" class="btn-main mt-8 mx-5 w-96">بحث</button>
        </div>
    </form>
    <section class="w-full top-doctor bg-gray-200 py-9">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8 my-9">
                @forelse($doctors as $doctor)
                @if($doctor->Clinc->isNotEmpty())
                <a href="/doctorprofile/{{$doctor->id}}" class="group">
                    <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                        <img src=" {{$doctor->profile_photo_url}}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="w-full h-96 object-center object-cover group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-lg text-gray-700">
                        {{$doctor->name}}
                    </h3>
                    <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        {{$doctor->specialty}}
                    </p>

                    @forelse($doctor->Clinc->unique('area')->values()->all() as $Clinc)
                    <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-sky-100 text-green-800">
                        {{$Clinc->area}}
                    </p>
                    @empty
                    @endforelse
                </a>
                @endif
                @empty
                لا يوجد أطباء
                @endforelse
            </div>
        </div>
    </section>
</x-app-layout>