<x-app-layout>
    <section class="container mx-auto mt-10 w-[95%]">
        @include('dashboard.shared.form', [
            'title' => 'Modifier',
            'action' => 'edit',
            'method' => 'patch',
        ])
    </section>
</x-app-layout>
