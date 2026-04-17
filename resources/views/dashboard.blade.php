<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <x-form post :action="route('question.store')">
            <x-textarea label="Question" name="question"></x-textarea>
            <button type="submit"
                class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Send</button>
            <button type="reset"
                class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">cancel</button>
        </x-form>
        <hr class="border-gray-700 border-dashed my-4">

        <div class="dark:text-gray-100 uppercase font-bold mb-1">List of Questions</div>
        <div class="dark:text-gray-200 space-y-4">
            @foreach ($questions as $item)
                <x-question :question="$item" />
            @endforeach
        </div>
    </div>
</x-layouts::app>