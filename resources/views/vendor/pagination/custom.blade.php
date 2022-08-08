@if ($paginator->hasPages())
    <nav aria-label="Page navigation example" class="mb-5">
        <ul class="pagination justify-content-center flex-wrap">

            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#"><i class="fa-solid fa-angle-left"></i></a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i
                            class="fa-solid fa-angle-left"></i></a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item"><a class="page-link" href="">{{ $element }}
                            <span class="sr-only">(current)</span></a>
                    </li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a class="page-link" href="#">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i
                            class="fa-solid fa-angle-right"></i></a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="#"><i class="fa-solid fa-angle-right"></i></a>
                </li>
            @endif

        </ul>
    </nav>
@endif
