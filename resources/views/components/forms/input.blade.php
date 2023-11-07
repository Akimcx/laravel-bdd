@props([])
<div class="relative">
    <input
        class="peer w-full rounded bg-transparent p-2 focus-visible:outline-none focus-visible:outline-offset-2 dark:border-2 dark:border-gray-400 dark:text-slate-100 focus-visible:dark:border-blue-400"
        type="text" id="name" placeholder=" " />
    <label
        class="absolute -top-2.5 left-1 scale-75 select-none px-2 transition-transform peer-placeholder-shown:left-2 peer-placeholder-shown:translate-y-3/4 peer-placeholder-shown:scale-100 peer-placeholder-shown:p-0 peer-placeholder-shown:opacity-50 dark:bg-gray-500"
        for="name">Name</label>
</div>
