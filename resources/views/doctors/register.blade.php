<x-app-layout>
    <section class="form-page">
        <div class="form-page-content">
            <div class="min-h-[100vh]  flex items-center justify-center">
                <form action="{{ url('doctor/register') }}" method="POST" class="flex flex-col py-5 border rounded">
                    <div class="from-cyan-500/[.50] to-blue-500 flex flex-col items-center sm:min-w-[500px] justify-center py-5">
                        <img src="{{asset('./img/logo.png')}}" alt="logo" width="300" class="object-cover" />
                        <h2 class="font-thin font-sans text-sky-100 my-5 text-5xl">عمل حساب جديد</h2>
                    </div>
                    @if ($errors->any())
                    <div class="flex flex-col border-x py-4 items-center justify-center bg-white">
                        <div class="font-medium text-red-600">يوجد خطأ فى البيانات المدخله</div>
                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @csrf
                    <input type="hidden" name="usertype" value="doctor">
                    <div class="p-4 flex items-center justify-center">
                        <label for="name" class="w-2/6 text-sky-100">الأسم</label>
                        <input type="text" name="name" id="name" class="w-full rounded" value="Ahmed">
                    </div>
                    <div class="p-4 flex items-center justify-center">
                        <label for="email" class="w-2/6 text-sky-100">البريد الإلكترونى</label>
                        <input dir="ltr" type="text" name="email" id="email" class="w-full rounded" value="p@p.p">
                    </div>
                    <div class="p-4 flex items-center justify-center">
                        <label for="phone" class="w-2/6 text-sky-100">رقم الهاتف</label>
                        <input value="01117555555" type="tel" maxlength="12" id="phone" name="phone" class="w-full rounded" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                    <div class="p-4 flex items-center justify-center">
                        <label for="password" class="w-2/6 text-sky-100">كلمه المرور</label>
                        <input value="passwordpassword" type="password" name="password" id="password" class="w-full rounded">
                    </div>
                    <div class="p-4 flex items-center justify-center">
                        <label for="password_confirmation" class="w-2/6 text-sky-100">تأكيد كلمه المرور</label>
                        <input value="passwordpassword" type="password" name="password_confirmation" id="password_confirmation" class="w-full rounded">
                    </div>
                    <div class="p-4 flex items-center justify-center">
                        <label for="specialty" class="w-2/6 text-sky-100">التخصص</label>
                        <select name="specialty" id="specialty" class="w-full rounded">
                            <option value="امراض باطنه">امراض باطنه</option>
                            <option value="اسنان">اسنان</option>
                            <option value="عظام">عظام</option>
                            <option value="علاج طبيعى">علاج طبيعى</option>
                        </select>
                    </div>
                    <button type="submit" class="btn-main mt-8 mx-5">تسجيل</button>
                    <br />
                    <a href="{{ route('doctor.loginView') }}" class="text-sky-100">تسجيل حساب </a>
                </form>
            </div>
        </div>

    </section>
</x-app-layout>