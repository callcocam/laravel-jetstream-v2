<div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
    {{ $search }}
    <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
        <table class="min-w-full striped hovered main-first-cell">
            <thead>
            {{ $thead }}
            </thead>
            <tbody class="bg-white">
            {{ $tbody }}
            </tbody>
        </table>
    </div>
    <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
        {{ $paginate }}
    </div>
</div>
