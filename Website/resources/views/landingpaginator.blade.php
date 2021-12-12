@if ($paginator->hasPages())
    <ul class="pager">
       <div class="flex mt-4 justify-center">
            @if ($paginator->onFirstPage())
            <li class="disabled">
                <button class="flex item-center">
                    <
                </button>
            </li>
            @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                <button class="flex item-center">
                    <
                </button>
            </a></li>
            @endif


        <div class="flex flex-row items-center px-5 gap-x-5">
            @foreach ($elements as $element)
           
                    @if (is_string($element))
                        <li class="disabled"><span>{{ $element }}</span></li>
                    @endif

                
            
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active"><span>{{ $page }}</span></li>
                        @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                        
                @endif
            @endforeach
        </div>
       
        
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">
                <button class="w-10 flex item-center">
                    >
                </button>
            </a></li>
        @else
            <li class="disabled">
                <button class="w-10 flex item-center font-bold">
                    >
                </button>
            </li>
        @endif
        </div>
        
    </ul>
@endif 