<div class=" pt-5 px-5">
    <div class=" d-flex flex-row w-50">
        <input type="text" wire:model="titleText" wire:keydown.enter="addPost" placeholder="Add and Enter" class="form-control flex-1 ">
       <!--search input form-->
       <input type="text" wire:model="searchText" wire:keydown.enter="searchPosts" placeholder="Search and  Enter" class="form-control flex-1 mx-2 ">
    </div>
    <div class=" w-50">
        @if (count($titles) > 0)
        @foreach ($titles as $single)
        <div class="d-flex flex-row justify-content-between ">
            <div class="p-2 text-capitalize fw-normal fs-6">
            <i class="bi bi-columns-gap px-2"></i> {{ $single->title }}
            </div>
            <div class="p-2 float-end">
                <button style="
                color:red;padding: 0;
                border: none;
                background: none;" wire:click="deletePost({{ $single->id }})"
                ><i class="bi bi-trash3 px-2"></i></button>
            </div>
        </div>
        @endforeach
        @else
        <div class="d-flex flex-row">
            <div class="p-2">
                No posts found
            </div>
        </div>
        @endif
    </div>

</div>