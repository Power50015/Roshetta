<x-app-layout>
    {{--
    {{Auth::guard('doctor')->check()}}
    {{Auth::user()}}
    --}}
    <div class="container mx-auto my-6 md:w-[700px]">
        <h2 class="text-5xl underline font-bold mb-5"> أضف عيادتك</h2>
        @if (Session::has('success'))
        <div class="bg-green-500 rounded text-white text-center py-3 text-lg">{{ Session::get('success') }}</div>
        @endif
        <form action="{{route('clinc.store')}}" method="post">
            @csrf
            <div class="p-4 flex items-center justify-center">
                <label for="area" class="w-2/6">المنطقه</label>
                <select name="area" id="area" class="w-full rounded">
                    <option value="القاهرة">القاهرة</option>
                    <option value="الجيزه">الجيزه</option>
                    <option value="اسكندريه">اسكندريه</option>
                </select>
            </div>
            <div class="p-4 flex items-center justify-center">
                <label for="address" class="w-2/6 text-sky-800">عنوان العيادة</label>
                <input type="text" id="address" name="address" class="w-full rounded" require>
            </div>
            <button type="submit" class="btn-main my-3 w-full">أضف العيادة</button>
        </form>
    </div>
    <div class="container flex justify-center mx-auto w-full">
    
        <div class="flex flex-col w-full">
            <div class="w-full">
                <div class="border border-gray-200">
                    <table class="w-full ">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-2 text-gray-500">
                                    المنطقه
                                </th>
                                <th class="px-6 py-2 text-gray-500">
                                    العنوان
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse ($clincs as $clinc)
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-center border">
                                    <div class="text-gray-500">{{ $clinc->area }}</div>
                                </td>
                                <td class="px-6 py-4 text-gray-500 border text-center">
                                {{ $clinc->address }}
                                </td>
    
                            </tr>
                            @empty
                            <p>No users</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>