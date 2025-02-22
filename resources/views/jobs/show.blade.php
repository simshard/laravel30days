<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
    <p class="font-light text-gray-500 mb-2">{{ $job->employer->name }}</p>

    <p>
        This job pays {{ $job->salary }} per year.
    </p>
    @can('edit-job', $job)
    <p class="mt-4">
        <x-button href="/jobs/{{ $job->id }}/edit"> Edit job</x-button>
    </p>
    @endcan
    <p class="mt-4 text-xs text-gray-500"><a href="/jobs">&laquo; Back </a></p>
</x-layout>