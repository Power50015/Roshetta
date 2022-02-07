<x-app-layout>
    <header>
        <div class="header-content">
            <h1 class="block mb-2 sm:text-9xl text-8xl  font-black text-sky-100 sm:tracking-widest">Roshetta</h1>
            <h2 class="block sm:text-7xl text-5xl font-thin	font-sans text-sky-300">ابحث عن طبيبك معنا</h2>
            <a href="{{route('user.register')}}" class="header-btn">تسجيل حساب جديد</a>
        </div>
    </header>
    <section class="bg-gray-100 py-8">
        <div class="flex flex-col md:flex-row container mx-auto justify-between">
            <h2 class="text-4xl text-blue-500">يمكنك ان تصبح فى فريق اطبئنا</h2>
            <a href="{{route('doctor.registerView')}}" class="btn-main">تسجيل حساب جديد</a>
        </div>
    </section>
</x-app-layout>