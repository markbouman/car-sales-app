<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1> @if($car) Edit @else Add @endif Vehicle</h1>
                    <form action='/dashboard' method='post'>
                        @csrf
                        <input class="hidden" type="number" name="Id" @if($car) value= {{ $car->Id }} @else value = 0 @endif>
                        <label for="make">Make</label> <br />
                        <input type="text" id="make" name="Make" @if($car) value= {{ $car->Make }} @endif/> <br />
                        <label for="model">Model</label> <br />
                        <input type="text" id="model" name="Model" @if($car) value= {{ $car->Model }} @endif/> <br />
                        <label for="year">Year</label> <br />
                        <input type="number" id="year" name="ProductionYear" @if($car) value= {{ $car->ProductionYear }} @endif/> <br />
                        <label for="od">Kilometers</label> <br />
                        <input type="number" id="od" name="Odometer" @if($car) value= {{ $car->Odometer }} @endif/> <br />
                        <label for="price">Price</label> <br />
                        <input type="number" id="price" name="Price" @if($car) value= {{ $car->ProductionYear }} @endif/> <br />
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
