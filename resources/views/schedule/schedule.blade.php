<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <livewire:horarios.horario :schedules="$schedules"/>
            </div>
        </div>
    </div>
</x-app-layout>