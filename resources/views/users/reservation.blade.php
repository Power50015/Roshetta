<x-app-layout>
    <div class="container flex justify-center mx-auto w-full mt-8">
        <div class="flex flex-col w-full">
            <div class="w-full">
                <div class="border border-gray-200">
                    <table class="w-full ">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-2 text-gray-500">
                                    الطبيب
                                </th>
                                <th class="px-6 py-2 text-gray-500">
                                    التخصص
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
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse ($reservationdata as $reservation)
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-center border">
                                    <div class="text-gray-500">{{ $reservation->Doctor->name }}</div>
                                </td>
                                <td class="px-6 py-4 text-gray-500 border text-center">
                                    {{ $reservation->Doctor->specialty }}
                                </td>
                                <td class="px-6 py-4 text-gray-500 border text-center">
                                    {{ $reservation->Doctor->phone }}
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
                                    {{  $reservation->created_at->diffForHumans() }}
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