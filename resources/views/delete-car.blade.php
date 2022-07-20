<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <x-slot name="titleSlot">Delete</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Confirm Delete
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-sm mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 bg-white border-b border-gray-200">
                    <p class="text-center"> Are you sure you want to delete <?php echo $car->ProductionYear." ".$car->Make." ".$car->Model."?" ?></p>
                    <form action='/dashboard' method='post'>
                        @csrf
                        <input class="hidden" type="number" name="Id" value=<?php echo $car->Id ?> >
                        <input class="hidden" type="number" name="Delete" value=1>
                        <a href="/dashboard"><button type="button" style="float:left">No</button></a>
                        <button type="submit" class="text-primary" style="float:right">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
