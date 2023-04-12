<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../login.php');
    exit;
}

?>
<header aria-label="Page Header" class="bg-gray-50">
  <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="flex items-center sm:justify-between sm:gap-4">
      <div class="relative hidden sm:block">
        <label class="sr-only" for="search"> Search </label>

        <input
          class="h-10 w-full rounded-lg border-none bg-white pl-4 pr-10 text-sm shadow-sm sm:w-56"
          id="search"
          type="search"
          placeholder="Search users"
        />

        <button
          type="button"
          class="absolute top-1/2 right-1 -translate-y-1/2 rounded-md bg-gray-50 p-2 text-gray-600 transition hover:text-gray-700"
        >
          <span class="sr-only">Search</span>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-4 w-4"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
            />
          </svg>
        </button>
      </div>

      <div
        class="flex flex-1 items-center justify-between gap-8 sm:justify-end"
      >
        <div class="flex gap-4">
          <button
            type="button"
            class="block shrink-0 rounded-lg bg-white p-2.5 text-gray-600 shadow-sm hover:text-gray-700 sm:hidden"
          >
            <span class="sr-only">Search</span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
              />
            </svg>
          </button>

          <!-- <a
            href="#"
            class="block shrink-0 rounded-lg bg-white p-2.5 text-gray-600 shadow-sm hover:text-gray-700"
           >
            <span class="sr-only">Academy</span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path d="M12 14l9-5-9-5-9 5 9 5z" />
              <path
                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
              />
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
              />
            </svg>
          </a> -->
        </div>

        <button
          type="button"
          class="group flex shrink-0 items-center rounded-lg transition"
        >
          <span class="sr-only">Menu</span>
          <img
            alt="Man"
            src="https://api.dicebear.com/6.x/pixel-art/svg"  class="h-10 w-10 rounded-full object-cover"
          />

          <p class="ml-2 hidden text-left text-xs sm:block">
            <strong class="block font-medium"><?php echo $_SESSION['user']['faculty_name'] ?></strong>

            <span class="text-gray-500"><?php echo $_SESSION['user']['faculty_id'] ?></span>
          </p>
        </button>
      </div>
    </div>

    <div class="mt-8">
      <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
        Welcome Back,<?php echo $_SESSION['user']['faculty_name'] ?>
      </h1>
      <p class="mt-1.5 text-sm text-gray-500">
        Antony Sir Vicharikunna Polle uma Depression ill allatto 🚀
      </p>
    </div>
  </div>
</header>
<?php
echo "d "
?>