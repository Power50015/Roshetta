<x-app-layout>
    <section class="form-page">
        <div class="form-page-content">
            <div class="min-h-[100vh]  flex items-center justify-center">
                <form action="{{ route('doctor.login') }}" method="POST" class="flex flex-col py-5 border rounded">
                    <div class="from-cyan-500/[.50] to-blue-500 flex flex-col items-center sm:min-w-[500px] justify-center py-5">
                        <img src="{{asset('./img/logo.png')}}" alt="logo" width="300" class="object-cover" />
                        <h2 class="font-thin font-sans text-sky-100 my-5 text-5xl">تسجيل الدخول</h2>
                    </div>
                    @if ($errors->any())
                    <div class="flex flex-col border-x py-4 items-center justify-center bg-white">
                        <div class="font-medium text-red-600">يوجد خطأ فى البيانات المدخله</div>
                    </div>
                    @endif
                    @csrf
                    <div class="p-4 flex items-center justify-center">
                        <label for="email" class="w-2/6 text-sky-100">البريد الإلكترونى</label>
                        <input type="text" name="email" id="email" class="w-full rounded" value="p@p.p">
                    </div>
                    <div class="p-4 flex items-center justify-center">
                        <label for="password" class="w-2/6 text-sky-100">كلمه المرور</label>
                        <input type="password" name="password" id="password" class="w-full rounded" value="passwordpassword">
                    </div>
                    <button type="submit" class="btn-main mt-8 mx-5">تسجيل</button>
                    <br/>
                    <a href="{{ route('doctor.registerView') }}" class="text-sky-100">تسجيل حساب جديد</a>
                </form>
            </div>
        </div>

    </section>
</x-app-layout>