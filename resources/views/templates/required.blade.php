<div class="flex flex-col">
    <label class="@error($field) text-red-500 font-bold @enderror" for="{{ $field }}">{{ $label }} <span class="text-red-500">*</span></label>
    <input class="border border-1 p-2 @error($field) border-red-500 text-red-500 @enderror"
            value="{{ old($field) }}"
            type="text" id="{{ $field }}" name="{{ $field }}">
    @error($field)
        <p class="bg-red-500 text-white px-2 py-1">
            {{ $message }}
        </p>
    @enderror
</div>
