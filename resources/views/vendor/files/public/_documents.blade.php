@if ($model->documents->count() > 0)
    <ul class="documents-list">
    @foreach ($model->documents as $document)
        <li class="documents-list-item">
            <a class="documents-list-item-link" href="{{ asset('storage/'.$document->path) }}" download>
                <span class="documents-list-item-icon fa fa-file-o fa-2x"></span>
                <span class="documents-list-item-filename">{{ $document->name }}</span> <small class="files-list-document-filesize">{{ $document->present()->filesize }}</small>
            </a>
        </li>
    @endforeach
    </ul>
@endif
