<div class="avatar {{ isset($size) ? (strlen($size) ? "-{$size}" : '') : 'avatar-sm' }} d-inline-block">
    <img src="{{ $media->getUrl() }}" alt="{{ $media->basename }}" class="avatar-img rounded-circle">
</div>
