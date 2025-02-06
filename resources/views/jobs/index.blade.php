<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job)  
            <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-grey-400
            rounded-xl shadow-md shadow-indigo-300/50" >
                <div class="font-light  text-gray-500 mb-2">{{ $job->employer->name }}</div>
                <div>
                   <strong>{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }} per year.
                </div>
            </a>  
        @endforeach
        <div>{{ $jobs->links() }}</div>
    </div>
</x-layout>