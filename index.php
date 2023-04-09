<?php
require_once "./components/_partials/header.php";
require_once "./components/_partials/navbar.php";

?>
<div class=" bottom-0 leading-5 h-screen w-full overflow-hidden pb-6 sm:pb-8 lg:pb-12 relative">
  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <section class="flex flex-col items-center">
      <!-- notice - start -->
      <div class="flex items-center gap-2 rounded border bg-gray-50 p-2 text-gray-500">
        <span class="mt-0.5 rounded-full bg-indigo-100 px-2 py-1 text-xs font-semibold leading-none text-indigo-800">New</span>

        <span class="text-sm">This is a section of some simple filler text.</span>

        <a href="#" class="text-sm font-bold text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">More</a>
      </div>
      <!-- notice - end -->

      <div class="flex max-w-xl flex-col items-center pt-8 pb-0 text-center sm:pb-16 lg:pt-32 lg:pb-32">
        <p class="mb-4 font-semibold text-teal-500 md:mb-6 md:text-lg xl:text-xl">Very proud to introduce</p>

        <h1 class="text-black-800 mb-8 text-4xl font-bold sm:text-5xl md:mb-12 md:text-6xl">Revolutionary way to Take Attendance</h1>

        <p class="mb-8 leading-relaxed text-gray-500 md:mb-12 xl:text-lg">This is a section of some simple filler text, also known as placeholder text. It shares characteristics of real text.</p>

        <div class="flex w-full flex-col gap-2.5 sm:flex-row sm:justify-center">
          <a href="#" class="inline-block rounded-lg bg-teal-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">Faculty Login</a>

          <a href="#" class="inline-block rounded-lg border bg-white px-8 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-100 focus-visible:ring active:bg-gray-200 md:text-base">Student Login</a>
        </div>
      </div>
    </section>

  </div>
</div>
<?php
require_once "./components/_partials/footer.php";

?>