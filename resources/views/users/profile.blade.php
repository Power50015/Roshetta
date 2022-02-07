<x-app-layout>
    <section class="container mx-auto">
        <div class="border my-8">
            <h1 class="border-b p-4 font-thin font-sans text-center text-5xl">بيانات الحساب</h1>
            <div class="flex flex-col md:flex-row justify-around">
                <div class="p-5 border-b md:border-b-0 md:border-l ">
                    <img src="{{asset($user->profile_photo_url)}}" alt="Profile img" class="w-[300px] h-[300px]">
                    <form action="{{route('user-profile-img.update')}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="file" name="image" id="image" class="py-5">
                        <br>
                        <button type="submit" class="btn-main my-3">تغير الصوره</button>
                    </form>
                    <form action="{{route('user-profile-img.delete')}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn bg-red-600 text-white">حذف الصوره</button>
                    </form>
                </div>
                <div class="p-5">
                    <form action="{{route('user-profile-information.update')}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="p-4 flex items-center justify-center">
                            <label for="name" class="w-2/6 text-sky-800">الأسم</label>
                            <input type="text" name="name" id="name" class="w-full rounded" value="{{$user->name}}">
                        </div>
                        <div class="p-4 flex items-center justify-center">
                            <label for="email" class="w-2/6 text-sky-800">البريد الإلكترونى</label>
                            <input dir="ltr" type="text" name="email" id="email" class="w-full rounded" value="{{$user->email}}">
                        </div>
                        <div class="p-4 flex items-center justify-center">
                            <label for="phone" class="w-2/6 text-sky-800">رقم الهاتف</label>
                            <input type="tel" maxlength="12" id="phone" name="phone" class="w-full rounded" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="{{$user->phone}}">
                        </div>
                        <br>
                        <button type="submit" class="btn-main my-3">تغير البيانات</button>
                    </form>
                </div>
            </div>
        </div>

    </section>

</x-app-layout>