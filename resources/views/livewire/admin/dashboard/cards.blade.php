<div class="contenedor-widget mt-4 grid grid-cols-1 md:grid-cols-4 gap-4">

    <div class="col-span-1">
        <a href="#"
            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 py-3 md:py-1">
            <img class="object-cover w-14 rounded-t-lg h-auto md:h-auto md:w-12 md:rounded-none md:rounded-s-lg mx-4"
                src="{{ asset('imagenes/payday.svg') }}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal mx-2">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">FACTURAS</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">S/ {{ $TotalFacturas }}</p>
            </div>
        </a>
    </div>

    <div class="col-span-1">
        <a href="#"
            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 py-3 md:py-1">
            <img class="object-cover w-14 rounded-t-lg h-auto md:h-auto md:w-12 md:rounded-none md:rounded-s-lg mx-4"
                src="{{ asset('imagenes/payday.svg') }}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal mx-2">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">BOLETAS</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">S/ {{ $totalBoletas }}</p>
            </div>
        </a>
    </div>
    <div class="col-span-1">
        <a href="#"
            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 py-3 md:py-1">
            <img class="object-cover w-14 rounded-t-lg h-auto md:h-auto md:w-12 md:rounded-none md:rounded-s-lg mx-4"
                src="{{ asset('imagenes/payday.svg') }}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal mx-2">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">NOTAS DE VENTA</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">S/ {{ $totalNotasVenta }}</p>
            </div>
        </a>
    </div>
    {{-- <div class="col-span-1">
        <a href="#"
            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 py-3 md:py-1">
            <img class="object-cover w-14 rounded-t-lg h-auto md:h-auto md:w-12 md:rounded-none md:rounded-s-lg mx-4"
                src="{{ asset('imagenes/payday.svg') }}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal mx-2">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">NOTAS DE CRÉDITO</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">S/ 3,368.00</p>
            </div>
        </a>
    </div>
    <div class="col-span-1">
        <a href="#"
            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 py-3 md:py-1">
            <img class="object-cover w-14 rounded-t-lg h-auto md:h-auto md:w-12 md:rounded-none md:rounded-s-lg mx-4"
                src="{{ asset('imagenes/payday.svg') }}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal mx-2">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">NOTAS DE DÉBITO</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">S/ 3,368.00</p>
            </div>
        </a>
    </div> --}}
    <div class="col-span-1">
        <a href="#"
            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 py-3 md:py-1">
            <img class="object-cover w-14 rounded-t-lg h-auto md:h-auto md:w-12 md:rounded-none md:rounded-s-lg mx-4"
                src="{{ asset('imagenes/payday.svg') }}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal mx-2">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">TOTAL NETO</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">S/ {{ $total_ventas }}</p>
            </div>
        </a>
    </div>
</div>
