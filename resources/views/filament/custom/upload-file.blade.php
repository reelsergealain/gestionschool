<h1 class="font-bold text-3xl">Telecharger un fichier</h1>

<div class="flex justify-between mt-1">
    <div>
        {{ $data }}
    </div>

    <div class="mt-4">
        <form wire:submit="save" action="">
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                leading-tight focus:outline-none focus:shadow-outline" id="fileInput" type="file" wire:model="file">
            <button type="submit" class="text-blue-300 hover:bg-blue-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Importer
            </button>
        </form>
    </div>

</div>
