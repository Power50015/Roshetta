<x-app-layout>
    {{--
    {{Auth::guard('doctor')->check()}}
    {{Auth::user()}}
    --}}
    <h2 class="text-5xl font-bold my-5 text-center">الحوجزات</h2>
    <div class="container flex justify-center mx-auto w-full mt-8">
        <div class="flex flex-col w-full">
            <div class="w-full">
                <div class="border border-gray-200">
                    <table class="w-full ">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-2 text-gray-500">
                                    أسم المريض
                                </th>
                                <th class="px-6 py-2 text-gray-500">
                                    رقم التلفون
                                </th>
                                <th class="px-6 py-2 text-gray-500">
                                    منطقه العيادة
                                </th>
                                <th class="px-6 py-2 text-gray-500">
                                    عنوان العيادة
                                </th>
                                <th class="px-6 py-2 text-gray-500">
                                    يوم الحجز
                                </th>
                                <th class="px-6 py-2 text-gray-500">
                                    ساعه الحجز من :
                                </th>
                                <th class="px-6 py-2 text-gray-500">
                                    إلى :
                                </th>
                                <th class="px-6 py-2 text-gray-500">
                                    تم الحجز فى تاريخ
                                </th>
                                <th class="px-6 py-2 text-gray-500">
                                    حاله الحجز
                                </th>
                                <th class="px-6 py-2 text-gray-500">
                                    تغير الحاله </th>

                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse ($reservationdata as $reservation)
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-center border">
                                    <div class="text-gray-500">{{ $reservation->User->name }}</div>
                                </td>
                                <td class="px-6 py-4 text-gray-500 border text-center">
                                    {{ $reservation->User->phone }}
                                </td>
                                <td class="px-6 py-4 text-gray-500 border text-center">
                                    {{ $reservation->Clinc->area }}
                                </td>
                                <td class="px-6 py-4 text-gray-500 border text-center">
                                    {{ $reservation->Clinc->address }}
                                </td>
                                <td class="px-6 py-4 text-gray-500 border text-center">
                                    {{ $reservation->Schedules->day }}
                                </td>
                                <td class="px-6 py-4 text-gray-500 border text-center">
                                    {{ $reservation->Schedules->from }}
                                </td>
                                <td class="px-6 py-4 text-gray-500 border text-center">
                                    {{ $reservation->Schedules->to }}
                                </td>
                                <td class="px-6 py-4 text-gray-500 border text-center">
                                    {{ $reservation->created_at->diffForHumans() }}
                                </td>
                                <td class="px-6 py-4 text-gray-500 border text-center">
                                    @if($reservation->states == "0")
                                    <span class="text-blue-500">فى الانتظار</span>
                                    @elseif($reservation->states == "1")
                                    <span class="text-green-500">تم الوصول</span>
                                    @else($reservation->states == "2")
                                    <span class="text-red-500">تم الإلغاء</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-gray-100 border text-center">
                                    @if($reservation->states == "0")
                                    <form action="{{route('reservation.states')}}" method="post" class="inline">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $reservation->id }}">
                                        <input type="hidden" name="states" value="1">
                                        <button type="submit" class="btn bg-green-500 mt-8 mx-5">تم الوصول</button>
                                    </form>
                                    <form action="{{route('reservation.states')}}" method="post" class="inline">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $reservation->id }}">
                                        <input type="hidden" name="states" value="2">
                                        <button type="submit" class="btn bg-red-500 mt-8 mx-5">إلغاء</button>
                                    </form>
                                    @endif
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