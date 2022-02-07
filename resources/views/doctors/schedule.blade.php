<x-app-layout>
    {{--
    {{Auth::guard('doctor')->check()}}
    {{Auth::user()}}
    --}}
    <div class="container mx-auto my-6 md:w-[700px]">
        <h2 class="text-5xl underline font-bold mb-5"> أضف معاد عيادتك</h2>
        @if (Session::has('success'))
        <div class="bg-green-500 rounded text-white text-center py-3 text-lg">{{ Session::get('success') }}</div>
        @endif
        <form action="{{route('schedule.store')}}" method="post">
            @csrf
            <div class="p-4 flex items-center justify-center">
                <label for="clincs" class="w-2/6">العيادات</label>
                <select name="clincs" id="clincs" class="w-full rounded">
                    @forelse ($clincs as $clinc)
                    <option value="{{$clinc->id}}">{{ $clinc->address }}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            <div class="p-4 flex items-center justify-center">
                <label for="day" class="w-2/6">أيام الأسبوع</label>
                <select name="day" id="day" class="w-full rounded">
                    <option value="سبت">سبت</option>
                    <option value="أحد">أحد</option>
                    <option value="أثنين">أثنين</option>
                    <option value="ثلاثاء">ثلاثاء</option>
                    <option value="أربعاء">أربعاء</option>
                    <option value="خميس">خميس</option>
                    <option value="جمعه">جمعه</option>
                </select>
            </div>
            <div class="p-4 flex items-center justify-center">
                <label for="from" class="w-2/6">من</label>
                <input type="number" id="from" name="from" class="w-full rounded" require>
            </div>
            <div class="p-4 flex items-center justify-center">
                <label for="to" class="w-2/6">إلى</label>
                <input type="number" id="to" name="to" class="w-full rounded" require>
            </div>
            <button type="submit" class="btn-main my-3 w-full">أضف الميعاد</button>
        </form>
    </div>
    <div class="container flex justify-center mx-auto w-full">

        <div class="flex flex-col w-full">
            <div class="w-full">
                <div class="border border-gray-200">
                    <table class="w-full ">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-2  text-gray-500">
                                    عنوان العيادة
                                </th>
                                <th class="px-6 py-2  text-gray-500">
                                    العنوان
                                </th>
                                <th class="px-6 py-2  text-gray-500">
                                   من الساعه
                                </th>
                                <th class="px-6 py-2  text-gray-500">
                                    الى الساعه
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($schedules as $schedule)
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-center border">
                                    <div class=" text-gray-500">{{ $schedule->Clinc->address }}</div>
                                </td>
                                <td class="px-6 py-4  text-gray-500 border text-center">
                                    {{ $schedule->day }}
                                </td>
                                <td class="px-6 py-4  text-gray-500 border text-center">
                                    {{ $schedule->from }}
                                </td>
                                <td class="px-6 py-4  text-gray-500 border text-center">
                                    {{ $schedule->to }}
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>