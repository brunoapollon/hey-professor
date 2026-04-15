<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <form action="{{ route('question.store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="question" class="block mb-2.5 text-sm font-medium text-heading">Your question</label>
                <textarea name="question" id="question" rows="4"
                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full p-3.5 shadow-xs placeholder:text-body"
                    placeholder="Write your thoughts here...">{{ old('question') }}</textarea>
                    @error('question')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
            </div>
            <button type="submit"
                class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Send</button>
            <button type="reset" class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">cancel</button>       
            </form>
    </div>
</x-layouts::app>