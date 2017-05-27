@if(auth()->user()->isAdmin())
    <div class="box">
        <div class="content">
            <div class="level">
                <div class="level-left">
                    <b>Como administrador pode:</b>
                </div>
                <div class="level-right">
                    @if($request->isRecusado())
                        @can('readmit', $request)
                            <a href="{{ route('requests.readmit', $request->id) }}" type="submit" class="level-item button is-warning">
                            <span class="icon is-small">
                                <i class="fa fa-check"></i>
                            </span>
                                <span>
                                Readmitir
                            </span>
                            </a>
                        @endcan
                    @else
                        @can('refuse', $request)
                            <a href="{{ route('requests.refuse', $request->id) }}" type="submit" class="level-item button is-danger">
                            <span class="icon is-small">
                                <i class="fa fa-ban"></i>
                            </span>
                                <span>
                                Recusar
                            </span>
                            </a>
                        @endcan
                        @can('finish', $request)
                            <a href="{{ route('requests.finish', $request->id) }}" type="submit" class="level-item button is-success">
                            <span class="icon is-small">
                                <i class="fa fa-check"></i>
                            </span>
                                <span>
                                Concluir
                            </span>
                            </a>
                        @endcan
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif