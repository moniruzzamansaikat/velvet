<form>
    <input 
        type="search" 
        value="{{ request()->search }}" 
        class="form-control" 
        name="search" 
        placeholder="@lang('Search...')"
        @if(request()->search) autofocus @endif
    />
</form>
